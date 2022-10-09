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
// Route::post('category', [CategoryController::class, 'store'])->name('category.store');
// Route::get('category', [CategoryController::class, 'store'])->name('category.store');

Route::get('category', [CategoryController::class, 'index']);