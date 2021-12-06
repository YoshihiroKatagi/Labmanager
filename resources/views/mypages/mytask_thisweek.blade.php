<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex">
        <div class="filter" style="width:20%; text-align:center;">
            <h1>Filter</h1>
            <h2>現在のラボタスク</h2>
            @foreach($labtasks as $labtask)
                    <a href="/mypage/mytask/bylabtask/{{ $labtask->id }}">{{ $labtask->title }}</a><br>
            @endforeach
            
            <h2>日程別</h2>
            <a href="/mypage/mytask/today">Today</a><br>
            <a href="/mypage/mytask/tomorrow">Tomorrow</a><br>
            <a href="/mypage/mytask/thisweek">This Week</a><br>
            <a href="/mypage/mytask/thismonth">This Month</a><br>
        </div>

        <div class="content" style="width:50%; text-align:center;">
            <div class="create_mytask">
                <h2>新規作成</h2>
                <form action="/mypage/mytask/thisweek" method="POST">
                    @csrf
                    <input type="hidden" name="mytask[will_finish_on]" value="{{ \Carbon\Carbon::now()->endOfWeek() }}">
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
                <h1>This Week</h1>
                @foreach($mytasks as $mytask)
                    @if($mytask->task_state != 2)
                        <h3>タイトル：<a href="/mypage/mytask/thisweek/{{ $mytask->id }}">{{ $mytask->title }}</a></h3>
                        <p>関連ラボタスク：{{ $mytask->labtask->title }}</p>
                        <p>完了予定日：{{ $mytask->will_finish_on }}</p>
                        <form action="/mypage/mytask/thisweek/{{ $mytask->id }}" method="POST">
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
                <h2>Completed</h2>
                @foreach($mytasks as $mytask)
                    @if($mytask->task_state == 2)
                        <h3>タイトル：<a href="/mypage/mytask/thisweek/{{ $mytask->id }}">{{ $mytask->title }}</a></h3>
                        <form action="/mypage/mytask/thisweek/{{ $mytask->id }}" method="POST">
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
    </div>
@endsection