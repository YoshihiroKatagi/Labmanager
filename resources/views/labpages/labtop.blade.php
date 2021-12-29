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
        
        <div class="labtop" style="width:60%; text-align:center;">
                <h1>Lab:{{ $labs[0]->name}}</h1>
                <p>description:{{ $labs[0]->description }}</p>
            
            <h2>Labtask</h2>
            @foreach($labtasks as $labtask)
                @if($labtask->is_done == 0)
                    <div class="labtask" style="border:solid; margin:20px;">
                        <h2>{{ $labtask->user->name }}</h2>
                        <h3>{{ $labtask->title }}</h3>
                        <p>{{ $labtask->created_at->format('Y年m月d日') }}</p>
                        <div>いいね！
                            <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                        </div>
                        <a href="/labpage/membertask/{{ Auth::user()->id }}/{{ $labtask->id }}">詳細確認</a>
                    </div>
                @endif
            @endforeach
    </div>
@endsection