<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center;">
        <h1>現在のラボタスク <a href="/mypage/labtask/create">+</a></h1>
        <a href="/mypage/labtask">キャンセル</a>
        <div class="create" style="border:solid">
            <form action="/mypage/labtask/create" method="POST">
                @csrf
                <input type="hidden" name="labtask[user_id]" value="{{ $user->id }}">
                <input type="text" name="labtask[title]" placeholder="タスク名" value="{{ old('labtask[title]') }}">
                <p style="color:red">{{ $errors->first('labtask.title') }}</p>
                <textarea name="labtask[description]" placeholder="タスク詳細">{{ old('labtask[description]') }}</textarea>
                <p style="color:red">{{ $errors->first('labtask.description') }}</p>
                <input type="submit" value="作成">
            </form>
        </div>
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
            <h2>ユーザ名：{{ $user->name }}</h2>
            <h3>研究テーマ：{{ $user->thema }}</h3>
            <h3>研究背景：{{ $user->background }}</h3>
            <h3>研究動機：{{ $user->motivation }}</h3>
            <h3>研究目的：{{ $user->object }}</h3>
            <br>
        </div>
    </div>
@endsection