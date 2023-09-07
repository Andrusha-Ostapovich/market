<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\AttributsController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('/', 'admin.examples.home');
    Route::get('profile', [UserController::class, 'showProfile'])->name('admin.profile');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('profile/{id}/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::resource('users', UserController::class);
    Route::resource('news', NewsController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('attribut', AttributsController::class);
});
