<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
});

Route::view('/dashboard', 'admin.dashboard');

Route::view('user', 'users.users');


Route::view('author', 'author.dashboard');

Route::view('category', 'category.category');
Route::view('add-category', 'category.add-category');
Route::view('manage-category', 'category.manage-category');

Route::view('tags', 'tags.tags');

// Comments route
Route::view('comments', 'comments.comments');
Route::view('approved-comments', 'comments.approved-comments');
Route::view('comments-approval', 'comments.waiting-for-approval');

Route::view('about-us', 'pages.about-us');
Route::view('contact-us', 'pages.contact-us');

Route::view('posts', 'posts.posts');
Route::view('create-posts', 'posts.create-posts');
Route::view('manage-posts', 'posts.manage-posts');
Route::view('trash-post', 'posts.trash-post');

Route::view('pages', 'pages.pages');

Route::view('subscribers', 'subscribers');
Route::view('settings', 'settings');


// TODO: - todo note
// FIXME: - fix something
