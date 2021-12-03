<!--ラボタスク詳細ページ(15)-->

@extends('layouts.app')

@section('content')
    <a href="/mypage/labtask">戻る</a>
    <h1>ラボタスク詳細</h1>
    <p>ID：{{$labtask->id }}</p>
    <form action="/mypage/labtask/{{ $labtask->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <h2>タイトル：</h2>
        <input type="text" name="labtask[title]" value="{{ $labtask->title }}">
        <p style="color:red">{{ $errors->first('labtask.title') }}</p>
        <h2>詳細：</h2>
        <textarea name="labtask[description]">{{ $labtask->description }}</textarea>
        <p style="color:red">{{ $errors->first('labtask.description') }}</p>
        <input type="submit" value="保存">
    </form>
    <p>ユーザID：{{ $labtask->user_id }}</p>
    <p>作成日時：{{ $labtask->created_at }}</p>
    <p>タスク状態：{{ $labtask->is_done }}</p>
    <p>いいね数：{{ $labtask->is_liked }}</p>
    
    <a href="/labpage/membertask/comment">コメント確認</a>
    
    <form action="/mypage/labtask/{{ $labtask->id }}/edit" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除">
    </form>


    <h2>画像</h2>
    @foreach($images as $image)
        <p>ID:{{$image->id }}</p>
        <img src="{{ $image->image_path }}">
        <p>説明：{{ $image->description }}</p>
    @endforeach
@endsection