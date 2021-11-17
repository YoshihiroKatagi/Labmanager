<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Image;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks/index');
    }
    
    public function input()
    {
        return view('tasks.input');
    }
    
    public function output(Image $image)
    {
        return view('tasks/output')->with(['images' => $image->get()]);
        // return $image->get();
    }
}
