@extends('layouts.app')

@section('content')
    <p>トップページ</p>
    <a href="/mypage/mytask/today">マイタスクページ(Today)へ</a><br>
    <a href="/mypage/labtask">ラボタスクページへ</a><br>
    <p>メンバータスクページ</p>
    @foreach($users as $user)
        <a href="/labpage/membertask/{{ $user->id }}">{{ $user->name }}のラボタスクページへ</a><br>
    @endforeach
@endsection