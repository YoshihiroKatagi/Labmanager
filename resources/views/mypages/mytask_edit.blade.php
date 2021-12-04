<!--マイタスクページ(1)（詳細ポップアップ）-->

@extends('layouts.app')

@section('content')
    <a href="/mypage/mytask">戻る</a>
    <h2>マイタスク詳細・編集</h2>
    <form action="/mypage/mytask/{{ $mytask->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <p>タイトル：</p>
        <input type="text" name="mytask[title]" value="{{ $mytask->title }}">
        <p style="color:red">{{ $errors->first('mytask.title') }}</p>
        <p>詳細：</p>
        <textarea name="mytask[description]">{{ $mytask->description }}</textarea>
        <p style="color:red">{{ $errors->first('mytask.description') }}</p>
        <p>開始予定日：</p>
        <input type="date" name="mytask[will_begin_on]" value="{{ $mytask->will_begin_on }}">
        <p>開始予定時刻：</p>
        <input type="time" name="mytask[will_begin_at]" value="{{ $mytask->will_begin_at }}">
        <p>完了予定日：</p>
        <input type="date" name="mytask[will_finish_on]" value="{{ $mytask->will_finish_on }}">
        <p>完了予定時刻：</p>
        <input type="time" name="mytask[will_finish_at]" value="{{ $mytask->will_finish_at }}">
        <p>想定タイマー数：</p>
        <input type="number" name="mytask[timer_count]" value="{{ $mytask->timer_count }}">
        <p>関連ラボタスク</p>
            <select name="mytask[labtask_id]">
                @foreach($labtasks as $labtask)
                    <option value="{{ $labtask->id }}">{{ $labtask->title }}</option>
                @endforeach
            </select>
        <input type="submit" value="保存">
    </form>
    <p>作成日：{{ $mytask->created_at->format('Y年m月d日') }}</p>
    <p>完了日時：{{ $mytask->is_finished_at }}</p>
    <p>タスク状態：{{ $mytask->task_state }}</p>
    <p>結果タイマー数：{{ $mytask->timer_result }}</p>
    <p>期限内完了：{{ $mytask->on_time_or_not }}</p>
    <p>想定タイマー数完了：{{ $mytask->within_timer_count }}</p>
    
    <form action="/mypage/mytask/{{ $mytask->id }}/edit" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除">
    </form>
@endsection