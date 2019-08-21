<?php

use App\Blog;

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
    $blogs = Blog::all()->sortByDesc('id');

    return view('index', compact('blogs'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/addblog', 'HomeController@addBlog')->name('addblog');
Route::post('/home/postblog', 'HomeController@postBlog')->name('postblog');
Route::get('/home/editblog/{id}', 'HomeController@editBlog')->name('editblog');
Route::put('/home/putblog/{id}', 'HomeController@putBlog')->name('putblog');
Route::delete('/home/deleteblog/{id}', 'HomeController@deleteBlog')->name('deleteblog');
