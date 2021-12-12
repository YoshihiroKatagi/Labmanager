<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center;">
        <a href="/mypage/labtask">戻る</a>
        
        <div class="research">
            <h1>研究概要</h1>
            <form action="/setting/outline" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user[name]" value="{{ $user->name }}">
                <h3>研究テーマ：<input type="text" name="user[thema]" value="{{ $user->thema }}"></h3>
                <h3>研究背景：<textarea name="user[background]">{{ $user->background }}</textarea></h3>
                <h3>研究動機：<textarea name="user[motivation]">{{ $user->motivation }}</textarea></h3>
                <h3>研究目的：<textarea name="user[object]">{{ $user->object }}</textarea></h3>
                <input type="submit"  value="保存">
            </form>
        </div>
    </div>
@endsection