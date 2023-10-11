<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use App\Models\Review;
use Illuminate\Http\Request;
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

Route::post('/auth/register', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/article/{slug}', [ArticleController::class, 'show']);

Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/catalog/{slug}', [CatalogController::class, 'showProducts']);

Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/product/{slug}/reviews', [ReviewController::class, 'show']);
Route::middleware(['auth'])->group(function () {
    Route::get('/my/profile', [ProfileController::class, 'show']);
    Route::post('/my/profile', [ProfileController::class, 'edit']);
});

Route::get('/my/{id}/edit', [UserController::class, 'edit'])->name('my.edit');
Route::put('/my/{id}/update', [UserController::class, 'update'])->name('my.update');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/mailing', [MailingController::class, 'mailing'])->name('mailing');

Route::post('/{productSlug}/review/create', [ReviewController::class, 'create'])->name('review.create')->middleware('auth');



Route::post('/add-product/{slug}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/add/{slug}', [CartController::class, 'addToCart'])->name('add');
Route::get('/remove-product/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [CheckOutController::class, 'checkOut']);
Route::post('/place', [CheckOutController::class, 'place'])->name('place');
Route::get('/thanks', [CheckOutController::class, 'thanks'])->name('thanks');

Route::get('/order-history', [OrderController::class, 'orders']);

Route::get('/suggest/settlements', [OrderController::class, 'cityName']);
Route::get('/suggest/street', [OrderController::class, 'street']);

Route::middleware(['auth'])->group(function () {
    Route::post('/my/favorites/products/{product}', [FavoriteController::class, 'toggleProduct'])->name('favorite.toggle');
    Route::get('/my/favorites/products', [FavoriteController::class, 'listFavorites'])->name('favorites.show');

    Route::post('/my/favorites/articles/{article}', [FavoriteController::class, 'toggleArticle'])->name('favorites.articles.toggle');
    Route::get('/my/favorites/articles', [FavoriteController::class, 'listFavorites'])->name('favorites.articles.list');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
