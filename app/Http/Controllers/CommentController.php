<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Labtask;
use App\Comment;
use App\Image;

class CommentController extends Controller
{
    public function comment(User $user, Labtask $labtask, Comment $comment, Image $image)
    {
        return view('labtasks/membertask_comment')->with([
            'User' => $user,
            'users' => $user->get(),
            'labtask' => $labtask,
            'comments' => $comment->get(),
            'images' => $image->get()
        ]);
    }
    
    public function comment_post(Request $request, User $user, Labtask $labtask, Comment $comment)
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
            'comments' => $comment->get(),
            'images' => $image->get()
        ]);
    }
    
    public function comment_update(Request $request, User $user, Labtask $labtask, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/labpage/membertask/' . $user->id . '/' . $labtask->id . '/comment');
    }
    
    public function comment_delete(Request $request, User $user, Labtask $labtask, Comment $comment)
    {
        $comment->delete();
        return redirect('/labpage/membertask/' . $user->id . '/' . $labtask->id . '/comment');
    }
}
