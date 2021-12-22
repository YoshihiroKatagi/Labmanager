<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Labtask;
use App\Comment;

class FavoriteController extends Controller
{
    public function ltfavorite_store(Request $request, Labtask $labtask)
    {
        Auth::user()->lt_favorite($labtask->id);
        $labtask->is_liked += 1;
        $labtask->save();
        return back();
    }
    
    public function ltfavorite_destroy(Labtask $labtask)
    {
        Auth::user()->lt_unfavorite($labtask->id);
        $labtask->is_liked -= 1;
        $labtask->save();
        return back();
    }
    
    public function cfavorite_store(Request $request, Comment $comment)
    {
        Auth::user()->c_favorite($comment->id);
        $comment->is_liked += 1;
        $comment->save();
        return back();
    }
    
    public function cfavorite_destroy(Comment $comment)
    {
        Auth::user()->c_unfavorite($comment->id);
        $comment->is_liked -= 1;
        $comment->save();
        return back();
    }
}
