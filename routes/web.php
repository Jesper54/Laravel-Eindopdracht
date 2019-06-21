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
Route::get('/createTopic', 'CreateTopicController@show');

Route::get('/topicView/{topic}', 'TopicViewController@show')->name('topic');
Route::get('/topicView', 'TopicViewController@topic')->name('topics');

Route::get('/EditTopicView/{topic_id}', 'EditController@show')->name('topic_id');
Route::post('/SubmitEdit/{topic}', 'EditController@store')->name('SubmitEdit');

Route::get('/EditReply/{reply_id}', 'EditReplyController@show')->name('reply_id');
Route::post('/SubmitReply/{reply}', 'EditReplyController@store')->name('SubmitReply');

//POST
Route::post('/createTopic', 'CreateTopicController@store');
Route::post('/CreateReaction/{topic}', 'TopicViewController@store')->name('comment');
Route::post('/ChangeUsername', 'AccountController@storeUsername');
Route::post('/ChangeEmail', 'AccountController@storeEmail');
Route::post('ChangePassword', 'AccountController@storePassword');
Route::post('ChangePicture', 'AccountController@storePicture');