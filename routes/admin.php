<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\AttributsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\admin\StaticPageController;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/',[MainController::class, 'index']);
    Route::resource('static-pages', StaticPageController::class);
    Route::get('/export', [ProductController::class, 'export'])->name('product.export');
    Route::post('/import', [ProductController::class, 'import'])->name('product.import');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::get('profile', [UserController::class, 'showProfile'])->name('admin.profile');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('profile/{id}/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::resource('users', UserController::class);
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('/categories/order', [CategoryController::class,'order'])->name('categories.order');
    Route::resource('product', ProductController::class);
    Route::resource('attribut', AttributsController::class);
    Route::resource('subscriber', SubscriberController::class);
});
