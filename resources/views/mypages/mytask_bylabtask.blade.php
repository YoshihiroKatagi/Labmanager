<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <a href="/mypage/mytask">マイタスクページトップへ</a>
    <a href="/labpage/labtop">ラボトップページへ</a>
    <h2>マイタスクページ</h2>
    <div class="create_mytask">
        <h2>新規作成</h2>
        <form action="/mypage/mytask/{{ $mytasks[0]->labtask->id }}" method="POST">
            @csrf
            <input type="hidden" name="mytask[labtask_id]" value="{{ $mytasks[0]->labtask->id }}">
            <input type="text" name="mytask[title]" placeholder="Press Enter to Add Task" value="{{ old('mytask.title') }}">
            <p style="color:red">{{ $errors->first('mytask.title') }}</p>
        </form>
    </div>
    <br>
    
    <div class="filter">
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

    <div class="mytask_list">
        <h1>ラボタスク：{{ $mytasks[0]->labtask->title }}</h1>
        @foreach($mytasks as $mytask)
            @if($mytask->task_state != 2)
                <h3>タイトル：<a href="/mypage/mytask/{{ $mytask->id }}/edit">{{ $mytask->title }}</a></h3>
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
        <h2>完了したタスク</h2>
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
@endsection