<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex;">
        
        <div class="side" style="width:20%; text-align:center; border:solid;">
            <a href="/mypage/labtask">戻る</a>
            <div style="border:solid;">
                <h2><a href="/setting/account">アカウント</a></h2>
            </div>
            <div style="border:solid;">
                <h2><a href="/setting/outline">研究概要</a></h2>
            </div>
            <div style="border:solid;">
                <h2><a href="/setting/timer">タイマー</a></h2>
            </div>
            <div style="border:solid;">
                <h2><a href="/setting/lab">ラボ</a></h2>
            </div>
            
        </div>
        
        <div class="research" style="width:50%; text-align:center;">
            <h1>研究概要</h1>
            <form action="/setting/outline" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user[name]" value="{{ $authUser->name }}">
                <h3>研究テーマ：<input type="text" name="thema" value="{{ $authUser->thema }}"></h3>
                <h3>研究背景：<textarea name="background">{{ $authUser->background }}</textarea></h3>
                <h3>研究動機：<textarea name="motivation">{{ $authUser->motivation }}</textarea></h3>
                <h3>研究目的：<textarea name="object">{{ $authUser->object }}</textarea></h3>
                <input type="submit"  value="保存">
            </form>
        </div>
    </div>
@endsection