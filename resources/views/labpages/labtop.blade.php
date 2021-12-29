<!--ラボトップページ(5)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center; display:flex;">
        <div class="side_bar" style="width:20%; text-align:center; border:solid;">
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/mytask/today"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイページ</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/labpage/top"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtop.svg">ラボトップ</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/member.svg">メンバー
                </h2>
                @foreach($users as $user)
                    <div style="border:solid;">
                        <h3>
                            <a href="/labpage/membertask/{{ $user->id }}">{{ $user->name }}</a>
                        </h3>
                    </div>
                @endforeach
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/labpage/mention"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/labpage/ranking"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
                </h2>
            </div>
        </div>
        
        <div class="labtop" style="width:80%; text-align:center;">
            <h1>ラボトップページ</h1>
            <h2>ラボ情報</h2>
            @foreach($labs as $lab)
                <p>ID:{{ $lab->id }}</p>
                <h2>ラボ名：{{ $lab->name}}</h2>
                <p>Introduction：{{ $lab->description }}</p>
            @endforeach
            <br>
            
            <h2>ラボイベント</h2>
            @foreach($events as $event)
                <br>
                <p>ID:{{ $event->id }}</p>
                <h2>イベント名：{{ $event->title}}</h2>
                <p>日付：{{ $event->date }}</p>
                <p>時刻：{{ $event->start_at }} - {{ $event->end_at }}</p>
                <p>繰り返し：{{$event->repeat }}</p>
                <br>
            @endforeach
            <br>
            
            <h2>ラボタスク</h2>
            @foreach($labtasks as $labtask)
                <br>
                <p>ID：{{ $labtask->id }}</p>
                <h2>タイトル：{{ $labtask->title }}</h2>
                <p>ユーザID：{{ $labtask->user_id }}</p>
                <p>作成日時：{{ $labtask->created_at }}</p>
                <p>タスク状態：{{ $labtask->is_done }}</p>
                <p>いいね数：{{ $labtask->is_liked }}</p>
                <br>
            @endforeach
            <br>
            
            <h3>研究室メンバー</h3>
            @foreach($users as $user)
                <br>
                <p>ID：{{ $user->id }}</p>
                <h3>ユーザ名：{{ $user->name }}</h3>
                <br>
            @endforeach
        </div>
    </div>
@endsection