<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

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
     */
    public function getArticleById(int $id): ?Article
    {
        return Article::find($id);
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
     * @param Article $article
     * @param array $articleData
     * @return Article|null
     */
    public function updateArticle(Article $article, array $articleData): ?Article
    {
        $article->update($articleData);

        return $article;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public function deleteArticle(Article $article): bool
    {
        return $article->delete();
    }
}
