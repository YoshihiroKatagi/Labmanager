<!--コメントページ-->

@extends('layouts.app')

@section('content')
    <div class="container" style="text-align:center; display:flex;">
        <div class="description" style="width:50%">
            <a href="/labpage/membertask/{{ $User->id }}">戻る</a>
            <h1>{{ $User->name }}のラボタスク詳細</h1>
            <h2>ラボタスク：{{ $labtask->title }}</h2>
            <p>{{ $labtask->created_at->format('Y年m月d日') }}~</p>
            @if (Auth::id() != $User->id)
                @if (Auth::user()->is_lt_favorite($labtask->id))
                    <form action="/ltfavorite/unfavorite/{{ $labtask->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="いいね！を外す" class="button btn btn-warning">
                    </form>
                @else
                    <form action="/ltfavorite/favorite/{{ $labtask->id }}" method="POST">
                        @csrf
                        <input type="submit" value="いいね！" class="button btn btn-success">
                    </form>
                @endif
            @endif
            <div>いいね！
                <span class="badge badge-pill badge-success">{{ $labtask->is_liked }}</span>
            </div>
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
                    <div class="comment" style="border:solid; margin:10px;">
                        <p>{{ $users["$comment->user_id"-1]->name }}</p>
                        <p>{{ $comment->created_at->format('Y年m月d日') }}</p>
                        @if (Auth::id() != $comment->user_id)
                                @if (Auth::user()->is_c_favorite($comment->id))
                                    <form action="/cfavorite/unfavorite/{{ $comment->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="いいね！を外す" class="button btn btn-warning">
                                    </form>
                                @else
                                    <form action="/cfavorite/favorite/{{ $comment->id }}" method="POST">
                                        @csrf
                                        <input type="submit" value="いいね！" class="button btn btn-success">
                                    </form>
                                @endif
                            @endif
                            <div>いいね！
                                <span class="badge badge-pill badge-success">{{ $comment->is_liked }}</span>
                            </div>
                        <p>@ {{ $users["$comment->mention_to"-1]->name }}</p>
                        <h3>{{ $comment->content }}</h3>
                        @if($comment->user_id == Auth::user()->id)
                            <a href="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment/{{ $comment->id }}">編集</a>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="comment_post" style="border:solid;">
                <h2>コメント作成</h2>
                <form action="/labpage/membertask/{{ $User->id }}/{{ $labtask->id }}/comment" method="POST">
                    @csrf
                    <input type="hidden" name="comment[user_id]" value={{ Auth::user()->id }}>
                    <input type="hidden" name="comment[labtask_id]" value="{{ $labtask->id }}">
                    <p>@</p>
                    <select name="comment[mention_to]">
                        @foreach($users as $user)
                            @if($user->id != Auth::user()->id)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <textarea name="comment[content]" placeholder="コメントする..."></textarea>
                    <p style="color:red">{{ $errors->first('comment.content') }}</p>
                    <input type="submit" value="送信">
                </form>
            </div>
        </div>
    </div>
@endsection