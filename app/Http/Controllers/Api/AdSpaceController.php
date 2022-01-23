<?php

namespace App\Http\Controllers\Api;

use App\Repositories\AdSpace\AdSpaceRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdSpaceController extends ApiController
{
    public $adSpaceRepository;

    public function __construct(AdSpaceRepository $adSpaceRepository)
    {
        $this->adSpaceRepository = $adSpaceRepository;
    }

    /**
     * Returns All categories
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        return $this->successResponse($this->adSpaceRepository->all(), true);
    }

    /**
     * Creates Category & Returns created category
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required_if:is_google,==,1',
            'image' => 'nullable|required_if:is_google,==,0|image|max:1024',
            'location' => 'nullable|url'
        ]);

        try {
            $data = $request->only('name', 'content', 'is_google', 'published', 'location');

            return $this->successResponse($this->adSpaceRepository->create($data));
        } catch (Exception $exception) {
            $this->errorLog($exception, 'api');

            return $this->failResponse($exception->getMessage());
        }

    }

    public function show(int $id): JsonResponse
    {
        try {
            return $this->successResponse($this->adSpaceRepository->getById($id));
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
            'name' => 'required',
            'content' => 'required_if:is_google,==,1',
            'image' => 'nullable|max:1024'
        ]);

        $adSpace = $request->only('name', 'content', 'is_google', 'published', 'location');
        $adSpace = $this->adSpaceRepository->update($adSpace, $id);

        return $this->successResponse($adSpace);
    }

    /**
     * Deletes Category & Returns boolean
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request, int $id): JsonResponse
    {
        $this->adSpaceRepository->delete($id);

        return $this->successResponse();
    }
}
