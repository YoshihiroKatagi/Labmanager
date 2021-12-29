<!--メンバータスクページ(7)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex;">
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
                            <a href="/labpage/membertask/{{ $user->id }}"><img src="{{ $user->icon }}" style="width:40px; height:40px; border-radius:50%; object-fit:cover; border:solid; color:black;">{{ $user->name }}</a>
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
        
        <div class="labtask" style="width:50%; text-align:center;">
            <h1>{{ $User->name }}のラボタスク</h1>
            <div class="labtasks" style="display:flex; flex-wrap:wrap; text-align:center;">
                @foreach($labtasks as $labtask)
                    @if($labtask->is_done == 0)
                        <div class="labtask" style="width:40%; margin:20px; border:solid;">
                            <h2>タイトル：<a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                            <div>いいね！
                                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                            </div>
                            <br>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
            <h1>Completed</h1>
            <div class="completed" style="display:flex; flex-wrap:wrap; text-align:center;">
                @foreach($labtasks as $labtask)
                    @if($labtask->is_done == 1)
                        <div class="labtask" style="width:40%; margin:20px; border:solid;">
                            <h2>タイトル：<a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                            <div>いいね！
                                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                            </div>
                            <br>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
        </div>
        
        <div class="research" style="width:30%;">
            <h2>研究概要</h2>
            <p>ユーザ名：{{ $User->name }}</h2>
            <p>研究テーマ：{{ $User->thema }}</p>
            <p>研究背景：{{ $User->background }}</p>
            <p>研究動機：{{ $User->motivation }}</p>
            <p>研究目的：{{ $User->object }}</p>
            <br>
        </div>
    </div>
@endsection