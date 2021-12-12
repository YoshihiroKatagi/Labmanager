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

Route::group(['middleware' => 'auth'], function(){
    //マイタスクページ
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
    
    
    //ラボタスクページ
    Route::get('/mypage/labtask', 'LabtaskController@labtask');
    Route::get('mypage/labtask/create', 'LabtaskController@labtask_new');
    Route::post('/mypage/labtask/create', 'LabtaskController@labtask_create');
    Route::get('/mypage/labtask/{labtask}', 'LabtaskController@labtask_edit');
    Route::put('/mypage/labtask/{labtask}', 'LabtaskController@labtask_update');
    Route::delete('/mypage/labtask/{labtask}', 'LabtaskController@labtask_delete');
    
    
    //メンバータスクページ
    Route::get('/labpage/membertask/{user}', 'LabtaskController@membertask');
    Route::get('/labpage/membertask/{user}/{labtask}', 'LabtaskController@membertask_detail');
    
    
    //コメントページ
    Route::get('/labpage/membertask/{user}/{labtask}/comment', 'CommentController@comment');
    Route::post('/labpage/membertask/{user}/{labtask}/comment', 'CommentController@comment_post');
    Route::get('/labpage/membertask/{user}/{labtask}/comment/{comment}', 'CommentController@comment_edit');
    Route::put('/labpage/membertask/{user}/{labtask}/comment/{comment}', 'CommentController@comment_update');
    Route::delete('/labpage/membertask/{user}/{labtask}/comment/{comment}', 'CommentController@comment_delete');
    
    
    
    
    //ラボページ
    Route::get('/labpage/labtop', 'LabpageController@index');
    
    
    
    Route::get('/labpage/mention', 'LabpageController@mention');
    
    
    //設定ページ
    Route::get('/setting/account', 'UserController@account');
    
    Route::get('/setting/profile', 'UserController@profile');
    
    Route::get('/setting/outline', 'UserController@outline');
    Route::put('/setting/outline', 'UserController@outline_update');
    Route::delete('/setting/outline', 'UserController@outline_delete');
    
    Route::get('/setting/timer', 'UserController@timier');
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
