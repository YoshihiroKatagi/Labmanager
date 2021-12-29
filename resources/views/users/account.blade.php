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
            <h1>アカウント設定</h1>
            <form action="/setting/account" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>
                    Icon:<img src="{{ $authUser->icon }}" style="width:40px; height:40px; border-radius:50%; object-fit:cover; border:solid; color:black;">
                    <input type="file" name="icon"><br>
                </h3>
                <input type="submit" value="保存">
            </form>
            <form action="/setting/account" method="POST">
                @csrf
                @method('PUT')
                <h3>
                    User Name:<input type="text" name="name" value="{{ $authUser->name }}"><br>
                    Email:<input type="email" name="email" value="{{ $authUser->email }}"><br>
                    status:
                    @if($authUser->student_or_not == 0)
                        <input type="radio" id="student" name="student_or_not" value=0 checked>
                        <label for="student">Student</label>
                        <input type="radio" id="teacher" name="student_or_not" value=1>
                        <label for="teacher">Teacher</label>
                    @else
                        <input type="radio" id="student" name="student_or_not" value=0>
                        <label for="student">Student</label>
                        <input type="radio" id="teacher" name="student_or_not" value=1 checked>
                        <label for="teacher">Teacher</label>
                    @endif
                </h3>
                <input type="submit" value="保存">
            </form>
        </div>
    </div>
@endsection