<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex">
        <div class="side_bar" style="width:20%; text-align:center; border:solid;">
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/labpage/top"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtop.svg">ラボページ</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/mytask/today"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/labtask"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtask.svg">ラボタスク</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/calendar"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/calendar.svg">カレンダー</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/statistic"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/statistic.svg">統計</a>
                </h2>
            </div>
        </div>

        <div class="content" style="width:70%; text-align:center;">
            <div class="mytask_achieve" style="height:200px; margin:10px; border:solid; text-align:center;">
                <h2>マイタスク消費数</h2>
                <p>Today:{{ $mytask_achieve_count_day }}</p>
                <p>This Week:{{ $mytask_achieve_count_week }}</p>
                <p>This Month:{{ $mytask_achieve_count_month }}</p>
            </div>
            <div class="mytask_achieve" style="height:200px; margin:10px; border:solid; text-align:center;">
                <h2>ラボタスク消費数</h2>
                <p>Today:{{ $labtask_achieve_count_day }}</p>
                <p>This Week:{{ $labtask_achieve_count_week }}</p>
                <p>This Month:{{ $labtask_achieve_count_month }}</p>
            </div>
            <div class="mytask_achieve" style="height:200px; margin:10px; border:solid; text-align:center;">
                <h2>いいね獲得数</h2>
                <p>This Today:{{ $labtask_good_count_day + $comment_good_count_day }}</p>
                <p>This Week:{{ $labtask_good_count_week + $comment_good_count_week }}</p>
                <p>This Month:{{ $labtask_good_count_month + $comment_good_count_month }}</p>
            </div>
        </div>
    </div>
@endsection