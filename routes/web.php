<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Author\DashboardController as AuthorDashBoardController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\HomePageController;

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

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/post/{slug}', [HomePageController::class, 'readPost'])->name('home.readPost');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Dashboard
Route::get('admin/dashboard', [
    AdminDashboardController::class, 'index'
])->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

Route::prefix('admin/dashboard')->middleware(['auth', 'verified', 'admin'])->group(function () {
    // Category Routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Tag routes
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/tag/update', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

    // Admin Post Routes
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');


    Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/author/update', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');
});


// Author Dashboard
Route::get('author/dashboard', [
    AuthorDashBoardController::class, 'index'
])->middleware(['auth', 'verified', 'author'])->name('author.dashboard');

Route::prefix('author/dashboard')->middleware(['auth', 'verified', 'author'])->group(function () {

    // Author Post Routes
    Route::get('/post', [AuthorPostController::class, 'index'])->name('author.post.index');
    Route::get('/post/create', [AuthorPostController::class, 'create'])->name('author.post.create');
    Route::post('/post', [AuthorPostController::class, 'store'])->name('author.post.store');
    Route::get('/post/{id}/edit', [AuthorPostController::class, 'edit'])->name('author.post.edit');
    Route::put('/post/update', [AuthorPostController::class, 'update'])->name('author.post.update');
    Route::delete('/post/{id}', [AuthorPostController::class, 'destroy'])->name('author.post.destroy');
    Route::get('/post/{id}/show', [AuthorPostController::class, 'show'])->name('author.post.show');
});
