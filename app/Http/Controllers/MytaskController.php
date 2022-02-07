<?php

namespace App\Http\Controllers;

use App\User;
use App\Mytask;
use App\Labtask;
use App\Http\Requests\MytaskRequest;
use Illuminate\Support\Facades\Auth;


class MytaskController extends Controller
{
    public function index(User $user)
    {
        return view('top');
    }
    
    public function bylabtask(User $user, Labtask $labtask)
    {
        return view('mypages/mytask_bylabtask')->with([
            'users' => $user->get(),
            'mytasks_todo' => $labtask->getMytaskTodoByLabtask(),
            'mytasks_completed' => $labtask->getMytaskCompletedByLabtask(),
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
    public function bylabtask_edit(User $user, Labtask $labtask, Mytask $mytask)
    {
        return view('mypages/bylabtask_edit')->with([
            'users' => $user->get(),
            'Mytask' => $mytask,
            'mytasks_todo' => $labtask->getMytaskTodoByLabtask(),
            'mytasks_completed' => $labtask->getMytaskCompletedByLabtask(),
            'labtasks' => Auth::user()->getByUser(),
            'Labtask' => $labtask,
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
    
    public function today(User $user, Mytask $mytask)
    {
        return view('mypages/mytask_today')->with([
            'users' => $user->get(),
            'labtasks' => Auth::user()->getByUser(),
            'mytasks_todo' => $mytask->getTodoByToday(),
            'mytasks_completed' => $mytask->getCompletedByToday(),
        ]);
    }
    public function today_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/today');
    }
    public function today_edit(User $user, Mytask $mytask, Labtask $labtask)
    {
        return view('mypages/today_edit')->with([
            'users' => $user->get(),
            'Mytask' => $mytask,
            'mytasks_todo' => $mytask->getTodoByToday(),
            'mytasks_completed' => $mytask->getCompletedByToday(),
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
    
    public function tomorrow(User $user, Mytask $mytask)
    {
        return view('mypages/mytask_tomorrow')->with([
            'users' => $user->get(),
            'labtasks' => Auth::user()->getByUser(),
            'mytasks_todo' => $mytask->getTodoByTomorrow(),
            'mytasks_completed' => $mytask->getCompletedByTomorrow(),
        ]);
    }
    public function tomorrow_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/tomorrow');
    }
    public function tomorrow_edit(User $user, Mytask $mytask)
    {
        return view('mypages/tomorrow_edit')->with([
            'users' => $user->get(),
            'Mytask' => $mytask,
            'mytasks_todo' => $mytask->getTodoByTomorrow(),
            'mytasks_completed' => $mytask->getCompletedByTomorrow(),
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
    
    public function thisweek(User $user, Mytask $mytask)
    {
        return view('mypages/mytask_thisweek')->with([
            'users' => $user->get(),
            'labtasks' => Auth::user()->getByUser(),
            'mytasks_todo' => $mytask->getTodoByThisweek(),
            'mytasks_completed' => $mytask->getCompletedByThisweek(),
        ]);
    }
    public function thisweek_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/thisweek');
    }
    public function thisweek_edit(User $user, Mytask $mytask)
    {
        return view('mypages/thisweek_edit')->with([
            'users' => $user->get(),
            'Mytask' => $mytask,
            'mytasks_todo' => $mytask->getTodoByThisweek(),
            'mytasks_completed' => $mytask->getCompletedByThisweek(),
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
    
    public function thismonth(User $user, Mytask $mytask)
    {
        return view('mypages/mytask_thismonth')->with([
            'users' => $user->get(),
            'labtasks' => Auth::user()->getByUser(),
            'mytasks_todo' => $mytask->getTodoByThismonth(),
            'mytasks_completed' => $mytask->getCompletedByThismonth(),
        ]);
    }
    public function thismonth_create(MytaskRequest $request, Mytask $mytask)
    {
        $input = $request['mytask'];
        $mytask->fill($input)->save();
        return redirect('/mypage/mytask/thismonth');
    }
    public function thismonth_edit(User $user, Mytask $mytask)
    {
        return view('mypages/thismonth_edit')->with([
            'users' => $user->get(),
            'Mytask' => $mytask,
            'mytasks_todo' => $mytask->getTodoByThismonth(),
            'mytasks_completed' => $mytask->getCompletedByThismonth(),
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
