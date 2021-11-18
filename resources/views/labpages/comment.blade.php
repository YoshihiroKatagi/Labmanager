@extends('layouts.app')

@section('content')
    <h1>メンバータスク詳細・コメント</h1>
    
    <h2>ユーザ情報</h2>
    @foreach($users as $user)
        <br>
        <p>ID: {{ $user->id }}</p>
        <h2>ユーザ名：{{ $user->name }}</h2>
        <br>
    @endforeach
    <br>
    
    <h2>ラボタスク</h2>
    @foreach($labtasks as $labtask)
        <br>
        <p>ID: {{ $labtask->id }}</p>
        <h2>タイトル：{{ $labtask->title }}</h2>
        <p>詳細：{{ $labtask->description }}</p>
        <br>
    @endforeach
    <br>
    
    @foreach($images as $image)
        <br>
        <img src="{{ $image->image_path }}">
        <p>説明：{{ $image->description }}</p>
        <br>
    @endforeach
    <br>
    
    <h2>コメント</h2>
    @foreach($comments as $comment)
        <br>
        <p>ID: {{ $comment->id }}</p>
        <p>内容：{{ $comment->content }}</p>
        <p>labaskID: {{ $comment->labtask_id }}</p>
        <p>userID: {{ $comment->user_id }}</p>
        <p>created_at: {{ $comment->created_at }}</p>
        <p>mention_to: {{ $comment->mention_to }}</p>
        <p>いいね数：{{ $comment->is_liked }}</p>
        <br>
    @endforeach
@endsection