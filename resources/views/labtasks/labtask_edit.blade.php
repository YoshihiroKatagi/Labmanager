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
            <a href="/labpage/membertask/{{ Auth::user()->id }}/{{ $labtask->id }}/comment">コメント確認</a>
            <h2>詳細：</h2>
            <textarea name="labtask[description]">{{ $labtask->description }}</textarea>
            <p style="color:red">{{ $errors->first('labtask.description') }}</p>
            <input type="submit" value="保存">
        </form>
        <h2>画像</h2>
        <div class="image">
            @foreach($images as $image)
                <form action="/mypage/labtask/{{ $labtask->id }}/{{ $image->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <img src="{{ $image->image_path }}">
                    <textarea name="image[description]">{{ $image->description }}</textarea>
                    <input type="submit" value="保存">
                </form>
                <form action="/mypage/labtask/{{ $labtask->id }}/{{ $image->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="画像を削除">
                </form>
            @endforeach
        </div>
        <div>
            <h3>画像の追加</h3>
            <form action="/mypage/labtask/{{ $labtask->id }}" method="POST" enctype="multipart/form-data">
                <input type="file" name="image">
                @csrf
                <input type="submit" value="アップロード">
            </form>
        </div>
        
        <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="ラボタスクを削除">
        </form>
    
    </div>
@endsection