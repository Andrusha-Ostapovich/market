<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\AttributesController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/export', [ProductController::class, 'export']);
    Route::get('/import', [ProductController::class, 'import']);
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::view('/', 'admin.examples.home');
    Route::get('profile', [UserController::class, 'showProfile'])->name('admin.profile');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('profile/{id}/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::resource('users', UserController::class);
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('/categories/order', [CategoryController::class,'order'])->name('categories.order');
    Route::resource('product', ProductController::class);
    Route::resource('attribut', AttributesController::class);
    Route::resource('subscriber', SubscriberController::class);
});
