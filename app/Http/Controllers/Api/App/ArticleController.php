<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Article\ArticleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends ApiController
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getHomePageData(Request $request): JsonResponse
    {
        $categoryId = (int)$request->input('categoryId', 0);
//        $latestArticleOffset = (int)$request->input('offset', 0);
        $queryKey = "cat.$categoryId";

        $latestArticles = \Cache::remember('app_latest_articles_offset' . $queryKey, config('cache.default_ttl'), function () use ($categoryId) {
            $latestArticles = $this->latestArticles($categoryId, 4);

            return $this->attachOnlyDeviceIdInArticles($latestArticles);
        });

        $featuredArticles = \Cache::remember('app_featured_articles' . $queryKey, config('cache.default_ttl'), function () use ($categoryId) {
            return $this->attachOnlyDeviceIdInArticles($this->getFeaturedArticle($categoryId));
        });

        $mostPopularArticles = \Cache::remember('app_popular_articles' . $queryKey, config('cache.default_ttl'), function () use ($categoryId) {
            return $this->mostPopularArticles($categoryId);
        });

        $featuredColumnist = \Cache::remember('featured_columnist' . $queryKey, config('cache.default.ttl'), function () {
            $data = $this->articleRepository->getTagInfoWithArticles('Linnéa Findeklee Kolumne', 4, true);

            if (count($data['articles'])) {
                $data['articles'] = $this->attachOnlyDeviceIdInArticles($data['articles']);
            }

            return $data;
        });


        return $this->successResponse([
            'featuredArticles' => $featuredArticles,
            'mostPopularArticles' => $mostPopularArticles,
            'latestArticles' => $latestArticles,
            "featuredColumnist" => $featuredColumnist
        ]);
    }

    public function searchArticle(Request $request): JsonResponse
    {
        $latestArticleOffset = $request->input('offset', 0);
        $searchTerm = $request->input('query');
        $result = $this->articleRepository->search($searchTerm, $latestArticleOffset, true);

        return $this->successResponse(['searchResult' => $this->attachOnlyDeviceIdInArticles($result)]);
    }

    public function getArticle($id): JsonResponse
    {
        $result = $this->articleRepository->getArticle($id);

        return $this->successResponse(['article' => $this->attachOnlyDeviceIdInArticle($result)]);
    }

    private function getFeaturedArticle($categoryId)
    {
        return $this->articleRepository->publishedFeaturedArticle($categoryId, 3, true);
    }

    private function mostPopularArticles($categoryId)
    {
        return $this->articleRepository->mostPopularArticles($categoryId, 5);
    }

    public function latestArticles($categoryId, $limit)
    {
        return $this->articleRepository->getLatestArticles($categoryId, $limit, true);
    }

    private function attachOnlyDeviceIdInArticles($articles)
    {
        $articles->map(function ($item) {
            return $this->attachOnlyDeviceIdInArticle($item);
        });

        return $articles;
    }

    private function attachOnlyDeviceIdInArticle($item)
    {
        if (!count($item->favorites)) {
            $item->device_ids = [];
            unset($item->favorites);

        }

        $item->device_ids = $item->favorites->map(function ($i) {
            return $i->device_id;
        });

        unset($item->favorites);

        if (isset($item->categories[0]) && isset($item->categories[0]->articles) && isset($item->categories[0]->articles)) {
            $item->categories[0]->articles->device_ids = $item->categories[0]->articles->map(function ($i) {
                $i->id = $i->article_id;
                $i->device_ids = $i->favorites->map(function ($i) {
                    return $i->device_id;
                });
                unset($i->favorites);
                unset($i->article_id);

                return $i;
            });
        }

        return $item;
    }

}
