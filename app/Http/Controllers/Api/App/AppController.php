<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\App\AppRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppController extends ApiController
{
    private $appRepository;

    public function __construct(AppRepository $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $this->validateApiRequest([
            'deviceToken' => 'required'
        ]);
        $deviceToken = $request->input('deviceToken');

        return $this->successResponse($this->appRepository->getSystemData($deviceToken));
    }

    public function saveFavorites(Request $request): JsonResponse
    {
        $request->validate([
            'deviceId' => 'required',
            'articleId' => 'required'
        ]);

        $data = [
            'device_id' => $request->input('deviceId'),
            'article_id' => $request->input('articleId'),
        ];
        $this->cacheClearForApp();

        return $this->successResponse($this->appRepository->saveFavorites($data));
    }

    public function removeFavorites(Request $request): JsonResponse
    {
        $request->validate([
            'deviceId' => 'required',
            'articleId' => 'required'
        ]);

        $data = [
            'device_id' => $request->input('deviceId'),
            'article_id' => $request->input('articleId'),
        ];
        $this->cacheClearForApp();

        return $this->successResponse($this->appRepository->removeFavorites($data));
    }

    public function getFavorites(Request $request): JsonResponse
    {
        $request->validate([
            'deviceId' => 'required'
        ]);

        $deviceId = $request->input('deviceId');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);

        return $this->successResponse($this->appRepository->getFavorites($deviceId, $offset, $limit));
    }

    public function savePersonalSettings(Request $request): JsonResponse
    {
        $request->validate([
            'deviceId' => 'required'
        ]);

        $data = $request->except('deviceId');
        $personalSettings = $this->appRepository->updatePersonalSettings($data, $request->input('device_id'));

        return $this->successResponse(['personalSettings' => $personalSettings]);
    }

    public function getPersonalSettings(Request $request): JsonResponse
    {
        $request->validate([
            'deviceId' => 'required'
        ]);

        return $this->successResponse(['personalSettings' => $this->appRepository->getPersonalSettings($request->input('deviceId'))]);
    }

    public function getPage($id): JsonResponse
    {
        $result = $this->appRepository->getPageInfo($id);

        return $this->successResponse(['page' => $result]);
    }

    private function cacheClearForApp(): void
    {
        $queryKey = "cat.0.offset.0";
        \Cache::forget('app_latest_articles_offset' . $queryKey);
        \Cache::forget('app_featured_articles' . $queryKey);
    }
}
