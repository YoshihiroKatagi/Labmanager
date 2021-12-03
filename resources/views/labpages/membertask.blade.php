@extends('layouts.app')

@section('content')
    <a href="/labpage/labtop">ラボトップページへ</a>
    <h1>メンバータスクページ</h1>
    <h2>メンバータスク</h2>
    @foreach($labtasks as $labtask)
        <br>
        <p>ID：{{ $labtask->id }}</p>
        <h2>タイトル：<a href="/labpage/membertask/{{ $labtask->id }}/comment">{{ $labtask->title }}</a></h2>
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