<?php

use App\Models\Bookmark;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\BookmarkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
});

Route::get('/detail/:shop_{id}', [ShopController::class, 'detail']);
Route::post('/done', [ReserveController::class, 'create']);
Route::post('/bookmark', [BookmarkController::class, 'create']);
Route::post('/unbookmark', [BookmarkController::class, 'delete']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AuthController::class, 'show']);
});
