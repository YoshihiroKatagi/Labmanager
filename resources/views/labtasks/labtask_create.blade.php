<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container" style="display:flex;">
        <div class="side_bar" style="width:20%; text-align:center; border:solid;">
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/labpage/top"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtop.svg">ラボページ</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/mytask/today"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/labtask"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtask.svg">ラボタスク</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/calendar"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/calendar.svg">カレンダー</a>
                </h2>
            </div>
            <div style="text-align:left; border:solid; padding:10px;">
                <h2>
                    <a href="/mypage/statistic"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/statistic.svg">統計</a>
                </h2>
            </div>
        </div>
        
        <div class="labtask" style="width:50$; text-align:center;">
            <h1>Labtask <a href="/mypage/labtask/create">+</a></h1>
            <a href="/mypage/labtask">キャンセル</a>
            <div class="create" style="">
                <form action="/mypage/labtask/create" method="POST">
                    @csrf
                    <input type="hidden" name="labtask[user_id]" value="{{ Auth::user()->id }}">
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
                            <div>いいね！
                                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                            </div>
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
                            <div>いいね！
                                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                            </div>
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
        </div>
        
        <div class="research" style="width:30%;">
            <h1>研究概要</h1>
            <a href="/setting/outline">編集</a>
            <p>研究テーマ：{{ Auth::user()->thema }}</p>
            <p>研究背景：{{ Auth::user()->background }}</p>
            <p>研究動機：{{ Auth::user()->motivation }}</p>
            <p>研究目的：{{ Auth::user()->object }}</p>
            <br>
        </div>
    </div>
@endsection