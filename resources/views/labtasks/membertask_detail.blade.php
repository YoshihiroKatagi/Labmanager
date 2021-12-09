<!--メンバータスク詳細ページ(17)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center;">
        <div class="description" style="width:50%">
            <a href="/labpage/membertask/{{ $user->id }}">戻る</a>
            <h1>{{ $user->name }}のラボタスク詳細</h1>
            <h2>ラボタスク：{{ $labtask->title }}</h2>
            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
            <p>いいね：{{ $labtask->is_liked }}</p>
            <p>詳細：{{ $labtask->description }}</p>
            <div class="image">
                <h2>補足画像</h2>
                @foreach($images as $image)
                    <img src="{{ $image->image_path }}">
                    <p>説明：{{ $image->description }}</p>
                @endforeach
            </div>
            <a href="/labpage/membertask/{{ $user->id }}/{{ $labtask->id }}/comment">コメント</a>
        </div>
    </div>
@endsection