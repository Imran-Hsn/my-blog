<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/admin', 'dashboard');

Route::view('user', 'users.users');


Route::view('admin/add-sub-admins', 'sub-admins.add-sub-admins');
Route::view('manage-sub-admins', 'sub-admins.manage-sub-admins');

Route::view('add-category', 'category.add-category');
Route::view('manage-category', 'category.manage-category');

Route::view('approved-comments', 'comments.approved-comments');
Route::view('comments-approval', 'comments.waiting-for-approval');

Route::view('about-us', 'pages.about-us');
Route::view('contact-us', 'pages.contact-us');

Route::view('create-posts', 'posts.create-posts');
Route::view('manage-posts', 'posts.manage-posts');
Route::view('trash-post', 'posts.trash-post');

Route::view('subscribers', 'subscribers');
Route::view('settings', 'settings');


