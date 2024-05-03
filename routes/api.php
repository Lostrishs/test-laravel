<?php

use App\Http\Controllers\Api\v1\ArticlesController;
use App\Http\Controllers\Api\v1\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->as('v1:')->group(static function (): void {
    Route::controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('', 'index');
        Route::get('{id}', 'show');
    });

    Route::controller(ArticlesController::class)->prefix('articles')->group(function () {
        Route::get('', 'index');
        Route::get('{id}', 'show');
        Route::post('', 'store');
        Route::put('', 'update');
        Route::delete('', 'destroy');
    });
});
