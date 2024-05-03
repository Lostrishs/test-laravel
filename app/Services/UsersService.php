<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

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
     */
    public function getUserById(int $id): ?User
    {
        return User::find($id);
    }
}
