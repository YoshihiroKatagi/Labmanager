<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex">
        <div class="side_bar" style="width:20%; text-align:center; border:solid;">
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/labpage/top"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtop.svg">ラボページ</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/mytask/today"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/labtask"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtask.svg">ラボタスク</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/calendar"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/calendar.svg">カレンダー</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/statistic"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/statistic.svg">統計</a>
                </h2>
            </div>
        </div>
        
        <div class="filter" style="width:15%; text-align:center;">
            <h1>Filter</h1>
            <h2>Labtask</h2>
            @foreach($labtasks as $labtask)
                    <a href="/mypage/mytask/bylabtask/{{ $labtask->id }}">{{ $labtask->title }}</a><br>
            @endforeach
            
            <h2>Due Date</h2>
            <a href="/mypage/mytask/today">Today</a><br>
            <a href="/mypage/mytask/tomorrow">Tomorrow</a><br>
            <a href="/mypage/mytask/thisweek">This Week</a><br>
            <a href="/mypage/mytask/thismonth">This Month</a><br>
        </div>
        
        <div class="content" style="width:35%; text-align:center;">
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
                    @
                @endforeach
            </div>
        </div>
        
        <div class="edit_sidebar" style="width:30%; text-align:center;">
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