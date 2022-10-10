<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
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
    return view('admin.dashboard');
})->name('home');

Route::view('/dashboard', 'admin.dashboard');

// Category Routes
Route::get('admin/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
// Route::get('category', [CategoryController::class, 'store'])->name('category.store');
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