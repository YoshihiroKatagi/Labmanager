@extends('layouts.app')

@section('content')
    <a href="/labpage/membertask">メンバータスクページへ</a>
    <h1>メンバータスク詳細・コメント</h1>
    
    
    <h2>ラボタスク詳細</h2>
    <br>
    <p>ID: {{ $labtask->id }}</p>
    <h2>タイトル：{{ $labtask->title }}</h2>
    <p>詳細：{{ $labtask->description }}</p>
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
        <form action="/labpage/membertask/{{ $labtask->id }}/comment/{{ $comment->id }}" method="POST">
            @csrf
            @method('PUT')
            <br>
            <p>ID: {{ $comment->id }}</p>
            <p>内容：</p>
            <textarea name="comment[content]">{{ $comment->content }}</textarea>
            <p>labaskID: {{ $comment->labtask_id }}</p>
            <p>userID: {{ $comment->user_id }}</p>
            <p>created_at: {{ $comment->created_at }}</p>
            <p>mention_to: {{ $comment->mention_to }}</p>
            <p>いいね数：{{ $comment->is_liked }}</p>
            <input type="submit" value="保存">
            <br>
        </form>
    @endforeach
    
    <h2>コメント作成</h2>
    <form action="/labpage/membertask/{{ $labtask->id }}/comment" method="POST">
        @csrf
        <p>ユーザID:</p>
        <input type="text" name="comment[user_id]">
        <p>ラボタスクID:</p>
        <input type="text" name="comment[labtask_id]" value="{{ $labtask->id }}">
        <p>メンション：</p>
        <input type="text" name="comment[mention_to]">
        <p>コメント：</p>
        <textarea name="comment[content]" placeholder="コメントする..."></textarea>
        <input type="submit" value="送信">
    </form>
    
    <h2>ユーザ情報</h2>
    @foreach($users as $user)
        <br>
        <p>ID: {{ $user->id }}</p>
        <h2>ユーザ名：{{ $user->name }}</h2>
        <br>
    @endforeach
    
@endsection