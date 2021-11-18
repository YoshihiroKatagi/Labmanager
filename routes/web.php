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

Route::get('/', 'MypageController@test');

Route::get('/mypage/mytask', 'MypageController@mytask');

Route::get('/mypage/labtask', 'LabtaskController@labtask');
Route::post('/mypage/labtask', 'LabtaskController@store');
Route::get('/mypage/labtask/{labtask}/edit', 'LabtaskController@edit');
Route::put('/mypage/labtask/{labtask}/edit', 'LabtaskController@update');
Route::delete('/mypage/labtask/{labtask}/edit', 'LabtaskController@delete');


Route::get('/labpage', 'LabpageController@index');
Route::get('/labpage/membertask', 'LabpageController@member');
Route::get('/labpage/membertask/comment', 'LabpageController@comment');
Route::get('/labpage/mention', 'LabpageController@mention');
