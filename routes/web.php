<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
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

// Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
// Route::resource('/pages', App\Http\Controllers\Admin\PageController::class);
// Route::resource('/posts', App\Http\Controllers\Admin\PostController::class);
// Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
// Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
// Route::resource('/tags', App\Http\Controllers\Admin\TagController::class);

// Admin Routes
Route::middleware(['role:Moderator|Publisher|Writer|Editor|Admin|Super-Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/dashboard', App\Http\Controllers\Admin\DashboardController::class);
    Route::resource('/pages', App\Http\Controllers\Admin\PageController::class);
    Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('/posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
    Route::get('/products/remove-image/{pid}/{iid}', [App\Http\Controllers\Admin\ProductController::class, 'removeImage'])->name('products.remove-image');
    // Route::resource('/product_images', App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('/images', App\Http\Controllers\Admin\ImageController::class);
    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/settings', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('/tags', App\Http\Controllers\Admin\TagController::class);
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
});

require __DIR__.'/auth.php';


// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

Route::get('/clear-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'All caches has been cleared';
});
