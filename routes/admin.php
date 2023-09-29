<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;

Route::group(['prefix' => 'admin', 'middleware' => 'checkRole:admin', 'as'=>'admin.'], function () {
    Route::get('/', [MainController::class, 'index']);
    Route::resource('page', PageController::class);
    Route::get('/export', [ProductController::class, 'export'])->name('product.export');
    Route::post('/import', [ProductController::class, 'import'])->name('product.import');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs.index');
    Route::get('log', [LogController::class, 'index']);
    Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('setting', [SettingController::class, 'info'])->name('info');
    Route::put('setting/create', [SettingController::class, 'create'])->name('setting.create');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('profile/{id}/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::resource('users', UserController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('/categories/order', [CategoryController::class, 'order'])->name('categories.order');
    Route::resource('product', ProductController::class);
    Route::resource('attribut', AttributController::class);
    Route::resource('subscriber', SubscriberController::class);
    Route::resource('review', ReviewController::class);
});
