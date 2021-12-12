<?php

namespace App\Http\Controllers;

use App\User;
use App\Mytask;
use App\Labtask;
use App\Http\Requests\MytaskRequest;
use Illuminate\Support\Facades\Auth;


class MytaskController extends Controller
{
    public function top(User $user)
    {
        return view('index')->with([
            'users' => $user->get(),
        ]);
    }
    
    public function bylabtask(Labtask $labtask)
    {
        return view('mypages/mytask_bylabtask')->with([
            'mytasks' => $labtask->getByLabtask(),
            'labtasks' => Auth::user()->getByUser(),
            'Labtask' => $labtask,
        ]);
    }
    public function bylabtask_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/bylabtask/' . $mytask->labtask_id);
    }
    public function bylabtask_edit(Labtask $labtask, Mytask $mytask)
    {
        return view('mypages/bylabtask_edit')->with([
            'Mytask' => $mytask,
            'mytasks' => $labtask->getByLabtask(),
            'labtasks' => Auth::user()->getByUser(),
        ]);
    }
    public function bylabtask_update(Labtask $labtask, Mytask $mytask, MytaskRequest $request)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/bylabtask/' . $mytask->labtask_id);
    }
    public function bylabtask_delete(Labtask $labtask, Mytask $mytask)
    {
        $mytask->delete();
        return redirect('mypage/mytask/bylabtask/' . $mytask->labtask_id);
    }
    
    public function today(Mytask $mytask)
    {
        return view('mypages/mytask_today')->with([
            'labtasks' => Auth::user()->getByUser(),
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
            'labtasks' => Auth::user()->getByUser(),
        ]);
    }
    public function today_update(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/today');
    }
    public function today_delete(Mytask $mytask)
    {
        $mytask->delete();
        return redirect('mypage/mytask/today');
    }
    
    public function tomorrow(Mytask $mytask)
    {
        return view('mypages/mytask_tomorrow')->with([
            'labtasks' => Auth::user()->getByUser(),
            'mytasks' => $mytask->getByTomorrow(),
        ]);
    }
    public function tomorrow_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/tomorrow');
    }
    public function tomorrow_edit(Mytask $mytask)
    {
        return view('mypages/tomorrow_edit')->with([
            'Mytask' => $mytask,
            'mytasks' => $mytask->getByTomorrow(),
            'labtasks' => Auth::user()->getByUser(),
        ]);
    }
    public function tomorrow_update(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/tomorrow');
    }
    public function tomorrow_delete(Mytask $mytask)
    {
        $mytask->delete();
        return redirect('mypage/mytask/tomorrow');
    }
    
    public function thisweek(Mytask $mytask)
    {
        return view('mypages/mytask_thisweek')->with([
            'labtasks' => Auth::user()->getByUser(),
            'mytasks' => $mytask->getByThisweek(),
        ]);
    }
    public function thisweek_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/thisweek');
    }
    public function thisweek_edit(Mytask $mytask)
    {
        return view('mypages/thisweek_edit')->with([
            'Mytask' => $mytask,
            'mytasks' => $mytask->getByThisweek(),
            'labtasks' => Auth::user()->getByUser(),
        ]);
    }
    public function thisweek_update(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/thisweek');
    }
    public function thisweek_delete(Mytask $mytask)
    {
        $mytask->delete();
        return redirect('mypage/mytask/thisweek');
    }
    
    public function thismonth(Mytask $mytask)
    {
        return view('mypages/mytask_thismonth')->with([
            'labtasks' => Auth::user()->getByUser(),
            'mytasks' => $mytask->getByThismonth(),
        ]);
    }
    public function thismonth_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/thismonth');
    }
    public function thismonth_edit(Mytask $mytask)
    {
        return view('mypages/thismonth_edit')->with([
            'Mytask' => $mytask,
            'mytasks' => $mytask->getByThismonth(),
            'labtasks' => Auth::user()->getByUser(),
        ]);
    }
    public function thismonth_update(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('mypage/mytask/thismonth');
    }
    public function thismonth_delete(Mytask $mytask)
    {
        $mytask->delete();
        return redirect('mypage/mytask/thismonth');
    }
    
}
