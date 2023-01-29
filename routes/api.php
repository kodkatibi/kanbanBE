<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['json.response'])->group(function () {

    Route::post('/login', [\App\Http\Controllers\Auth\ApiAuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\Auth\ApiAuthController::class, 'register']);
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Auth\ApiAuthController::class, 'logout']);
        Route::prefix('board')->group(function () {
            Route::get('/', [\App\Http\Controllers\BoardController::class, 'index']);
            Route::post('create', [\App\Http\Controllers\BoardController::class, 'store']);
            Route::put('update', [\App\Http\Controllers\BoardController::class, 'update']);
            Route::delete('delete', [\App\Http\Controllers\BoardController::class, 'delete']);
            Route::prefix('{board}/task')->group(function () {
                Route::get('/', [\App\Http\Controllers\TaskController::class, 'index']);
            });
        });

    });
});
