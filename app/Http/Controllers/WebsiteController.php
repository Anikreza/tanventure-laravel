<?php

namespace App\Http\Controllers;
;
use App\Models\Category;
//use App\Models\Page;
use App\Repositories\Article\ArticleRepository;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'title' =>'A travel blog site',
            'description' => 'A travel blog site',
            'keywords' => 'A travel blog site',
//            'image' => $this->homePageSeoData['home_page_image_url'] ?
//                Storage::disk('public')->url('settings/' . basename($this->homePageSeoData['home_page_image_url']))
//                :
//                asset('asset/logo.png'),
            'type' => 'website',
            'site' => env('APP_URL'),
            'app_name' => env('APP_NAME'),
            'robots' => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1'
        ];


        $this->articleRepository = $articleRepository;
        $categories = Category::select('name', 'slug')->where('is_published', 0)->orderBy('position', 'asc')->pluck('name', 'slug');
        view()->share('categories', $categories);
    }

    public function index()
    {
        $publishedArticles = $this->articleRepository->publishedArticles(1, 4);
        $featuredArticles = $this->articleRepository->publishedFeaturedArticles(1, 3);
        $mostReadArticles = $this->articleRepository->mostReadArticles(1, 3);
        $appName = env('APP_NAME');
        $this->baseSeoData['title'] = "$appName";
        $this->baseSeoData['description'] = "$appName";
        $this->baseSeoData['keywords'] = "$appName";
        $this->seo($this->baseSeoData);

        return view('pages.home.index',
            compact(
                'publishedArticles',
                'featuredArticles',
                'mostReadArticles'
            )
        );
    }

    public function articleDetails($slug)
    {
        $article = $this->articleRepository->getArticle($slug, true);
        $category = $article['categories'][0];
        $similarArticles = $this->articleRepository->getSimilarArticles($category['id'], 2);
        $segments = [
            [
                'name' => $article['categories'][0]['name'],
                'url' => route('category', [
                    'slug' => $category['slug']
                ])
            ],
            ['name' => $article['title'], 'url' => url($slug)]
        ];
        $cacheKey = request()->ip() . $slug;
        \Cache::remember($cacheKey, 60, function () use ($article) {
            $article->viewed = $article->viewed + 1;
            $article->save();
            return true;
        });

        $appName = env('APP_NAME');
        $this->baseSeoData['title'] = " $article->title - $appName";
        $this->seo($this->baseSeoData);

        return view('pages.articleDetail.index', compact('article', 'similarArticles', 'category','segments'));
    }

    public function categoryDetails($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $segments = [
            [
                'name' => "{$category->name}",
                'url' => route('category', ['slug' => $category->slug])
            ],
        ];
        $categoryArticles = $this->articleRepository->paginateByCategoryWithFilter(5, $category->id);

       // SEO META INFO
//        $name = empty($category->meta_title) ? $category->name : $category->meta_title;
//        $title = request()->has('page') ? $name . " (Page " . request('page') . ')' : $name;
        $appName = env('APP_NAME');
        $this->baseSeoData['title'] = "{$appName}- {$category->name}- {$category->keywords}";
        $this->baseSeoData['description'] = "{$category->excerpt}";
        $this->baseSeoData['keywords'] = "{$category->keywords}";
        $this->seo($this->baseSeoData);

        return view('pages.category.index', compact('segments', 'category', 'categoryArticles'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function seo($data)
    {
        SEOMeta::setTitle($data['title'], false);
        SEOMeta::setDescription($data['description']);
//        SEOMeta::addMeta('name', $value = null, $name = 'name');
        SEOMeta::setKeywords($data['keywords']);
        SEOMeta::setRobots($data['robots']);
        SEOMeta::setCanonical(url()->full());

//        OpenGraph::addProperty('keywords', '$value'); // value can be string or array
        OpenGraph::setTitle($data['title']); // define title
        OpenGraph::setDescription($data['description']);  // define description

//        if ($data['image']) {
//            OpenGraph::addImage($data['image']); // add image url
//        } else {
//            OpenGraph::addImage($this->homePageSeoData['home_page_image_url']); // add image url
//        }

        OpenGraph::setUrl(url()->current()); // define url
        OpenGraph::setSiteName($data['app_name']); //define site_name

        TwitterCard::setType('summary'); // type of twitter card tag
        TwitterCard::setTitle($data['title']); // title of twitter card tag
        TwitterCard::setDescription($data['description']); // description of twitter card tag

//        if ($data['image']) {
//            TwitterCard::setImage($data['image']); // add image url
//        } else {
//            TwitterCard::setImage($this->homePageSeoData['home_page_image_url']); // add image url
//        }

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
//
//        if ($data['image']) {
//
//         JsonLd::setImage($data['image']); // add image url
//        } else {
//            JsonLd::setImage($this->homePageSeoData['home_page_image_url']); // add image url
//        }
        JsonLd::setSite('@DemoBlog'); // site of twitter card tag
        JsonLd::setUrl(url()->current()); // url of twitter card tag
    }
}
