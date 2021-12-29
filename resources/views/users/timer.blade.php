<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex;">
        
        <div class="side" style="width:20%; text-align:center; border:solid;">
            <div style="border:solid;">
                <h2><a href="/setting/account">アカウント</a></h2>
            </div>
            <div style="border:solid;">
                <h2><a href="/setting/outline">研究概要</a></h2>
            </div>
            <div style="border:solid;">
                <h2><a href="/setting/timer">タイマー</a></h2>
            </div>
            
        </div>
        
        <div class="research" style="width:50%; text-align:center;">
            <h1>タイマー設定</h1>
            <form action="/setting/timer" method="POST">
                @csrf
                @method('PUT')
                <h3>
                    タイマーモード：<br>
                    @if($authUser->timer_mode == 0)
                        <input type="radio" id="simple" name="timer_mode" value=0 checked>
                        <label for="simple">Simple Mode</label>
                        <input type="radio" id="custom" name="timer_mode" value=1>
                        <label for="custom">Custom Mode</label>
                    @else
                        <input type="radio" id="simple" name="timer_mode" value=0>
                        <label for="simple">Simple Mode</label>
                        <input type="radio" id="custom" name="timer_mode" value=1 checked>
                        <label for="custom">Custom Mode</label>
                    @endif
                </h3>
                <input type="submit" value="保存">
            </form>
        </div>
    </div>
@endsection