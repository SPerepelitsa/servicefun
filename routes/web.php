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
// Home page route

Route::get('/', function () {
    return view('home');
});
// Gallery page route

Route::get('gallery', function () {
    return view('pages.gallery');
})->name('gallery')->middleware('auth');

//Blog Routes

Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex'])->middleware('auth');
Route::get('blog/myposts', 'BlogController@getUserPosts')->name('myposts')->middleware('auth');

// Post Routes

Route::resource('posts', 'PostController');

// Salary Routes

Route::resource('salary', 'SalaryController');

//Comments Routes

Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentController@store']);
Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentController@edit']);
Route::put('comments/{id}/update', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
Route::get('comments/{id}', ['as' => 'comments.delete', 'uses' => 'CommentController@destroy']);

// Authentification and Registration Routes

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
