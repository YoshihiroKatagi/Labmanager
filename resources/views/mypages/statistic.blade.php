<!-- マイタスクページ(1)-->

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
              <a href="/mypage/statistic" class="list-group-item list-group-item-action active"  aria-current="true"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/statistic.svg">統計</a>
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
              <a href="/labpage/mention" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
              <a href="/labpage/ranking" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
            </div>
        </div>
        
        <!-- Todoリスト -->
        <div class="col-md-9 text-center">
            <h1>Statistic</h1><br>
            <div class="m-5"></div>
            <h2>Mytask Consumption</h2>
            <div class="row justify-content-md-center">
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>Today: 
                        <span class="badge bg-danger">{{ $mytask_achieve_count_day }}</span>
                    </h3>
                </div>
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>This Week: 
                        <span class="badge bg-danger">{{ $mytask_achieve_count_week }}</span>
                    </h3>
                </div>
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>This Month: 
                    <span class="badge bg-danger">{{ $mytask_achieve_count_month }}</span>
                    </h3>
                </div>
            </div>
            <div class="m-5"></div>
            <h2>Number of Good</h2>
            <div class="row justify-content-md-center">
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>Today: 
                        <span class="badge bg-info">{{ $labtask_good_count_day + $comment_good_count_day }}</span>
                    </h3>
                </div>
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>This Week: 
                        <span class="badge bg-info">{{ $labtask_good_count_week + $comment_good_count_week }}</span>
                    </h3>
                </div>
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>This Month: 
                    <span class="badge bg-info">{{ $labtask_good_count_month + $comment_good_count_month }}</span>
                    </h3>
                </div>
            </div>
            <div class="m-5"></div>
            <h2>Labtask Consumption</h2>
            <div class="row justify-content-md-center">
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>Today: 
                        <span class="badge bg-success">{{ $labtask_achieve_count_day }}</span>
                    </h3>
                </div>
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>This Week: 
                        <span class="badge bg-success">{{ $labtask_achieve_count_week }}</span>
                    </h3>
                </div>
                <div class="card col-md-3 m-3 p-3 text-center">
                    <h3>This Month: 
                    <span class="badge bg-success">{{ $labtask_achieve_count_month }}</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection