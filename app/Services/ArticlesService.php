<?php

namespace App\Services;

use App\Models\Article;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ArticlesService
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator|null
     */
    public function getArticles(int $perPage): ?LengthAwarePaginator
    {
        return Article::orderByDesc('id')->paginate($perPage);
    }

    /**
     * @param int $id
     * @return Article|null
     * @throws Exception
     */
    public function getArticleById(int $id): ?Article
    {
        $article = Article::find($id);

        if (!$article) {
            $this->throwNotFoundException();
        }

        return $article;
    }

    /**
     * @param array $articleData
     * @return Article|null
     */
    public function createArticle(array $articleData): ?Article
    {
        return Article::create($articleData);
    }

    /**
     * @param int $id
     * @param array $articleData
     * @return Article|null
     * @throws Exception
     */
    public function updateArticle(int $id, array $articleData): ?Article
    {
        $article = Article::find($id);

        if (!$article) {
            $this->throwNotFoundException();
        }

        $article->update($articleData);

        return $article;
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function deleteArticle(int $id): bool
    {
        $article = Article::find($id);

        if (!$article) {
            $this->throwNotFoundException();
        }

        return $article->delete();
    }

    /**
     * @return void
     * @throws Exception
     */
    private function throwNotFoundException(): void
    {
        throw new Exception(
            ResponseAlias::$statusTexts[ResponseAlias::HTTP_NOT_FOUND],
            ResponseAlias::HTTP_NOT_FOUND
        );
    }
}
