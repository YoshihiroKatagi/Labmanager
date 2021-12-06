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

//マイタスクページ
Route::get('/check', 'MytaskController@check');

Route::get('/', 'MytaskController@top');

Route::get('/mypage/mytask/bylabtask/{labtask}', 'MytaskController@bylabtask');
Route::post('/mypage/mytask/bylabtask/{labtask}', 'MytaskController@bylabtask_create');
Route::get('/mypage/mytask/bylabtask/{labtask}/{mytask}', 'MytaskController@bylabtask_edit');
Route::put('/mypage/mytask/bylabtask/{labtask}/{mytask}', 'MytaskController@bylabtask_update');
Route::delete('/mypage/mytask/bylabtask/{labtask}/{mytask}', 'MytaskController@bylabtask_delete');

Route::get('/mypage/mytask/today', 'MytaskController@today');
Route::post('/mypage/mytask/today', 'MytaskController@today_create');
Route::get('/mypage/mytask/today/{mytask}', 'MytaskController@today_edit');
Route::put('/mypage/mytask/today/{mytask}', 'MytaskController@today_update');
Route::delete('/mypage/mytask/today/{mytask}', 'MytaskController@today_delete');

Route::get('/mypage/mytask/tomorrow', 'MytaskController@tomorrow');
Route::post('/mypage/mytask/tomorrow', 'MytaskController@tomorrow_create');
Route::get('/mypage/mytask/tomorrow/{mytask}', 'MytaskController@tomorrow_edit');
Route::put('/mypage/mytask/tomorrow/{mytask}', 'MytaskController@tomorrow_update');
Route::delete('/mypage/mytask/tomorrow/{mytask}', 'MytaskController@tomorrow_delete');

Route::get('/mypage/mytask/thisweek', 'MytaskController@thisweek');
Route::post('/mypage/mytask/thisweek', 'MytaskController@thisweek_create');
Route::get('/mypage/mytask/thisweek/{mytask}', 'MytaskController@thisweek_edit');
Route::put('/mypage/mytask/thisweek/{mytask}', 'MytaskController@thisweek_update');
Route::delete('/mypage/mytask/thisweek/{mytask}', 'MytaskController@thisweek_delete');

Route::get('/mypage/mytask/thismonth', 'MytaskController@thismonth');
Route::post('/mypage/mytask/thismonth', 'MytaskController@thismonth_create');
Route::get('/mypage/mytask/thismonth/{mytask}', 'MytaskController@thismonth_edit');
Route::put('/mypage/mytask/thismonth/{mytask}', 'MytaskController@thismonth_update');
Route::delete('/mypage/mytask/thismonth/{mytask}', 'MytaskController@thismonth_delete');


Route::get('/mypage/mytask/{mytask}/edit', 'MytaskController@edit');
Route::put('/mypage/mytask/{mytask}/edit', 'MytaskController@update');
Route::delete('/mypage/mytask/{mytask}/edit', 'MytaskController@delete');



//ラボタスクページ
Route::get('/mypage/labtask', 'LabtaskController@labtask');
Route::post('/mypage/labtask', 'LabtaskController@create');
Route::get('/mypage/labtask/{labtask}/edit', 'LabtaskController@edit');
Route::put('/mypage/labtask/{labtask}/edit', 'LabtaskController@update');
Route::delete('/mypage/labtask/{labtask}/edit', 'LabtaskController@delete');





//ラボページ
Route::get('/labpage/labtop', 'LabpageController@index');

Route::get('/labpage/membertask', 'LabpageController@member');

Route::get('/labpage/membertask/{labtask}/comment', 'CommentController@index');
Route::post('/labpage/membertask/{labtask}/comment', 'CommentController@create');
Route::put('/labpage/membertask/{labtask}/comment/{comment}', 'CommentController@update');

Route::get('/labpage/mention', 'LabpageController@mention');
