<!--コメントページ-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center; display:flex;">
        <div class="description" style="width:50%">
            <a href="/labpage/membertask/{{ $User->id }}">戻る</a>
            <h1>{{ $User->name }}のラボタスク詳細</h1>
            <h2>ラボタスク：{{ $labtask->title }}</h2>
            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
            <p>いいね：{{ $labtask->is_liked }}</p>
            <p>詳細：{{ $labtask->description }}</p>
            <div class="image">
                <h2>補足画像</h2>
                @foreach($images as $image)
                    <img src="{{ $image->image_path }}">
                    <p>説明：{{ $image->description }}</p>
                @endforeach
            </div>
            <a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment">コメント</a>
        </div>
        
        <div class="comments" style="width:30%;">
            <div class="comment_list">
                <h1>コメント</h1>
                <h2>コメント一覧</h2>
                <a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}">閉じる</a>
                @foreach($comments as $comment)
                    @if($comment->id == $Comment->id)
                        <div class="comment" style="border:solid; margin:10px;">
                            <p>{{ $users["$comment->user_id"-1]->name }}</p>
                            <p>{{ $comment->created_at->format('Y年m月d日') }}</p>
                            <p>いいね：{{ $comment->is_liked }}</p>
                            <form action="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment/{{ $comment->id }}" method="POST">
                                <select name="comment[mention_to]">
                                    @foreach($users as $user)
                                        @if($user->id == $Comment->mention_to)
                                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <textarea name="comment[content]">{{ $comment->content }}</textarea>
                                <input type="submit" value="保存">
                            </form>
                            <form action="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment/{{ $comment->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="削除">
                            </form>
                            <a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment">キャンセル</a>
                        </div>
                    @else
                        <div class="comment" style="border:solid; margin:10px;">
                            <p>{{ $users["$comment->user_id"-1]->name }}</p>
                            <h3>{{ $comment->content }}</h3>
                            <p>{{ $comment->created_at->format('Y年m月d日') }}</p>
                            <p>@ {{ $users["$comment->mention_to"]->name }}</p>
                            <p>いいね：{{ $comment->is_liked }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="comment_post" style="border:solid;">
                <h2>コメント作成</h2>
                <form action="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment" method="POST">
                    @csrf
                    <input type="hidden" name="comment[user_id]" value={{ $users[0]->id }}>
                    <input type="hidden" name="comment[labtask_id]" value="{{ $labtask->id }}">
                    <p>@</p>
                    <select name="comment[mention_to]">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <textarea name="comment[content]" placeholder="コメントする..."></textarea>
                    <input type="submit" value="送信">
                </form>
            </div>
        </div>
    </div>
@endsection