<?php


namespace App\Repositories\Page;

use App\Models\Article;
use App\Models\Keyword;
use App\Models\News;
use App\Models\Page;
use Illuminate\Http\Request;

class PageRepository implements PageInterface
{
    private $model;

    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function save(Request $request)
    {

        $page = $this->model->create([
            'user_id' => auth()->user()->id,
            'title_bn' => $request->input('title_bn'),
            'slug_bn' => $this->slugify($request->input('title_bn')),
            'slug_en' => $this->slugify($request->input('title_bn')),
            'excerpt_bn' => $request->input('excerpt_bn'),
            'description_bn' => saveTextEditorImage($request->input('description_bn')),
            'published' => filter_var($request->input('published'), FILTER_VALIDATE_BOOLEAN),
        ]);

        // Keywords
        $newKeywords = explode(',', $request->input('keywords'));
        $keywordIds = [];

        foreach ($newKeywords as $keyword) {
            $keyword = Keyword::firstOrCreate(['title' => $keyword]);
            $keywordIds[] = $keyword->id;
        }

        $page->keywords()->sync($keywordIds);


        return $page;
    }    /**
     * @param $request
     * @return mixed
     */

    public function saveNews(Request $request)
    {

        return News::create([
            "title_en" => $request->input('title_en'),
            "title_bn" => $request->input('title_bn'),
            "description_bn" => $request->input('description_bn'),
            "description_en" => $request->input('description_en'),
            'published' => filter_var($request->input('published'), FILTER_VALIDATE_BOOLEAN),
        ]);
    }

    private function slugify($name): string
    {
        return str_replace(' ', '-', $name);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, int $id)
    {
        $page = $this->model->findOrFail($id);

        $data = [
            'title_bn' => $request->input('title_bn'),
            'slug_bn' => $this->slugify($request->input('title_bn')),
            'slug_en' => $this->slugify($request->input('title_bn')),
            'excerpt_bn' => $request->input('excerpt_bn'),
            'description_bn' => saveTextEditorImage($request->input('description_bn')),
            'published' => filter_var($request->input('published'), FILTER_VALIDATE_BOOLEAN),
        ];

        // Keywords
        $page->keywords()->detach();
        $newKeywords = explode(',', $request->input('keywords'));
        $keywordIds = [];

        foreach ($newKeywords as $keyword) {
            $keyword = Keyword::firstOrCreate(['title' => $keyword]);
            $keywordIds[] = $keyword->id;
        }

        $page->keywords()->sync($keywordIds);

        return $page->update($data);
    }
    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function updateNews(Request $request, int $id)
    {
        $news = News::findOrFail($id);

        $data = [
            "title_en" => $request->input('title_en'),
            "title_bn" => $request->input('title_bn'),
            "description_bn" => $request->input('description_bn'),
            "description_en" => $request->input('description_en'),
            'published' => filter_var($request->input('published'), FILTER_VALIDATE_BOOLEAN),
        ];
        return $news->update($data);
    }
    public function translate(Request $request, int $id): array
    {
        $article = Page::findOrFail($id);
        $data = $this->translateData($request);
        $article->update($data);

        return ['article' => $article];
    }
    private function translateData($request): array
    {
        return [
            'title_en' => $request->input('title_en'),
            'slug_en' => $this->slugify($request->input('title_en')),
            'excerpt_en' => $request->input('excerpt_en'),
            'description_en' => $request->input('description_en'),
        ];
    }

    public function delete(int $id)
    {
        $page = $this->model->findOrFail($id);
        $page->keywords()->detach();
        $page->pageLinks()->delete();

        return $page->delete();
    }

    public function all(array $columns = [])
    {
        return count($columns) ? $this->model->select($columns)->orderBy('id')->get() : $this->model->orderBy('id')->get();
    }
    public function allNews(array $columns = [])
    {
        return count($columns) ? News::select($columns)->orderBy('id')->get() : News::orderBy('id')->get();
    }

    public function paginate($perPage = 10)
    {
        return $this->model->latest()
            ->when(request()->has('is_published'), function ($q) {
                $q->where('published', (bool)request('is_published'));
            })
            ->when(\request()->has('search'), function ($q) {
                $q->where('title'.'_'.app()->getLocale(), 'LIKE', '%' . \request('search') . '%');
            })
            ->paginate($perPage);
    }
    public function paginateNews($perPage = 10)
    {
        return News::latest()
            ->when(request()->has('is_published'), function ($q) {
                $q->where('published', (bool)request('is_published'));
            })
            ->when(\request()->has('search'), function ($q) {
                $q->where('title'.'_'.app()->getLocale(), 'LIKE', '%' . \request('search') . '%');
            })
            ->paginate($perPage);
    }

}
