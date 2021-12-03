<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mytask;
use App\Labtask;
use App\Image;


class MypageController extends Controller
{
    public function test()
    {
        return view('index');
    }
    
    // #MytaskControllerに移動
    // public function mytask(User $user, Mytask $mytask, Labtask $labtask)
    // {
    //     return view('mypages/mytask')->with([
    //         'user' => $user,
    //         'mytasks' => $mytask->get(),
    //         'labtasks' => $labtask->get()
    //     ]);
    // }
    
    
    // #LabtaskControllerに移動
    // public function labtask()
    // {
    //     $users = User::all();
    //     $labtasks = Labtask::all();
        
    //     return view('mypages/lt_index')->with([
    //         'users' => $users,
    //         'labtasks' => $labtasks
    //     ]);
    // }
    
    // public function store(Request $request, Labtask $labtask)
    // {
    //     $input = $request['labtask'];
    //     $labtask->fill($input)->save();
    //     return redirect('/mypage/labtask');
    //     // return redirect('/mypage/labtasks/' . $labtask->id . '/edit');
    // }
    
    // public function edit(User $user, Labtask $labtask, Image $image)
    // {
    //     return view('mypages/lt_edit')->with([
    //         'users' => $user->get(),
    //         'labtask' => $labtask,
    //         'images' => $image->get()]);
    // }
    
    // public function update(Request $request, Labtask $labtask)
    // {
    //     $input = $request['labtask'];
    //     $labtask->fill($input)->save();
    //     return redirect('/mypage/labtask/' . $labtask->id . '/edit');
    // }
    
    // public function delete(Labtask $labtask)
    // {
    //     $labtask->delete();
    //     return redirect('/mypage/labtask');
    // }
}
