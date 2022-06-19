<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\Page;
use App\Models\PageLink;
use App\Models\Visitor;
use App\Repositories\Article\ArticleRepository;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Share;
use Str;


class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    private $articleRepository;
    private $baseSeoData;
    private $homePageSeoData;

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->homePageSeoData = json_decode(setting()->get('general'), true);
        $this->baseSeoData = [
            'title' => $this->homePageSeoData['home_page_title'],
            'description' => $this->homePageSeoData['home_page_description'],
            'keywords' => $this->homePageSeoData['home_page_keywords'],
            'image' => asset('images/logo.png'),
            'type' => 'website',
            'site' => env('APP_URL'),
            'app_name' => $this->homePageSeoData['app_name'],
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1'
        ];

        $this->articleRepository = $articleRepository;
        $tags = $this->articleRepository->getAllTags();

//        $subscribers = NewsLetter::all();
        $categories = Category::select('name_en', 'name_bn', 'slug_en', 'slug_bn')->where('is_published', 0)
            ->orderBy('position', 'asc')->get();

        $featuredArticles = \Cache::remember('featured_posts', config('cache.half_ttl'), function () {
            return $this->articleRepository->publishedFeaturedArticles(1, 4);
        });

        $continentArticles = \Cache::remember('continental_posts', config('cache.long_ttl'), function () {
            return $this->articleRepository->continentArticles();
        });
//        dd($continentArticles);
        $footerPages = \Cache::remember('footer_pages', config('cache.default_ttl'), function () {
            return PageLink::where('key', 'footer_pages')->with('page:id,title_en,title_bn,slug_en,slug_bn')->get()->toArray();
        });

        view()->share('footerPages', $footerPages);
//        view()->share('subscribers', $subscribers);
        view()->share('categories', $categories);
        view()->share('tags', $tags);
        view()->share('featuredPosts', $featuredArticles);
        view()->share('continentArticles', $continentArticles);
    }

    public function index()
    {
        $this->articleRepository->SetVisitor();

        $publishedArticles = $this->articleRepository->publishedArticles(1, 6);
        $mostReadArticles = \Cache::remember('mostR_read_posts', config('cache.half_ttl'), function () {
            return $this->articleRepository->mostReadArticles(1, 3);
        });
        $featuredArticles = \Cache::remember('featured_posts', config('cache.half_ttl'), function () {
            return $this->articleRepository->publishedFeaturedArticles(1, 3);
        });

        $this->seo($this->baseSeoData);

        return view('pages.landingPage.index',
            compact(
                'publishedArticles',
                'featuredArticles',
                'mostReadArticles',
            )
        );
    }

    public function home()
    {
        $this->baseSeoData['title'] = " Tanventure | Let me tell you a story";
        $this->seo($this->baseSeoData);
        $author = $this->articleRepository->getAuthor(8);

        return view('pages.homePage.index'
            ,
            compact(
                'author',
            )
        );
    }

    public function about()
    {

        $this->seo($this->baseSeoData);

        return view('pages.about.index');

    }

    public function author($slug)
    {
        $author = $this->articleRepository->getAuthor($slug);
        $authorArticles = $this->articleRepository->getAuthorArticles($slug);
        $this->baseSeoData['title'] = $author->name . "TanVenture";
        $this->baseSeoData['keywords'] = "bikepacking";
        $this->seo($this->baseSeoData);

        return view('pages.author.index', compact('authorArticles', 'author'));
    }

    public function novel()
    {
        $novels = $this->articleRepository->getNovels();

        $this->baseSeoData['title'] = " The Novel | tanventure";
        $this->seo($this->baseSeoData);

        return view('pages.novel.index',
            compact(
                'novels'
            )
        );

    }

    public function newsLetters(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'email|required|unique:news_letters,email',
        ]);

        NewsLetter::create([
            'email' => $request->input('email')
        ]);

        return back()->with("success", "Thanks! We Got You!!");
    }

    public function sendNewsLetters(Request $request): \Illuminate\Http\RedirectResponse
    {
        $subscribers = NewsLetter::all();
        $data = [];
        for ($i = 0; $i < $subscribers->count(); $i++) {
            \Mail::send('email.mail', $data, function ($message) use ($subscribers, $i) {
                $message->to($subscribers[$i]->email)
                    ->from('Anikreza22@gmail.com', 'Anik Reza')
                    ->subject('Subject Line');
            });
        }

        return back()->with("success", "Thank You, We've Got You");
    }


    public function articleDetails($slug)
    {
        $article = $this->articleRepository->getArticle($slug, true);
        if (!$article) {
            return $this->renderPage($slug);
        }
        $category = $article['categories'][0];
        $similarArticles = $this->articleRepository->getSimilarArticles($category['id'], 2);
        $tags = $article->keywords;
        $tagTitles = [];
        foreach ($tags as $tag) {
            $tagTitles[] = $tag->title;
        }
        $segments = [
            [
                'name' => $article['categories'][0]['name' . '_' . app()->getLocale()],
                'url' => route('category', [
                    'slug' => $category['slug' . '_' . app()->getLocale()]
                ])
            ],
            ['name' => $article['title' . '_' . app()->getLocale()], 'url' => url($slug)]
        ];
        $cacheKey = request()->ip() . $slug;
        \Cache::remember($cacheKey, 60, function () use ($article) {
            $article->viewed = $article->viewed + 1;
            $article->save();
            return true;
        });

        $appName = env('APP_NAME');
        $this->baseSeoData['title'] = $article['title' . '_' . app()->getLocale()] . '-' . $appName;
        $this->baseSeoData['description'] = $article['excerpt' . '_' . app()->getLocale()] . '-' . $appName;
        $this->baseSeoData['keywords'] = $tagTitles;
        $this->seo($this->baseSeoData);
        $shareLinks = $this->getSeoLinksForDetailsPage($article);

        return view('pages.articleDetail.index', compact('article', 'shareLinks', 'similarArticles', 'category', 'segments'));
    }

    public function categoryDetails($slug)
    {
        $category = Category::where('slug_en', $slug)->orWhere('slug_bn', $slug)->first();
        $segments = [
            [
                'name' => "{$category['name'.'_'.app()->getLocale()]}",
                'url' => route('category', ['slug' => $category['slug' . '_' . app()->getLocale()]])
            ],
        ];
        $categoryArticles = $this->articleRepository->paginateByCategoryWithFilter(5, $category->id);

        // SEO META INFO
//        $name = empty($category->meta_title) ? $category->name : $category->meta_title;
//        $title = request()->has('page') ? $name . " (Page " . request('page') . ')' : $name;
        $appName = env('APP_NAME');
        $this->baseSeoData['title'] = "{$appName} | {$category['name'.'_'.app()->getLocale()]} | {$category->keywords}";
        $this->baseSeoData['description'] = "{$category->excerpt}";
        $this->baseSeoData['keywords'] = "{$category->keywords}";
        $this->seo($this->baseSeoData);

        return view('pages.category.index', compact('segments', 'category', 'categoryArticles'));
    }

    public function tagDetails($slug)
    {
        $tagDetails = $this->articleRepository->getTagInfoWithArticles($slug, 10);
        $tag = $tagDetails['tagInfo'];
        $tags = $tagDetails['tags'];
        $tagArticles = $tagDetails['articles'];

        if (!isset($tag->title)) {
            \Log::error("tag not found: " . $slug);
            abort(404);
        }

        $segments = [
            ['name' => $tag->title, 'url' => route('tag', ['slug' => str_replace(' ', '-', $tag->title)])],
        ];

        // SEO META INFO
        $appName = env('APP_NAME');
        if ($tag->title == "Tanvir Reza Anik's column") {
            $this->baseSeoData['title'] = " $appName | {$this->baseSeoData['app_name']}";
        } else {
            $this->baseSeoData['title'] = "{$tag->title} | {$this->baseSeoData['app_name']}";
        }

        $this->seo($this->baseSeoData);

        view()->share('tags', $tags);
        return view('pages.tag.index', compact('segments', 'tag', 'tagArticles'));
    }

    public function searchArticle(Request $request)
    {
        $searchTerm = $request->input('query');
        $searchedArticles = $this->articleRepository->searchArticles($searchTerm, 3);

        $segments = [
            ['name' => $searchTerm],
        ];

        // SEO META INFO
        $appName = env('APP_NAME');
        $this->baseSeoData['title'] = "$searchTerm - $appName";
        $this->seo($this->baseSeoData);

        return view('pages.search.index', compact('segments', 'searchTerm', 'searchedArticles'));
    }

    public function renderPage($slug)
    {
        $page = Page::where('slug_en', $slug)->orWhere('slug_bn', $slug)->with('keywords')->first();

        if (!$page) {
            abort(404);
        }

        //visitor count
        $cacheKey = request()->ip() . $slug;
        \Cache::remember($cacheKey, 60, function () use ($page) {
            $page->viewed = $page->viewed + 1;
            $page->save();
            return true;
        });

        $segments = [
            ['name' => $page['title' . '_' . app()->getLocale()], 'url' => url($slug)]
        ];
        $shareLinks = $this->getSeoLinksForDetailsPage($page);

        return view('pages.page-details.index', compact('page', 'segments', 'shareLinks'));
    }

    private function generatePageClass(): \stdClass
    {
        $page = new \stdClass();
        $page->title = 'Columnist';
        $page->excerpt = null;
        $page->keywords = [];
        $page->image_url = null;
        return $page;
    }

    public function getColumnistPage()
    {
        $page = $this->generatePageClass();
        $segments = [
            ['name' => $page->title, 'url' => url('Columnist')]
        ];
        $shareLinks = $this->getSeoLinksForDetailsPage($page);

        return view('pages.columnist.index', compact('page', 'segments', 'shareLinks'));
    }

    private function getSeoLinksForDetailsPage($data)
    {
        $this->baseSeoData = [
            'title' => $data['title' . '_' . app()->getLocale()] . " | {$this->baseSeoData['app_name']}",
            'description' => $data['excerpt' . '_' . app()->getLocale()],
            'keywords' => count($data->keywords) ? implode(", ", $data->keywords->pluck('title')->toArray()) : $this->baseSeoData['keywords'],
            'image' => $data->image_url,
            'type' => 'article',
            'site' => env('APP_URL'),
            'app_name' => $this->baseSeoData['app_name'],
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1'
        ];
        $this->seo($this->baseSeoData);

        return Share::page(url()->current(), $data->title)
            ->facebook()
            ->twitter()
            ->linkedin($data->excerpt)
            ->whatsapp()
            ->telegram()
            ->getRawLinks();
    }

    private function seo($data)
    {
        SEOMeta::setTitle($data['title'], false);
        SEOMeta::setDescription($data['description']);
//        SEOMeta::addMeta('name', $value = null, $name = 'name');
        SEOMeta::setKeywords($data['keywords']);
        SEOMeta::setRobots($data['robots']);
        SEOMeta::setCanonical(url()->full());

        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@tanventurer');
        SEOTools::jsonLd()->addImage(asset('/images/logo.png'));

//        OpenGraph::addProperty('keywords', '$value'); // value can be string or array
        OpenGraph::setTitle($data['title']); // define title
        OpenGraph::setDescription($data['description']);  // define description
        OpenGraph::setSiteName($data['app_name']);
        OpenGraph::setArticle($data);

        if ($data['image']) {
            OpenGraph::addImage($data['image']); // add image url
        } else {
            OpenGraph::addImage($this->homePageSeoData['home_page_image_url']); // add image url
        }

        OpenGraph::setUrl(url()->current()); // define url
        OpenGraph::setSiteName($data['app_name']); //define site_name

        TwitterCard::setType('summary'); // type of twitter card tag
        TwitterCard::setTitle($data['title']); // title of twitter card tag
        TwitterCard::setDescription($data['description']); // description of twitter card tag

        if ($data['image']) {
            TwitterCard::setImage($data['image']); // add image url
        } else {
            TwitterCard::setImage($this->homePageSeoData['home_page_image_url']); // add image url
        }

        TwitterCard::setSite($data['site']); // site of twitter card tag
        TwitterCard::setUrl(url()->current()); // url of twitter card tag

        if (isset($data['read_time'])) {
            TwitterCard::addValue('label1', 'Est. reading time'); // value can be string or array
            TwitterCard::addValue('data1', $data['read_time']); // value can be string or array
        }

//        JsonLd::addValue($key, $value); // value can be string or array
        JsonLd::setType($data['type']); // type of twitter card tag
        JsonLd::setTitle($data['title']); // title of twitter card tag
        JsonLd::setDescription($data['description']); // description of twitter card tag

        if ($data['image']) {

            JsonLd::setImage($data['image']); // add image url
        } else {
            JsonLd::setImage($this->homePageSeoData['home_page_image_url']); // add image url
        }
        JsonLd::setSite('@Tanventurer'); // site of twitter card tag
        JsonLd::setUrl(url()->current()); // url of twitter card tag
    }
}
