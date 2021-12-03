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

Route::get('/check', 'MytaskController@check');

Route::get('/', 'MypageController@test');
Route::get('/mypage/mytask', 'MytaskController@index');
Route::get('/mypage/mytask/today', 'MytaskController@today');
Route::get('/mypage/mytask/tomorrow', 'MytaskController@tomorrow');
Route::get('/mypage/mytask/thisweek', 'MytaskController@thisweek');
Route::get('/mypage/mytask/thismonth', 'MytaskController@thismonth');
Route::get('/mypage/mytask/{labtask}', 'MytaskController@bylabtask');

Route::post('/mypage/mytask', 'MytaskController@create');
Route::get('/mypage/mytask/{mytask}/edit', 'MytaskController@edit');
Route::put('/mypage/mytask/{mytask}/edit', 'MytaskController@update');
Route::delete('/mypage/mytask/{mytask}/edit', 'MytaskController@delete');

Route::get('/mypage/labtask', 'LabtaskController@labtask');
Route::post('/mypage/labtask', 'LabtaskController@create');
Route::get('/mypage/labtask/{labtask}/edit', 'LabtaskController@edit');
Route::put('/mypage/labtask/{labtask}/edit', 'LabtaskController@update');
Route::delete('/mypage/labtask/{labtask}/edit', 'LabtaskController@delete');



Route::get('/labpage/labtop', 'LabpageController@index');

Route::get('/labpage/membertask', 'LabpageController@member');

Route::get('/labpage/membertask/{labtask}/comment', 'CommentController@index');
Route::post('/labpage/membertask/{labtask}/comment', 'CommentController@create');
Route::put('/labpage/membertask/{labtask}/comment/{comment}', 'CommentController@update');

Route::get('/labpage/mention', 'LabpageController@mention');
