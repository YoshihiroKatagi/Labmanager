<!--ラボタスク詳細ページ(15)-->

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
        
        <div class="labtask" style="width:80%; text-align:center;">
            <a href="/mypage/labtask">戻る</a>
            <h1>ラボタスク詳細・編集</h1>
            <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
                @csrf
                @method('PUT')
                <h2>ラボタスク：</h2>
                <input type="text" name="labtask[title]" value="{{ $labtask->title }}">
                <p style="color:red">{{ $errors->first('labtask.title') }}</p>
                <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
                <div>いいね！
                    <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
                </div>
                <a href="/labpage/membertask/{{ Auth::user()->id }}/{{ $labtask->id }}/comment">コメント確認</a>
                <h2>詳細：</h2>
                <textarea name="labtask[description]">{{ $labtask->description }}</textarea>
                <p style="color:red">{{ $errors->first('labtask.description') }}</p>
                <input type="submit" value="保存">
            </form>
            <h2>画像</h2>
            <div class="image">
                @foreach($images as $image)
                    <form action="/mypage/labtask/{{ $labtask->id }}/{{ $image->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <img src="{{ $image->image_path }}" style="width:30vw;">
                        <textarea name="image[description]">{{ $image->description }}</textarea>
                        <input type="submit" value="保存">
                    </form>
                    <form action="/mypage/labtask/{{ $labtask->id }}/{{ $image->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="画像を削除">
                    </form>
                @endforeach
            </div>
            <div>
                <h3>画像の追加</h3>
                <form action="/mypage/labtask/{{ $labtask->id }}" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image">
                    @csrf
                    <input type="submit" value="アップロード">
                </form>
            </div>
            
            <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="ラボタスクを削除">
            </form>
        </div>
    
    </div>
@endsection