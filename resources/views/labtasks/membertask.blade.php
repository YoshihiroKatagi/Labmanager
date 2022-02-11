<!--メンバータスクページ(7)-->

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
        
        
        <!-- Labtask一覧 -->
        <div class="col-md-9" style="margin:0 auto;">
            <h1>
              <img src="{{ $User->icon }}" style="width:70px; height:70px; border-radius:50%; object-fit:cover; border:solid; border-width:thin; color:black;">
              {{ $User->name }}のLabtask
            </h1><br>
            
            <!-- 一覧 -->
            <div>
              <h2>Todo</h2>
              <div class="row">
                @foreach($labtasks_todo as $labtask)
                  @if($labtask->is_done == 0)
                      <div  class="card col-md-4 m-3">
                          <div class="card-body">
                            <div style="display:flex;">
                              <div style="margin-left:auto;">
                                <p>{{ $labtask->created_at->format('Y年m月d日') }}</p>
                              </div>
                            </div>
                            <div style="text-align:center;">
                              <h2 class="card-title"><a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                              <div>Good: 
                                  <span class="badge bg-primary">{{ $labtask->is_liked }}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                  @endif
                @endforeach
                <br>
              </div>
            </div><br>
            
            <div>
              <h2>Completed</h2>
              <div class="row">
                @foreach($labtasks_completed as $labtask)
                  @if($labtask->is_done == 1)
                      <div  class="card col-md-4 m-3">
                          <div class="card-body">
                            <div style="display:flex;">
                              <div style="margin-left:auto;">
                                <p>{{ $labtask->created_at->format('Y年m月d日') }}</p>
                              </div>
                            </div>
                            <div style="text-align:center;">
                              <h2 class="card-title"><a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                              <div>Good: 
                                  <span class="badge bg-primary">{{ $labtask->is_liked }}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                  @endif
                @endforeach
                <br>
              </div>
            </div><br>
            
            <div class="card col-md-9 m-5 p-3">
                <h2>研究概要</h2>
                <h5>Theme: {{ $User->thema }}</h5>
                <h6>Background: {{ $User->background }}</h6>
                <h6>Object: {{ $User->motivation }}</h6>
                <h6>Goal: {{ $User->object }}</h6>
            </div>
        </div>
        
    </div>
@endsection