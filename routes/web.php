<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('category', [CategoryController::class, 'store'])->name('category.store');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');

Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');