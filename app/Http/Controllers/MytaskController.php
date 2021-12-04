<?php

namespace App\Http\Controllers;

use App\User;
use App\Mytask;
use App\Labtask;
use App\Http\Requests\MytaskRequest;


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
    
    public function create(MytaskRequest $request, Mytask $mytask)
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
    
    public function update(MytaskRequest $request, Mytask $mytask)
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
    
    public function today(Labtask $labtask, Mytask $mytask)
    {
        return view('mypages/mytask_today')->with([
            'labtasks' => $labtask->getByLimit(),
            'mytasks' => $mytask->getByToday(),
        ]);
    }
    public function today_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/today');
    }
    public function today_edit(Mytask $mytask, Labtask $labtask)
    {
        return view('mypages/today_edit')->with([
            'Mytask' => $mytask,
            'mytasks' => $mytask->getByToday(),
            'labtasks' => $labtask->getByLimit(),
        ]);
    }
    public function today_update(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['Mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/today');
    }
    
    public function bylabtask(Labtask $labtask)
    {
        return view('mypages/mytask_bylabtask')->with([
            'mytasks' => $labtask->getByLabtask(),
            'labtasks' => $labtask->getByLimit(),
        ]);
    }
    
    public function bylabtask_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/' . $mytask->labtask->id);
    }
    
}
