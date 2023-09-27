<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\MailingController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\UserController;

Route::get('/search', [CategoryController::class, 'search'])->name('products.search');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/{slug}/previous', [NewsController::class, 'previous'])->name('news.previous');
Route::get('/news/{slug}/next', [NewsController::class, 'next'])->name('news.next');
Route::get('/catalog', [CategoryController::class, 'index'])->name('catalog');
Route::get('/catalog/{slug}', [CategoryController::class, 'show'])->name('category.products');
Route::get('/catalog/{categorySlug}/{productSlug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [CartController::class, 'index']);
Route::get('/my', [UserController::class, 'index'])->name('my');
Route::get('/my/{id}/edit', [UserController::class, 'edit'])->name('my.edit');
Route::put('/my/{id}/update', [UserController::class, 'update'])->name('my.update');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/mailing', [MailingController::class, 'mailing'])->name('mailing');
Route::post('/{productSlug}/review/create', [ReviewController::class, 'create'])->name('review.create')->middleware('auth');

Auth::routes();

require __DIR__ . '/admin.php';


//  Route::get('/test-policy', [AdminUserController::class, 'testPolicy'])->name('test-policy');
Route::get('/confirm-order/{іd}', [OrderController::class, 'confirmOrder']);

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/{slug}', [PageController::class, 'show']);
