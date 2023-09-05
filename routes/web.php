<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\AttributsController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/admin.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/profile', [UserController::class, 'showProfile'])->name('admin.profile');
Route::get('admin/profile/edit', function () {
    $user = Auth::user();
    return view('admin.profile.edit', compact('user'));
})->name('profile.edit');
Route::put('admin/profile/{id}/update', [UserController::class, 'updateProfile'])->name('profile.update');
Route::resource('admin/users', UserController::class);
Route::resource('admin/news', NewsController::class);
Route::resource('admin/category', CategoryController::class);
Route::resource('admin/product', ProductController::class);
Route::resource('admin/attribut', AttributsController::class);
Auth::routes();
