<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function outline()
    {
        return view('settings/outline')->with([
            'user' => Auth::user(),
        ]);
    }
    public function outline_update(Request $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/setting/outline');
    }
}
