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
        <div class="col-md-9">
            <h1 style="margin-left:15px;">Labtask Detail</h1>
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
        
    </div>
@endsection