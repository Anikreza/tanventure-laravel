<?php

namespace App\Repositories\Article;

use App\Models\Article;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class ArticleRepository implements ArticleInterface
{

    private $model;
    private $disk = 'public';

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function save(Request $request)
    {
        $fileNameToStore = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $extension = $image->getClientOriginalExtension();

            $fileNameToStore = $this->slugify($request->input('title')) . '-' . time() . '.' . $extension;

            $path = public_path('storage/articles/');
            if (!File::exists($path)) {
                File::makeDirectory($path);
            }

            Image::make($image)->resize(null, 576, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension)
                ->save(public_path('storage/articles/' . $fileNameToStore));
            Image::make($image)->resize(null, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension)
                ->save(public_path('storage/articles/'.$fileNameToStore));
        }

        $article = Article::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'slug' => $this->slugify($request->input('title')),
            'excerpt' => $request->input('excerpt'),
            'featured' => filter_var($request->input('featured'), FILTER_VALIDATE_BOOLEAN),
            'description' => $request->input('description'),
            'published' => filter_var($request->input('published'), FILTER_VALIDATE_BOOLEAN),
            'image_disk' => $this->disk,
            'meta_title' => $request->input('meta_title'),
            'image' => $fileNameToStore,
        ]);
        // Category
        $article->categories()->sync([$request->input('categories')]);

        // Keywords
        $newKeywords = explode(',', $request->input('keywords'));
        $keywordIds = [];

        foreach ($newKeywords as $keyword) {
            $keyword = Keyword::firstOrCreate(['title' => $keyword]);
            array_push($keywordIds, $keyword->id);
        }

        $article->keywords()->sync($keywordIds);

        return $article;
    }

    private function slugify($name): string
    {
        return \Str::slug($name);
    }

    public function update(Request $request, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function paginate($perPage = 10)
    {
        return Article::latest()
            ->with(['categories'])
            ->when(request()->has('category'), function ($q) {
                $q->whereHas('categories', function ($sq) {
                    $sq->where('category_id', \request('category'));
                });
            })
            ->when(request()->has('is_published'), function ($q) {
                $q->where('published', (bool)request('is_published'));
            })
            ->when(\request()->has('search'), function ($q) {
                $q->where('title', 'LIKE', '%' . \request('search') . '%');
            })
            ->paginate($perPage);
    }

    public function paginateWithFilter(int $limit)
    {
        // TODO: Implement paginateWithFilter() method.
    }

    public function paginateByCategoryWithFilter(int $perPage, int $categoryId)
    {
        return $this->baseQuery($categoryId)
            ->select('id', 'title', 'slug', 'featured', 'published', 'image', 'viewed','description')
            ->latest()
            ->paginate($perPage);
    }

    private function baseQuery(int $categoryId = 1)
    {
        return $this->model->whereHas('categories', function ($q) use ($categoryId) {
            $q->where('is_published', '=', 0);
            $q->when($categoryId !== 1, function ($sq) use ($categoryId) {
                $sq->where('category_id', $categoryId);
            });
        });
    }

    public function publishedArticles(int $categoryId, int $limit)
    {
        return $this->baseQuery($categoryId)
            ->select('id', 'title', 'slug', 'featured', 'published', 'image', 'viewed','description')
            ->with('favorites')
            ->with('categories')
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function publishedFeaturedArticles(int $categoryId, int $limit)
    {
        return $this->baseQuery($categoryId)
            ->select('id', 'title', 'slug', 'featured', 'published', 'image', 'viewed','description')
            ->where('featured', 1)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function mostReadArticles(int $categoryId, int $limit)
    {
        return $this->baseQuery($categoryId)
            ->select('id', 'title', 'slug', 'featured', 'published', 'image', 'viewed','description')
            ->limit($limit)
            ->orderBy('viewed', 'desc')
            ->get();
    }

    public function getArticle($condition, $isSlug = false)
    {
        return $this->model->with(['categories' => function ($q) use ($condition, $isSlug) {
            $q->with(['articles' => function ($sq) use ($condition, $isSlug) {
                $sq->select('article_id', 'title', 'slug', 'published', 'viewed', 'image', 'featured', 'description')
                    ->with('favorites')
                    ->where('published', '=', true)
                    ->when($isSlug, function ($s) use ($condition, $isSlug) {
                        $s->where('slug', '!=', $condition);
                    })
                    ->when(!$isSlug, function ($s) use ($condition, $isSlug) {
                        $s->where('article_id', '!=', $condition);
                    })
                    ->inRandomOrder()
                    ->limit(4);
            }]);
        }])
            ->with(['keywords', 'favorites'])
            ->where('published', true)
            ->when($isSlug, function ($q) use ($condition) {
                $q->where('slug', $condition);
            })
            ->when(!$isSlug, function ($q) use ($condition) {
                $q->where('id', $condition);
            })
            ->first();
    }

    public function getSimilarArticles($categoryId, $limit)
    {
        return $this->baseQuery($categoryId)
            ->select('id', 'title', 'slug', 'published', 'viewed', 'image', 'featured','description')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    public function searchArticles($query, $perPage)
    {
        return $this->baseQuery(1)
            ->select('id', 'title', 'slug', 'published', 'viewed', 'image', 'featured','description')
            ->where('title', 'LIKE', '%' . $query . '%')
            ->latest()
            ->limit(5)
            ->paginate($perPage);
    }

    public function getAllTags(){
       return Keyword::all();
    }

    public function getTagInfoWithArticles($tag, $perPage, $includeFavorites = false): array
    {
        $string = Str::title(str_replace('-', ' ', trim($tag)));
        $tag = Keyword::where('title', 'LIKE', '%' . $string . '%')->get();
        $tags = Keyword::all();

        return [
            'tagInfo' => count($tag) ? $tag[0] : null,
            'tags'=> count($tags) ? $tags : null,
            'articles' => count($tag) ? $this->getArticlesByTag($perPage, $tag->pluck('id')->toArray(), $includeFavorites) : []
        ];
    }

    public function getArticlesByTag($perPage, array $keywordIds, $includeFavorites = false)
    {
        $q = $this->model->whereHas('keywords', function ($q) use ($keywordIds) {
            $q->whereIn('keyword_id', $keywordIds);
        })
            ->with('categories:id,name,slug')
            ->with('keywords:id,title')
            ->where('published', true)
            ->when($includeFavorites, function ($q) {
                $q->with(['favorites']);
            })
            ->select('id', 'title', 'slug', 'featured', 'published', 'image', 'viewed','description')
            ->latest();

        return $perPage === 4 ? $q->limit($perPage)->get() : $q->paginate($perPage);
    }

}
