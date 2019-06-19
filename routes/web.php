<?php

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

Route::get('/', 'PostController@index');

Route::get('/home', 'PostController@index');

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::resource('/posts', 'PostController');
Route::resource('/themes', 'ThemeController');
Route::resource('/comments', 'CommentController');
Route::resource('/users', 'UserController')->middleware('admin');

Route::get('/posts/user/{id}', 'PostController@showUserPosts');
Route::get('/comments/create/{id}', 'CommentController@store');
Route::get('/posts/theme/{id}', 'PostController@sortByTheme');
Route::post('/upvote/{post_id}', 'UserRatedPostController@store');
