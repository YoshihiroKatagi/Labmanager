<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lab;
use App\User;
use App\Labtask;
use App\Comment;
use App\Event;
use App\Image;
use Illuminate\Support\Facades\Auth;

class LabpageController extends Controller
{
    public function index(Lab $lab, User $user, Labtask $labtask, Event $event)
    {
        return view('labpages/labtop')->with([
            'labs' => $lab->get(),
            'users' => $user->get(),
            'labtasks_todo' => $labtask->getLabtaskTodoWithUser(),
            'events' => $event->get()
        ]);
    }
    
    // CommentControllerに移動
    // public function index(User $user, Labtask $labtask, Comment $comment, Image $image)
    // {
    //     return view('labpages/comment')->with([
    //         'users' => $user->get(),
    //         'labtask' => $labtask,
    //         'comments' => $comment->get(),
    //         'images' => $image->get()
    //     ]);
    // }
    
    public function mention(User $user, Labtask $labtask, Comment $comment)
    {
        return view('labpages/mention')->with([
            'users' => $user->get(),
            'labtasks' => $labtask->get(),
            'comments' => $comment->getMentionedComment()
        ]);
    }
}
