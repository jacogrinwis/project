<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('/pages', App\Http\Controllers\Admin\PageController::class);
Route::resource('/posts', App\Http\Controllers\Admin\PostController::class);
Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
Route::resource('/tags', App\Http\Controllers\Admin\TagController::class);

// Admin Routes
Route::middleware(['role:Moderator|Publisher|Writer|Editor|Admin|Super-Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/dashboard', App\Http\Controllers\Admin\DashboardController::class);
    Route::resource('/pages', App\Http\Controllers\Admin\PageController::class);
    Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('/posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/settings', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('/tags', App\Http\Controllers\Admin\TagController::class);
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
});

require __DIR__.'/auth.php';