<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mytask;
use App\Labtask;


class MytaskController extends Controller
{
    public function check(Mytask $mytask)
    {
        return $mytask->getByLimit();
    }
    
    public function index(Labtask $labtask, Mytask $mytask)
    {
        return view('mypages/mytask')->with([
            'labtasks' => $labtask->getByLimit(),
            'mytasks' => $mytask->getByLimit(),
        ]);
    }
    
    public function bylabtask(Labtask $labtask)
    {
        return view('mypages/mytask_bylabtask')->with(['mytasks' => $labtask->getByLabtask()]);
    }
    
    public function today(Labtask $labtask, Mytask $mytask)
    {
        return view('mypages/mytask_today')->with([
            'labtasks' => $labtask->getByLimit(),
            'mytasks' => $mytask->getByLimit(),
        ]);
    }
    
    public function create(Request $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask');
    }
    
    public function edit(Mytask $mytask, Labtask $labtask)
    {
        return view('mypages/mytask_edit')->with([
            'mytask' => $mytask,
            'labtasks' => $labtask->getByLimit(),
        ]);
    }
    
    public function update(Request $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/');
    }
    
    public function delete(Mytask $mytask)
    {
        $mytask->delete();
        return redirect('mypage/mytask');
    }
}
