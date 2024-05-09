<?php

use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\EmailVerificationController;

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

//Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
});

Route::get('/modal', [Modal::class, 'render']);
Route::get('/detail/:shop_{id}', [ShopController::class, 'detail']);
Route::get('/main', [ShopController::class, 'main']);
Route::get('/shopedit', [ShopController::class, 'store']);
Route::post('/shopcreate', [ShopController::class, 'create']);
Route::post('/done', [ReserveController::class, 'create']);
Route::post('/bookmark', [BookmarkController::class, 'create']);
Route::post('/review', [ReviewController::class, 'create']);
Route::post('/unbookmark', [BookmarkController::class, 'delete']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AuthController::class, 'show']);
});

Route::controller(EmailVerificationController::class)
    ->prefix('email')->name('verification.')->group(function () {
        // 確認メール送信画面
        Route::post('verify', 'index')->name('notice');
        // 確認メール送信
        Route::post('verification-notification', 'notification')
            ->middleware('throttle:6,1')->name('send');
        // 確認メールリンクの検証
        Route::post('verification/{id}/{hash}', 'verification')
            ->middleware(['signed', 'throttle:6,1'])->name('verify');
    });
