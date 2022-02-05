<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex">
        
        <!-- サイドバー -->
        <div class="col-md-2">
            <div class="list-group">
              <h3>Mypage</h3>
              <a href="/mypage/mytask/today" class="list-group-item list-group-item-action active" aria-current="true">
                <img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク
              </a>
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
                      <li><a class="dropdown-item" href="/labpage/membertask/{{ $user->id }}"><img src="{{ $user->icon }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover; border:solid; color:black;">{{ $user->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              <a href="/labpage/mention" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
              <a href="/labpage/ranking" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
            </div>
            
        </div>
        
        <!-- フィルター -->
        
        <div class="col-md-2">
            <h1>Filter</h1>
            <div class="list-group list-group-flush">
              <h3>Labtask</h3>
              @foreach($labtasks as $labtask)
                <a href="/mypage/mytask/bylabtask/{{ $labtask->id }}" class="list-group-item list-group-item-action">
                  {{ $labtask->title }}
                </a>
              @endforeach
            </div><br>
            <div class="list-group list-group-flush">
              <h3>Due Date</h3>
              <a href="/mypage/mytask/today" class="list-group-item list-group-item-action">Today</a>
              <a href="/mypage/mytask/tomorrow" class="list-group-item list-group-item-action">Tomorrow</a>
              <a href="/mypage/mytask/thisweek" class="list-group-item list-group-item-action">This Week</a>
              <a href="/mypage/mytask/thismonth" class="list-group-item list-group-item-action">This Month</a>
            </div>
        </div>
        
        <!-- Todoリスト -->
        
        <div class="col-md-5">
            <div class="create_mytask">
                <h2>New</h2>
                <form action="/mypage/mytask/today" method="POST">
                    @csrf
                    <input type="hidden" name="mytask[will_finish_on]" value="{{ \Carbon\Carbon::today() }}">
                    <select name="mytask[labtask_id]">
                        @foreach($labtasks as $labtask)
                            <option value="{{ $labtask->id }}">{{ $labtask->title }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="mytask[title]" placeholder="Press Enter to Add Task" value="{{ old('mytask.title') }}">
                    <p style="color:red">{{ $errors->first('mytask.title') }}</p>
                </form>
            </div>
            <br>
            <div class="mytask_list">
                <h1>Today</h1>
                @foreach($mytasks as $mytask)
                    @if($mytask->labtask->user_id == Auth::user()->id)
                        @if($mytask->task_state != 2)
                            <h3>タイトル：<a href="/mypage/mytask/today/{{ $mytask->id }}">{{ $mytask->title }}</a></h3>
                            <p>関連ラボタスク：{{ $mytask->labtask->title }}</p>
                            <p>完了予定日：{{ $mytask->will_finish_on }}</p>
                            <form action="/mypage/mytask/today/{{ $mytask->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="checkbox" name="mytask[task_state]" value=1>doing
                                <input type="checkbox" name="mytask[task_state]" value=2>done
                                <input type="submit" value="保存">
                            </form>
                            <br>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="complete_list">
                <h2>Completed</h2>
                @foreach($mytasks as $mytask)
                    @if($mytask->labtask->user_id == Auth::user()->id)
                        @if($mytask->task_state == 2)
                            <h3>タイトル：<a href="/mypage/mytask/today/{{ $mytask->id }}">{{ $mytask->title }}</a></h3>
                            <form action="/mypage/mytask/today/{{ $mytask->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="checkbox" name="mytask[task_state]" value=0>todo
                                <input type="submit" value="保存">
                            </form>
                            <br>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        
        <!-- 詳細・編集 -->
        
        <div class="col-md-3">
            <a href="/mypage/mytask/today">閉じる</a>
            <h2>マイタスク詳細・編集</h2>
            <form action="/mypage/mytask/today/{{ $Mytask->id }}" method="POST">
                @csrf
                @method('PUT')
                <p>タイトル：</p>
                <input type="text" name="mytask[title]" value="{{ $Mytask->title }}">
                <p style="color:red">{{ $errors->first('mytask.title') }}</p>
                <p>詳細：</p>
                <textarea name="mytask[description]">{{ $Mytask->description }}</textarea>
                <p style="color:red">{{ $errors->first('mytask.description') }}</p>
                <p>開始予定日：</p>
                <input type="date" name="mytask[will_begin_on]" value="{{ $Mytask->will_begin_on }}">
                <p>開始予定時刻：</p>
                <input type="time" name="mytask[will_begin_at]" value="{{ $Mytask->will_begin_at }}">
                <p>完了予定日：</p>
                <input type="date" name="mytask[will_finish_on]" value="{{ $Mytask->will_finish_on }}">
                <p>完了予定時刻：</p>
                <input type="time" name="mytask[will_finish_at]" value="{{ $Mytask->will_finish_at }}">
                <p>想定タイマー数：</p>
                <input type="number" name="mytask[timer_count]" value="{{ $Mytask->timer_count }}" min='0'>
                <p style="color:red">{{ $errors->first('mytask.timer_count') }}</p>
                <p>関連ラボタスク</p>
                    <select name="mytask[labtask_id]">
                        @foreach($labtasks as $labtask)
                            @if($labtask->id == $Mytask->labtask_id)
                                <option value="{{ $labtask->id }}" selected>{{ $labtask->title }}</option>
                            @else
                                <option value="{{ $labtask->id }}">{{ $labtask->title }}</option>
                            @endif
                        @endforeach
                    </select>
                <input type="submit" value="保存">
            </form>
            <p>作成日：{{ $Mytask->created_at->format('Y年m月d日') }}</p>
            <p>タイマー数：{{ $Mytask->timer_result }}</p>
            
            <form action="/mypage/mytask/today/{{ $Mytask->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除">
            </form>
        </div>
    </div>
@endsection