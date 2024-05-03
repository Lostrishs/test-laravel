<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ArticlesService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /** @var int */
    private const int DEFAULT_ARTICLES_PER_PAGE = 10;

    private ArticlesService $articlesService;

    public function __construct(ArticlesService $articlesService)
    {
        $this->articlesService = $articlesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->input('limit', self::DEFAULT_ARTICLES_PER_PAGE);

        return response()->json($this->articlesService->getArticles($perPage));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $article = $this->articlesService->getArticleById($id);

            return response()->json($article);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * Create a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        return response()->json($this->articlesService->createArticle($request->all()));
    }

    /**
     * Update the specified resource.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        try {
            return response()->json($this->articlesService->updateArticle($id, $request->all()));
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            return response()->json($this->articlesService->deleteArticle($id));
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }
}
