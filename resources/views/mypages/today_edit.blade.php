<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <a href="/mypage/mytask">マイタスクページトップへ</a>
    <a href="/labpage/labtop">ラボトップページへ</a>
    
    <div class="filter">
        <h1>Filter</h1>
        <h2>現在のラボタスク</h2>
        @foreach($labtasks as $labtask)
                <a href="/mypage/mytask/{{ $labtask->id }}">{{ $labtask->title }}</a><br>
        @endforeach
        
        <h2>日程別</h2>
        <a href="/mypage/mytask/today">Today</a><br>
        <a href="/mypage/mytask/tomorrow">Tomorrow</a><br>
        <a href="/mypage/mytask/thisweek">This Week</a><br>
        <a href="/mypage/mytask/thismonth">This Month</a><br>
    </div>
    
    <div class="content">
        <div class="create_mytask">
            <h2>新規作成</h2>
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
                @if($mytask->task_state != 2)
                    <h3>タイトル：<a href="/mypage/mytask/{{ $mytask->id }}/edit">{{ $mytask->title }}</a></h3>
                    <p>関連ラボタスク：{{ $mytask->labtask->title }}</p>
                    <p>完了予定日：{{ $mytask->will_finish_on }}</p>
                    <form action="/mypage/mytask/{{ $mytask->id }}/edit" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="mytask[task_state]" value=0>todo
                        <input type="checkbox" name="mytask[task_state]" value=1>doing
                        <input type="checkbox" name="mytask[task_state]" value=2>done
                        <input type="submit" value="保存">
                    </form>
                    <br>
                @endif
            @endforeach
        </div>
        <div class="complete_list">
            <h2>Complete</h2>
            @foreach($mytasks as $mytask)
                @if($mytask->task_state == 2)
                    <h3>タイトル：<a href="/mypage/mytask/{{ $mytask->id }}/edit">{{ $mytask->title }}</a></h3>
                    <form action="/mypage/mytask/{{ $mytask->id }}/edit" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="mytask[task_state]" value=0>todo
                        <input type="submit" value="保存">
                    </form>
                    <br>
                @endif
            @endforeach
        </div>
    </div>
    
    <div class="edit_sidebar">
        <a href="/mypage/mytask">戻る</a>
        <h2>マイタスク詳細・編集</h2>
        <form action="/mypage/mytask/today/{{ $Mytask->id }}" method="POST">
            @csrf
            @method('PUT')
            <p>タイトル：</p>
            <input type="text" name="Mytask[title]" value="{{ $Mytask->title }}">
            <p style="color:red">{{ $errors->first('Mytask.title') }}</p>
            <p>詳細：</p>
            <textarea name="Mytask[description]">{{ $Mytask->description }}</textarea>
            <p style="color:red">{{ $errors->first('Mytask.description') }}</p>
            <p>開始予定日：</p>
            <input type="date" name="Mytask[will_begin_on]" value="{{ $Mytask->will_begin_on }}">
            <p>開始予定時刻：</p>
            <input type="time" name="Mytask[will_begin_at]" value="{{ $Mytask->will_begin_at }}">
            <p>完了予定日：</p>
            <input type="date" name="Mytask[will_finish_on]" value="{{ $Mytask->will_finish_on }}">
            <p>完了予定時刻：</p>
            <input type="time" name="Mytask[will_finish_at]" value="{{ $Mytask->will_finish_at }}">
            <p>想定タイマー数：</p>
            <input type="number" name="Mytask[timer_count]" value="{{ $Mytask->timer_count }}">
            <p>関連ラボタスク</p>
                <select name="Mytask[labtask_id]">
                    @foreach($labtasks as $labtask)
                        <option value="{{ $labtask->id }}">{{ $labtask->title }}</option>
                    @endforeach
                </select>
            <input type="submit" value="保存">
        </form>
        <p>作成日：{{ $Mytask->created_at->format('Y年m月d日') }}</p>
        <p>完了日時：{{ $Mytask->is_finished_at }}</p>
        <p>タスク状態：{{ $Mytask->task_state }}</p>
        <p>結果タイマー数：{{ $Mytask->timer_result }}</p>
        <p>期限内完了：{{ $Mytask->on_time_or_not }}</p>
        <p>想定タイマー数完了：{{ $Mytask->within_timer_count }}</p>
        
        <form action="/mypage/mytask/{{ $Mytask->id }}/edit" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除">
        </form>
    </div>
@endsection