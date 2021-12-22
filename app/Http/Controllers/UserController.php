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
    public function outline_update(Request $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/setting/outline');
    }
    
    public function index()
    {
        return view('users.index');
    }
    public function edit($id)
    {
        return view('users.edit');
    }
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        
        if (!is_null($request->password)) {
            $user->password = Hash::make($request->password);
        } else {
            unset($user->password);
        }
        $user->save();
        return redirect(route('users.index'));
    }
}
