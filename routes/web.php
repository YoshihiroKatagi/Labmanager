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

Route::get('/', 'MytaskController@index');

Route::group(['middleware' => 'auth'], function(){
    //マイタスクページ
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
    
    Route::post('mypage/labtask/{labtask}', 'LabtaskController@image_create');
    Route::put('/mypage/labtask/{labtask}/{image}', 'LabtaskController@image_update');
    Route::delete('/mypage/labtask/{labtask}/{image}', 'LabtaskController@image_delete');
    
    
    //メンバータスクページ
    Route::get('/labpage/membertask/{user}', 'LabtaskController@membertask');
    Route::get('/labpage/membertask/{user}/{labtask}', 'LabtaskController@membertask_detail');
    
    
    //コメントページ
    Route::get('/labpage/membertask/{user}/{labtask}/comment', 'CommentController@comment');
    Route::post('/labpage/membertask/{user}/{labtask}/comment', 'CommentController@comment_post');
    Route::get('/labpage/membertask/{user}/{labtask}/comment/{comment}', 'CommentController@comment_edit');
    Route::put('/labpage/membertask/{user}/{labtask}/comment/{comment}', 'CommentController@comment_update');
    Route::delete('/labpage/membertask/{user}/{labtask}/comment/{comment}', 'CommentController@comment_delete');
    
    //いいね処理
    Route::post('/ltfavorite/favorite/{labtask}', 'FavoriteController@ltfavorite_store');
    Route::delete('/ltfavorite/unfavorite/{labtask}', 'FavoriteController@ltfavorite_destroy');
    Route::post('/cfavorite/favorite/{comment}', 'FavoriteController@cfavorite_store');
    Route::delete('/cfavorite/unfavorite/{comment}', 'FavoriteController@cfavorite_destroy');
    
    
    //カレンダーページ
    // Route::get('/mypage/calendar', 'ApiController@test');
    Route::get('/mypage/calendar', 'ApiController@getEvents');
    
    //統計ページ
    Route::get('/mypage/statistic', 'DataController@statistic');
    
    
    //ラボトップページ
    Route::get('/labpage/top', 'LabpageController@index');
    
    //メンションページ
    Route::get('/labpage/mention', 'LabpageController@mention');
    
    //ランキングページ
    Route::get('/labpage/ranking', 'DataController@ranking');
    
    
    //設定ページ
    Route::get('/setting/account', 'UserController@account');
    Route::post('/setting/account', 'UserController@account_icon');
    Route::put('/setting/account', 'UserController@account_update');
    
    Route::get('/setting/outline', 'UserController@outline');
    Route::put('/setting/outline', 'UserController@outline_update');
    
    Route::get('/setting/timer', 'UserController@timer');
    Route::put('/setting/timer', 'UserController@timer_update');
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
