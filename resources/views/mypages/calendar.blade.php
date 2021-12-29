
@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex;">
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
            
            <div class="calendar" style="width:60%;">
                <h1>カレンダー</h1>
                @foreach($events as $event)
                    <p>予定：{{ $event['summary'] }}</p>
                    <p>{{ $event['start'] }} ~ {{ $event['end'] }}</p>
                    <br>
                @endforeach
            </div>
    </div>
@endsection