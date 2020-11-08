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


Auth::routes();
Route::get('/','PostsController@guestindex');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('home/posts','PostsController@index')->name('posts.index')->middleware('auth');


Route::post('home/posts','PostsController@store')->middleware('auth');
Route::get('home/create','PostsController@create')->middleware('auth');
Route::get('home/posts/{post}','PostsController@show')->name('posts.show')->middleware('auth');
Route::get('home/{post}/edit','PostsController@edit')->middleware('auth');
Route::put('home/posts/{post}','PostsController@update')->middleware('auth');
Route::get('home/posts/delete/{post}','PostsController@destroy')->name('posts.destroy')->middleware('auth');
Route::post('home/posts/{post}','PostsController@storecomment')->middleware('auth');
// Route::get('home/posts/{post}/{comment}','PostsController@destroycomment');
Route::DELETE('home/posts/{post}','PostsController@destroycomment')->middleware('auth');

Route::put('/home/posts','PostsController@storelike')->name('like')->middleware('auth');



Route::get('home/posts/{like}','PostsController@destroylike');

