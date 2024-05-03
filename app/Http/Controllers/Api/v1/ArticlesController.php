<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\ArticlesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
        $article = $this->articlesService->getArticleById($id);

        return $article ?
            response()->json($article) :
            response()->json(
                ResponseAlias::$statusTexts[ResponseAlias::HTTP_NOT_FOUND],
                ResponseAlias::HTTP_NOT_FOUND
            );
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
     * @param Request $request
     * @param Article $article
     * @return JsonResponse
     */
    public function update(Request $request, Article $article): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        return response()->json($this->articlesService->updateArticle($article, $request->all()));
    }

    /**
     * Delete the specified resource.
     *
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        return response()->json($this->articlesService->deleteArticle($article));
    }
}
