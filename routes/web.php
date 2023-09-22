<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PageController;


Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('show.news');
Route::get('/news/{slug}/previous', [NewsController::class, 'previous'])->name('news.previous');
Route::get('/news/{slug}/next', [NewsController::class, 'next'])->name('news.next');
Route::get('/catalog', [CategoryController::class, 'index'])->name('catalog');
Route::get('/cart', [CartController::class, 'index']);
Route::get('/my', [UserController::class, 'index'])->name('my');
Route::get('/my/{id}/edit', [UserController::class, 'edit'])->name('my.edit');
Route::put('/my/{id}/update', [UserController::class, 'update'])->name('my.update');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

require __DIR__ . '/admin.php';


//  Route::get('/test-policy', [AdminUserController::class, 'testPolicy'])->name('test-policy');
Route::get('/confirm-order/{іd}', [OrderController::class, 'confirmOrder']);

Route::get('/', [PageController::class, 'home']);
Route::get('/{slug}', [PageController::class, 'show']);
