@extends('layouts.app')

@section('content')
    <h2>ラボタスク</h2>
    <h3>新規作成</h3>
    <form action="/mypage/labtask" method="POST">
        @csrf
        <h3>Title</h3>
        <input type="text" name="labtask[title]" placeholder="タイトル" value="{{ old('labtask.title') }}">
        <p style="color:red">{{ $errors->first('labtask.title') }}</p>
        <h3>Description</h3>
        <textarea name="labtask[description]" placeholder="説明">{{ old('labtask.description') }}</textarea>
        <p style="color:red">{{ $errors->first('labtask.description') }}</p>
        <input type="submit" value="保存">
    </form>
    @foreach($labtasks as $labtask)
        <br>
        <p>ID：{{ $labtask->id }}</p>
        <h2>タイトル：<a href="/mypage/labtask/{{ $labtask->id }}/edit">{{ $labtask->title }}</a></h2>
        <p>ユーザID：{{ $labtask->user_id }}</p>
        <p>作成日時：{{ $labtask->created_at }}</p>
        <p>タスク状態：{{ $labtask->is_done }}</p>
        <p>いいね数：{{ $labtask->is_liked }}</p>
        <br>
    @endforeach
    <br>
    <h3>研究概要</h3>
    @foreach($users as $user)
        <br>
        <p>ID：{{ $user->id }}</p>
        <h3>ユーザ名：{{ $user->name }}</h3>
        <p>研究テーマ：{{ $user->thema }}</p>
        <p>研究背景：{{ $user->background }}</p>
        <p>研究動機：{{ $user->motivation }}</p>
        <p>研究目的：{{ $user->object }}</p>
        <br>
    @endforeach
@endsection