<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <a href="/mypage/mytask">マイタスクページトップへ</a>
    <a href="/labpage/labtop">ラボトップページへ</a>
    <h2>マイタスクページ</h2>
    <div class="create_mytask">
        <h2>新規作成</h2>
        <form action="/mypage/mytask" method="POST">
            @csrf
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
        <h3>Today</h3>
        @foreach($mytasks as $mytask)
            @if($mytask->task_state != 2)
                <h3>タイトル：<a href="/mypage/mytask/{{ $mytask->id }}/edit">{{ $mytask->title }}</a></h3>
                <p>完了予定日：{{ $mytask->will_finish_on }}</p>
                <p>タスク状態：{{ $mytask->task_state }}</p>
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
@endsection