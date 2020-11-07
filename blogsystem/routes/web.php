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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home/posts','PostsController@index')->name('posts.index');


Route::post('home/posts','PostsController@store');
Route::get('home/create','PostsController@create');
Route::get('home/posts/{post}','PostsController@show')->name('posts.show');
Route::get('home/{post}/edit','PostsController@edit');
Route::put('home/posts/{post}','PostsController@update');
Route::get('home/posts/delete/{post}','PostsController@destroy')->name('posts.destroy');
Route::post('home/posts/{post}','PostsController@storecomment');
Route::get('home/posts/{post}/{comment}','PostsController@destroycomment');
Route::get('/home/{post}','PostsController@storelike')->name('like');


Route::get('home/posts/{like}','PostsController@destroylike');

