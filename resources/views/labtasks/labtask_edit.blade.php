<!--ラボタスク詳細ページ(15)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center;">
        <a href="/mypage/labtask">戻る</a>
        <h1>ラボタスク詳細・編集</h1>
        <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
            @csrf
            @method('PUT')
            <h2>ラボタスク：</h2>
            <input type="text" name="labtask[title]" value="{{ $labtask->title }}">
            <p style="color:red">{{ $errors->first('labtask.title') }}</p>
            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
            <div>いいね！
                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
            </div>
            <h2>詳細：</h2>
            <textarea name="labtask[description]">{{ $labtask->description }}</textarea>
            <p style="color:red">{{ $errors->first('labtask.description') }}</p>
            <div class="image">
                <h2>画像</h2>
                @foreach($images as $image)
                    <img src="{{ $image->image_path }}">
                    <p>説明：{{ $image->description }}</p>
                @endforeach
            </div>
            <input type="submit" value="保存">
        </form>
        
        <a href="/labpage/membertask/{{ Auth::user()->id }}/{{ $labtask->id }}/comment">コメント確認</a>
        
        <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除">
        </form>
    
    </div>
@endsection