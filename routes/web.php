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

//Custom routes;
Route::get('threads', 'ThreadController@threads')->name('threads');
Route::get('threads/{thread}', 'ThreadController@show')->name('threads.id');
Route::get('/topic', 'TopicController@topic');
Route::get('/account', 'AccountController@account');
Route::get('/create_topic', 'CreateTopicController@show');
