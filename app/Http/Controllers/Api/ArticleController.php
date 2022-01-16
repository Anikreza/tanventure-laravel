<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Repositories\Article\ArticleRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends ApiController
{
    public $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Returns All categories
     * @param Request $request
     * @return JsonResponse
     */

    public function index(Request $request): JsonResponse
    {
        return $this->successResponse($this->articleRepository->paginate($request->input('perPage')), true);
    }

    /**
     * Creates Category & Returns created category
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|unique:articles,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        \DB::beginTransaction();

        try {
            $article = $this->articleRepository->save($request);

            // While creating new article, if it is directly published, then send notification
            if ($article->published) {
                $this->sendNotification($article);
            }

            \DB::commit();

            return $this->successResponse($article);

        } catch (\Throwable $throwable) {
            \DB::rollBack();
            $this->errorLog($throwable, 'api');

            return $this->failResponse($throwable->getMessage());
        }

    }

    public function edit($slug): JsonResponse
    {
        try {
            $article = Article::where('slug', $slug)->with(['categories', 'keywords'])->firstOrFail();

            return $this->successResponse($article);
        } catch (Exception $exception) {
            $this->errorLog($exception, 'api');

            return $this->failResponse($exception->getMessage());
        }
    }

    /**
     * Updates Category & Returns updated category
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        $articleInfo = $this->articleRepository->update($request, $id);

        // if the article is not published before send notification
        if (!$articleInfo['previouslyPublished']) {
            $this->sendNotification($articleInfo['article']);
        }

        \Artisan::call('cache:clear');

        return $this->successResponse($articleInfo['article']);
    }

    /**
     * Deletes Category & Returns boolean
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request, int $id): JsonResponse
    {
        $this->articleRepository->delete($id);
        \Artisan::call('cache:clear');

        return $this->successResponse();
    }

    /**
     * @param $article
     */
    private function sendNotification($article): void
    {
        \Artisan::call('cache:clear');

        $data = [
            "article_id" => $article->id,
            "title" => $article->title,
            "body" => $article->excerpt,
            "image" => $article->thumb_image_url
        ];

        \Artisan::call("send:notification", [
            'notificationData' => $data
        ]);
    }
}
