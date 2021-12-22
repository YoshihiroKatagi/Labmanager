<!--メンバータスクページ(7)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center;">
        <a href="/">トップへ</a>
        <h1>{{ $user->name }}のラボタスク</h1>
        <div class="labtasks" style="display:flex; flex-wrap:wrap; text-align:center;">
            @foreach($labtasks as $labtask)
                @if($labtask->is_done == 0)
                    <div class="labtask" style="width:40%; margin:20px; border:solid;">
                        <h2>タイトル：<a href="/labpage/membertask/{{ $user->id }}/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                        <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                        <div>いいね！
                            <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                        </div>
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
                        <h2>タイトル：<a href="/labpage/membertask/{{ $user->id }}/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                        <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                        <div>いいね！
                            <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                        </div>
                        <br>
                    </div>
                @endif
            @endforeach
            <br>
        </div>
        
        <div class="research">
            <h1>研究概要</h1>
            <h2>ユーザ名：{{ $user->name }}</h2>
            <h3>研究テーマ：{{ $user->thema }}</h3>
            <h3>研究背景：{{ $user->background }}</h3>
            <h3>研究動機：{{ $user->motivation }}</h3>
            <h3>研究目的：{{ $user->object }}</h3>
            <br>
        </div>
    </div>
@endsection