<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;

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
    return view('index');
});

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//======================================================

// Route::view('/', 'index');
// Route::view('admin/dashboard', 'admin.dashboard')->name('home');

// Category Routes
Route::get('admin/dashboard/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('admin/dashboard/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('admin/dashboard/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('admin/dashboard/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('admin/dashboard/category/edit', [CategoryController::class, 'update'])->name('category.update');
Route::delete('admin/dashboard/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Tag routes
Route::get('admin/dashboard/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('admin/dashboard/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('admin/dashboard/tag', [TagController::class, 'store'])->name('tag.store');
Route::get('admin/dashboard/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::post('admin/dashboard/tag/update', [TagController::class, 'update'])->name('tag.update');
Route::delete('admin/dashboard/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

// Post Routes
Route::get('admin/dashboard/post', [PostController::class, 'index'])->name('post.index');
Route::get('admin/dashboard/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('admin/dashboard/post', [PostController::class, 'store'])->name('post.store');
Route::get('admin/dashboard/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('admin/dashboard/post/update', [PostController::class, 'update'])->name('post.update');
Route::delete('admin/dashboard/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('admin/dashboard/post/{id}/show', [PostController::class, 'show'])->name('post.show');



});

require __DIR__.'/auth.php';
