<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UsersService
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator|null
     */
    public function getUsers(int $perPage): ?LengthAwarePaginator
    {
        return User::with('articles')->orderByDesc('id')->paginate($perPage);
    }

    /**
     * @param int $id
     * @return User|null
     * @throws Exception
     */
    public function getUserById(int $id): ?User
    {
        $user = User::find($id);

        if (!$user) {
            $this->throwNotFoundException();
        }

        return $user;
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
