<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

// ウェルカム ページ（laravelデフォルト）
Route::get('/', function () {
    return view('welcome');
});

// サインアップ ページ表示
Route::get('/signup', [UserController::class, 'show']);
// サインアップ
Route::post('/signup', [UserController::class, 'create']);

// ログイン ページ表示
Route::get('/login', [LoginController::class, 'show']);
// ログイン
Route::post('/login', [LoginController::class, 'login']);

// ログアウト
Route::get('/logout', [LogoutController::class, 'logout']);


// ホーム ページ表示
Route::get('/home', function() {
    return  view('pages.home');
});
