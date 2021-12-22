<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function outline()
    {
        return view('users/outline')->with([
            'authUser' => Auth::user(),
        ]);
    }
    public function outline_update(Request $request)
    {
        $param = [
            'thema' => $request->thema,
            'background' => $request->background,
            'motivation' => $request->motivation,
            'object' => $request->object,
        ];
        
        User::where('id', Auth::user()->id)->update($param);
        return redirect('mypage/labtask');
    }
}
