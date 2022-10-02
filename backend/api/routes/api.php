<?php

use Illuminate\Http\Request;
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

// ユーザー登録
Route::post('preRegist', [App\Http\Controllers\Api\RegisterApiController::class, 'preRegist']);
Route::post('regist', [App\Http\Controllers\Api\RegisterApiController::class, 'regist']);

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [App\Http\Controllers\Api\AuthContoller::class, 'login']);

    // 認証ミドルウェア付きルート(auth)
    Route::group(['middleware' => 'jwt:api'], function () {
        Route::post('me', [App\Http\Controllers\Api\AuthContoller::class, 'me']);
        Route::post('logout', [App\Http\Controllers\Api\AuthContoller::class, 'logout']);
    });
});

Route::post('post/create', [App\Http\Controllers\Api\Post\PostCreateController::class, 'create']);
