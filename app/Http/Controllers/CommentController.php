<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Labtask;
use App\Comment;
use App\Image;

class CommentController extends Controller
{
    public function index(User $user, Labtask $labtask, Comment $comment, Image $image)
    {
        return view('labpages/comment')->with([
            'users' => $user->get(),
            'labtask' => $labtask,
            'comments' => $comment->get(),
            'images' => $image->get()
        ]);
    }
    
    public function create(Request $request, Comment $comment, Labtask $labtask)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/labpage/membertask/' . $labtask->id . '/comment');
    }
    
    public function update(Request $request, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/labpage/membertask/' . $labtask->id . '/comment');
    }
}
