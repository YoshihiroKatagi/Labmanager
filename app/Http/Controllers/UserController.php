<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserController extends Controller
{
    public function account()
    {
        return view('users/account')->with([
            'authUser' => Auth::user(),
        ]);
    }
    public function account_icon(Request $request)
    {
        $image = $request->file('icon');
        $path = Storage::disk('s3')->put('/user_icon', $image, 'public');
        Auth::user()->icon = Storage::disk('s3')->url($path);
        Auth::user()->save();
        
        return back();
    }
    public function icon_default()
    {
        Auth::user()->icon = "https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/first_icon.svg";
        Auth::user()->save();
        return back();
    }
    public function account_update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'student_or_not' => $request->student_or_not,
        ];
        
        User::where('id', Auth::user()->id)->update($param);
        return back();
    }
    
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
        return back();
    }
    
    public function timer()
    {
        return view('users/timer')->with([
            'authUser' => Auth::user(),
        ]);
    }
    public function timer_update(Request $request)
    {
        $param = [
            'timer_mode' => $request->timer_mode,
        ];
        
        User::where('id', Auth::user()->id)->update($param);
        return back();
    }
}
