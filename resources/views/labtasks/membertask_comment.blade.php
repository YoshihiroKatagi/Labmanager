<!--コメントページ-->

@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex;">
        
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
                  <a class="list-group-item list-group-item-action active dropdown-toggle" aria-current="true" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/member.svg">メンバー
                  </a>
                
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($users as $user)
                      <li><a class="dropdown-item" href="/labpage/membertask/{{ $user->id }}"><img src="{{ $user->icon }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover; border:solid; border-width:thin; color:black;">{{ $user->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              <a href="/labpage/mention" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
              <a href="/labpage/ranking" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
            </div>
        </div>
        
        <!-- Labtask詳細 -->
        <div class="col-md-6">
            <h1 style="margin-left:15px;">Labtask Detail & Comment</h1>
            <div class="card m-3 p-3" style="text-align:center;">
                <div style="display:flex;">
                    <div style="text-align:left;">
                        <a href="/labpage/membertask/{{ $User->id }}">back</a>
                    </div>
                    <div style="margin-left:auto;">
                        <p>{{ $labtask->created_at->format('Y年m月d日') }}</p>
                    </div>
                </div>
                <div style="text-align:right;">
                    <h5><a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment">Make a commment</a></h5>
                </div>
                <h2>{{ $User->name }} -{{ $labtask->title }}</h2>
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
                <div>Good: 
                    <span class="badge bg-primary">{{ $labtask->is_liked }}</span>
                </div>
                <div style="text-align:left;">
                    <h4>Description:</h4>
                    <p>{{ $labtask->description }}</p>
                </div>
                <div class="mt-4" style="text-align:left;">
                    <h4>Figures:</h4>
                    <div style="text-align:center;">
                        @foreach($images as $image)
                            <div class="m-5">
                                <figure class="figure">
                                    <img src="{{ $image->image_path }}" style="width:15vw;">
                                    <figcaption>{{ $image->description }}</figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Comments -->
        <div class="col-md-4 mt-3">
            <div class="comment_list">
                <button type="button" class="btn-close" aria-label="Close" onclick="location.href='/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}'"></button>
                <h2>Comments</h2>
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
                                @if ($comment->user_id == Auth::user()->id)
                                    <div style="text-align:right;">
                                        <a class="btn btn-secondary" href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment/{{ $comment->id }}" role="button">Edit</a>
                                    </div>
                                @else
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
                                @endif
                                <div>Good: 
                                    <span class="badge bg-primary">{{ $comment->is_liked }}</span>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            
            <!-- 新規コメント -->
            <div class="mt-4">
                <h2>New Comment</h2>
                <div class="card p-3">
                    <form action="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment" method="POST">
                        @csrf
                        <input type="hidden" name="comment[user_id]" value={{ Auth::user()->id }}>
                        <input type="hidden" name="comment[labtask_id]" value="{{ $labtask->id }}">
                        <div class="col-md-4 mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <select class="form-select" name="comment[mention_to]" id="mention_to">
                                    @foreach($users as $user)
                                        @if($user->id != Auth::user()->id)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" name="comment[content]" style="height: 100px" placeholder="comment..."></textarea>
                          <p style="color:red">{{ $errors->first('comment.content') }}</p>
                        </div>
                        <div class="d-grid gap-2 d-md-block" style="text-align:right;">
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                        <div class="mb-3 d-grid gap-2">
                            
                        </div>
                    </form>
                </div>
            </div>
            
            
            
        </div>
    </div>
@endsection