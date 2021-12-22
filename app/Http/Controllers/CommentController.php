<?php

namespace App\Http\Controllers;

use App\User;
use App\Labtask;
use App\Comment;
use App\Image;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function comment(User $user, Labtask $labtask, Image $image)
    {
        return view('labtasks/membertask_comment')->with([
            'User' => $user,
            'users' => $user->get(),
            'labtask' => $labtask,
            'comments' => $labtask->getByLabtaskForComment(),
            'images' => $image->get(),
        ]);
    }
    
    public function comment_post(CommentRequest $request, User $user, Labtask $labtask, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/labpage/membertask/' . $user->id . '/' . $labtask->id . '/comment');
    }
    
    public function comment_edit(User $user, Labtask $labtask, Comment $comment, Image $image)
    {
        return view('labtasks/comment_edit')->with([
            'User' => $user,
            'users' => $user->get(),
            'labtask' => $labtask,
            'Comment' => $comment,
            'comments' => $labtask->getByLabtaskForComment(),
            'images' => $image->get(),
        ]);
    }
    
    public function comment_update(CommentRequest $request, User $user, Labtask $labtask, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/labpage/membertask/' . $user->id . '/' . $labtask->id . '/comment');
    }
    
    public function comment_delete(CommentRequest $request, User $user, Labtask $labtask, Comment $comment)
    {
        $comment->delete();
        return redirect('/labpage/membertask/' . $user->id . '/' . $labtask->id . '/comment');
    }
}
