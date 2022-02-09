@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex">
        
        <!-- サイドバー -->
        <div class="col-md-2">
            <div class="list-group">
              <h3>Mypage</h3>
              <a href="/mypage/mytask/today" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク</a>
              <a href="/mypage/labtask" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtask.svg">ラボタスク</a>
              <a href="/mypage/calendar" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/calendar.svg">カレンダー</a>
              <a href="/mypage/statistic" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/statistic.svg">統計</a>
            </div><br>
            <div class="list-group">
              <h3>Labpage</h3>
              <a href="/labpage/top" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtop.svg">ラボページ</a>
              <div class="dropdown">
                  <a class="list-group-item list-group-item-action dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/member.svg">メンバー
                  </a>
                
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($users as $user)
                      <li><a class="dropdown-item" href="/labpage/membertask/{{ $user->id }}"><img src="{{ $user->icon }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover; border:solid; border-width:thin; color:black;">{{ $user->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              <a href="/labpage/mention" class="list-group-item list-group-item-action active" aria-current="true"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
              <a href="/labpage/ranking" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
            </div>
        </div>
        
        <!-- Todoリスト -->
        <div class="col-md-9">
            <div class="text-center">
                <h1>Mention</h1>
                <h2>Comments mentioned to you</h2>
                <div class="col-md-7 mx-auto">
                    @foreach($comments as $comment)
                        <div class="card m-3 p-3">
                            <div style="display:flex;">
                                <img src="{{ $comment->user->icon }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover; border:solid; border-width:thin; color:black;">
                                <h5>{{ $comment->user->name }}</h5>
                                <div style="margin-left:auto;">
                                    <p>{{ $comment->created_at->format('Y年m月d日') }}</p>
                                </div>
                            </div>
                            <p>@ {{ $users["$comment->mention_to"-1]->name }}</p>
                            <p>{{ $comment->content }}</p>
                            <div style="text-align:center;">
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
                                <div>Good: 
                                    <span class="badge bg-primary">{{ $comment->is_liked }}</span>
                                </div>
                                <div style="text-align:right;">
                                    <a class="btn btn-secondary" href="/labpage/membertask/{{ Auth::user()->id }}/{{ $comment->labtask->id }}/comment" role="button">Check and Reply</a>
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection