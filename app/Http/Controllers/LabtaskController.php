<?php

namespace App\Http\Controllers;

use App\User;
use App\Labtask;
use App\Image;
use App\Http\Requests\LabtaskRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class LabtaskController extends Controller
{
    public function labtask(Labtask $labtask)
    {
        $labtasks = Auth::user()->getByUser();
        return view('labtasks/labtask')->with([
            'labtasks' => $labtasks,
        ]);
    }
    public function labtask_new()
    {
        return view('labtasks/labtask_create')->with([
            'labtasks' => Auth::user()->getByUser(),
        ]);
    }
    public function labtask_create(LabtaskRequest $request, Labtask $labtask)
    {
        $input = $request['labtask'];
        $labtask->fill($input)->save();
        return redirect('/mypage/labtask');
    }
    public function labtask_edit(Labtask $labtask)
    {
        return view('labtasks/labtask_edit')->with([
            'labtask' => $labtask,
            'images' => $labtask->getByLabtaskForImage(),
        ]);
    }
    public function labtask_update(LabtaskRequest $request, Labtask $labtask)
    {
        $input = $request['labtask'];
        $labtask->fill($input)->save();
        
        return redirect('/mypage/labtask/' . $labtask->id);
    }
    public function labtask_delete(Labtask $labtask)
    {
        $labtask->delete();
        return redirect('/mypage/labtask');
    }
    
    public function image_create(LabtaskRequest $request, Labtask $labtask)
    {
        $image = new Image();
        
        $img = $request->file('image');
        $path = Storage::disk('s3')->put('/labtask_images', $img, 'public');
        $image->image_path = Storage::disk('s3')->url($path);
        $image->labtask_id = $labtask->id;
        $image->save();
        
        return redirect('mypage/labtask/' . $labtask->id);
    }
    public function image_update(LabtaskRequest $request, Labtask $labtask, Image $image)
    {
        // $input = $request['image'];
        // $image->fill($input)->save();
        
        // return redirect('/mypage/labtask/' . $labtask->id);
        return $request;
    }
    public function image_delete(Labtask $labtask, Image $image)
    {
        $image->delete();
        return redirect('/mypage/labtask/' . $labtask->id);
    }
    
    
    public function membertask(User $user, Labtask $labtask)
    {
        return view('/labtasks/membertask')->with([
            'user' => $user,
            'labtasks' => $user->getByUser(),
        ]);
    }
    public function membertask_detail(User $user, Labtask $labtask)
    {
        return view('/labtasks/membertask_detail')->with([
            'user' => $user,
            'labtask' => $labtask,
            'images' => $labtask->getByLabtaskForImage(),
        ]);
    }
    
}
