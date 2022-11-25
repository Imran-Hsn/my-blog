<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
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
// Route::get('/', function () {
//     return view('admin.dashboard');
// })->name('home');

Route::view('/', 'welcome');

Route::view('admin/dashboard', 'admin.dashboard')->name('home');

// Category Routes
Route::get('admin/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('admin/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('admin/category/edit', [CategoryController::class, 'update'])->name('category.update');
Route::get('admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Tag routes
Route::get('admin/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('admin/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('admin/tag', [TagController::class, 'store'])->name('tag.store');
Route::get('admin/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::post('admin/tag/update', [TagController::class, 'update'])->name('tag.update');
Route::get('admin/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
Route::post('admin/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

// Post Routes
Route::get('admin/post', [PostController::class, 'index'])->name('post.index');
Route::get('admin/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('admin/post', [PostController::class, 'store'])->name('post.store');
Route::get('admin/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('admin/post/update', [PostController::class, 'update'])->name('post.update');
Route::get('admin/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('admin/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('admin/post/{id}/show', [PostController::class, 'show'])->name('post.show');