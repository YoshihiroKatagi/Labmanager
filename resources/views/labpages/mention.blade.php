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
        
        <div class="mention" style="width:80%; text-align:center;">
            <h1>メンション</h1>
            
            <h2>コメント</h2>
            @foreach($comments as $comment)
                <div class="comment" style="border:solid; margin:10px;">
                    <p>{{ $users["$comment->user_id"-1]->name }}</p>
                    <p>{{ $comment->content }}</p>
                    <p>{{ $comment->created_at->format('Y年m月d日') }}</p>
                    <p>@ {{ $users["$comment->mention_to"-1]->name }}</p>
                    @if (Auth::user()->is_c_favorite($comment->id))
                        <form action="/cfavorite/unfavorite/{{ $comment->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="image" name="submit" src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/good_button_done.svg">
                        </form>
                    @else
                        <form action="/cfavorite/favorite/{{ $comment->id }}" method="POST">
                            @csrf
                            <input type="image" name="submit" src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/good_button.svg">
                        </form>
                    @endif
                    <div>いいね！
                        <span class="badge badge-pill badge-success">{{ $comment->is_liked }}</span>
                    </div>
                    <a href="/labpage/membertask/{{ Auth::user()->id }}/{{ $comment->labtask->id }}/comment">詳細確認</a>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection