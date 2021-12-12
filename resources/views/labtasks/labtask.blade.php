<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center;">
        <a href="/">トップへ</a>
        <h1>現在のラボタスク <a href="/mypage/labtask/create">+</a></h1>
        <div class="labtasks" style="display:flex; flex-wrap:wrap; text-align:center;">
            @foreach($labtasks as $labtask)
                @if($labtask->is_done == 0)
                    <div class="labtask" style="width:40%; margin:20px; border:solid;">
                        <h2>タイトル：<a href="/mypage/labtask/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                        <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                        <p>いいね：{{ $labtask->is_liked }}</p>
                        <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="labtask[is_done]" value=1>done
                            <input type="submit" value="保存">
                        </form>
                        <br>
                    </div>
                @endif
            @endforeach
            <br>
        </div>
        <h1>Completed</h1>
        <div class="completed" style="display:flex; flex-wrap:wrap; text-align:center;">
            @foreach($labtasks as $labtask)
                @if($labtask->is_done == 1)
                    <div class="labtask" style="width:40%; margin:20px; border:solid;">
                        <h2>タイトル：<a href="/mypage/labtask/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                        <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                        <p>いいね：{{ $labtask->is_liked }}</p>
                        <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="labtask[is_done]" value=0>todo
                            <input type="submit" value="保存">
                        </form>
                        <br>
                    </div>
                @endif
            @endforeach
            <br>
        </div>
        
        <div class="research">
            <h1>研究概要</h1>
            <a href="/setting/outline">編集</a>
            <h3>研究テーマ：{{ Auth::user()->thema }}</h3>
            <h3>研究背景：{{ Auth::user()->background }}</h3>
            <h3>研究動機：{{ Auth::user()->motivation }}</h3>
            <h3>研究目的：{{ Auth::user()->object }}</h3>
            <br>
        </div>
    </div>
@endsection