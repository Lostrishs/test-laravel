<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UsersController extends Controller
{
    /** @var int */
    private const int DEFAULT_USERS_PER_PAGE = 10;

    private UsersService $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->input('limit', self::DEFAULT_USERS_PER_PAGE);

        return response()->json($this->usersService->getUsers($perPage));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->usersService->getUserById($id);

        return $user ?
            response()->json($user) :
            response()->json(
                ResponseAlias::$statusTexts[ResponseAlias::HTTP_NOT_FOUND],
                ResponseAlias::HTTP_NOT_FOUND
            );
    }
}
