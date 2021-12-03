<?php

namespace App\Http\Controllers;

use App\User;
use App\Labtask;
use App\Image;
use App\Http\Requests\LabtaskRequest;

class LabtaskController extends Controller
{
    public function labtask()
    {
        $users = User::all();
        $labtasks = Labtask::all();
        
        return view('mypages/lt_index')->with([
            'users' => $users,
            'labtasks' => $labtasks
        ]);
    }
    
    public function create(LabtaskRequest $request, Labtask $labtask)
    {
        $input = $request['labtask'];
        $labtask->fill($input)->save();
        return redirect('/mypage/labtask');
    }
    
    public function edit(User $user, Labtask $labtask, Image $image)
    {
        return view('mypages/lt_edit')->with([
            'users' => $user->get(),
            'labtask' => $labtask,
            'images' => $image->get()]);
    }
    
    public function update(LabtaskRequest $request, Labtask $labtask)
    {
        $input = $request['labtask'];
        $labtask->fill($input)->save();
        return redirect('/mypage/labtask/' . $labtask->id . '/edit');
    }
    
    public function delete(Labtask $labtask)
    {
        $labtask->delete();
        return redirect('/mypage/labtask');
    }
}
