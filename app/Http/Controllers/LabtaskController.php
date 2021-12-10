<?php

namespace App\Http\Controllers;

use App\User;
use App\Labtask;
use App\Image;
use App\Http\Requests\LabtaskRequest;
use Illuminate\Support\Facades\Auth;

class LabtaskController extends Controller
{
    public function labtask(User $user, Labtask $labtask)
    {
        return view('labtasks/labtask')->with([
            'user' => Auth::user(),
            'labtasks' => $labtask->get(),
        ]);
    }
    public function labtask_new(User $user, Labtask $labtask)
    {
        return view('labtasks/labtask_create')->with([
            'user' => Auth::user(),
            'labtasks' => $labtask->get(),
        ]);
    }
    public function labtask_create(LabtaskRequest $request, Labtask $labtask)
    {
        $input = $request['labtask'];
        $labtask->fill($input)->save();
        return redirect('/mypage/labtask');
    }
    public function labtask_edit(Labtask $labtask, Image $image)
    {
        return view('labtasks/labtask_edit')->with([
            'labtask' => $labtask,
            'images' => $image->get(),
        ]);
    }
    public function labtask_update(LabtaskRequest $request, Labtask $labtask)
    {
        $input = $request['labtask'];
        $labtask->fill($input)->save();
        return redirect('/mypage/labtask');
    }
    public function labtask_delete(Labtask $labtask)
    {
        $labtask->delete();
        return redirect('/mypage/labtask');
    }
    
    
    public function membertask(User $user, Labtask $labtask)
    {
        return view('/labtasks/membertask')->with([
            'user' => $user,
            'labtasks' => $labtask->get(),
        ]);
    }
    public function membertask_detail(User $user, Labtask $labtask, Image $image)
    {
        return view('/labtasks/membertask_detail')->with([
            'user' => $user,
            'labtask' => $labtask,
            'images' => $image->get(),
        ]);
    }
}
