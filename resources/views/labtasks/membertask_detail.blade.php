<!--メンバータスク詳細ページ(17)-->

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
        
        <div class="description" style="width:50%; text-align:center;">
            <a href="/labpage/membertask/{{ $User->id }}">戻る</a>
            <h1>{{ $User->name }}のラボタスク詳細</h1>
            <h2>ラボタスク：{{ $labtask->title }}</h2>
            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
            @if (Auth::id() != $User->id)
                @if (Auth::user()->is_lt_favorite($labtask->id))
                    <form action="/ltfavorite/unfavorite/{{ $labtask->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="image" name="submit" src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/good_button_done.svg">
                    </form>
                @else
                    <form action="/ltfavorite/favorite/{{ $labtask->id }}" method="POST">
                        @csrf
                        <input type="image" name="submit" src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/good_button.svg">
                    </form>
                @endif
            @endif
            <div>いいね！
                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
            </div>
            <a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment">コメント</a>
            <p>詳細：{{ $labtask->description }}</p>
            <div class="image">
                <h2>補足画像</h2>
                @foreach($images as $image)
                    <img src="{{ $image->image_path }}" style="width:30vw;">
                    <p>{{ $image->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection