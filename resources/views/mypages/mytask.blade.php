@extends('layouts.app')

@section('content')
    <h2>マイタスク</h2>
    @foreach($mytasks as $mytask)
        <br>
        <p>ID：{{ $mytask->id }}</p>
        <h2>タイトル：{{ $mytask->title }}</h2>
        <p>ラボタスクID：{{ $mytask->labtask_id }}</p>
        <p>詳細：{{ $mytask->description }}</p>
        <p>作成日：{{ $mytask->created_at }}</p>
        <p>タスク状態：{{ $mytask->task_state }}</p>
        <br>
    @endforeach
    <br>
    <h3>ラボタスク</h3>
    @foreach($labtasks as $labtask)
        <br>
        <p>ID：{{ $labtask->id }}</p>
        <h3>タイトル：{{ $labtask->title }}</h3>
        <p>ユーザID：{{ $labtask->user_id }}</p>
        <p>詳細：{{ $labtask->description }}</p>
        <p>作成日時：{{ $labtask->created_at }}</p>
        <p>タスク状態：{{ $labtask->is_done }}</p>
        <p>いいね数：{{ $labtask->is_liked }}</p>
        <br>
    @endforeach
@endsection