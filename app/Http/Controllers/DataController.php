<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Labtask;
use App\Comment;
use App\Mytask;
use App\Ltfavorite;
use App\Cfavorite;

class DataController extends Controller
{
    public function statistic(User $user, Labtask $labtask, Mytask $mytask, Ltfavorite $ltfavorite, Cfavorite $cfavorite)
    {
        $data = [
            'users' => $user->get(),
            
            'mytask_achieve_count_day' => $mytask->getByMACD()->where('labtask.user_id', Auth::user()->id)->count(),
            'mytask_achieve_count_week' => $mytask->getByMACW()->where('labtask.user_id', Auth::user()->id)->count(),
            'mytask_achieve_count_month' => $mytask->getByMACM()->where('labtask.user_id', Auth::user()->id)->count(),
            
            'labtask_achieve_count_day' => $labtask->getByLACD()->where('user_id', Auth::user()->id)->count(),
            'labtask_achieve_count_week' => $labtask->getByLACW()->where('user_id', Auth::user()->id)->count(),
            'labtask_achieve_count_month' => $labtask->getByLACM()->where('user_id', Auth::user()->id)->count(),
            
            'labtask_good_count_day' => $ltfavorite->getByLGCD()->where('labtask.user_id', Auth::user()->id)->count(),
            'labtask_good_count_week' => $ltfavorite->getByLGCW()->where('labtask.user_id', Auth::user()->id)->count(),
            'labtask_good_count_month' => $ltfavorite->getByLGCM()->where('labtask.user_id', Auth::user()->id)->count(),
            
            'comment_good_count_day' => $cfavorite->getByCGCD()->where('comment.user_id', Auth::user()->id)->count(),
            'comment_good_count_week' => $cfavorite->getByCGCW()->where('comment.user_id', Auth::user()->id)->count(),
            'comment_good_count_month' => $cfavorite->getByCGCM()->where('comment.user_id', Auth::user()->id)->count(),
            
            // 'timer_usage_count_day' => $mytask->getByTUCD()->where('labtask.user_id', Auth::user()->id)->count(),
            // 'timer_usage_count_week' => $mytask->getByTUCW(),
            // 'timer_usage_count_month' => $mytask->getByTUCM(),
            
            // 'on_time_rate_day' => $mytask->getByOTRD(),
            // 'on_time_rate_week' => $mytask->getByOTRW(),
            // 'on_time_rate_month' => $mytask->getByOTRM(),
        ];
        
        return view('mypages/statistic')->with($data);
    }
    
    // public function ranking(User $user, Labtask $labtask, Ltfavorite $ltfavorite, Cfavorite $cfavorite)
    // {
    //     $users = $user->get();
        
    //     foreach($users as $user){
    //         $userdata = [
    //             'user_name' => $user->name,
                
    //             'labtask_achieve_count_day' => $labtask->getByLACD()->where('user_id', $user->id)->count(), 
    //             'labtask_achieve_count_week' => $labtask->getByLACW()->where('user_id', $user->id)->count(),
    //             'labtask_achieve_count_month' => $labtask->getByLACM()->where('user_id', $user->id)->count(),
                
    //             'labtask_good_count_day' => $ltfavorite->getByLGCD()->where('labtask.user_id', $user->id)->count(),
    //             'labtask_good_count_week' => $ltfavorite->getByLGCW()->where('labtask.user_id', $user->id)->count(),
    //             'labtask_good_count_month' => $ltfavorite->getByLGCM()->where('labtask.user_id', $user->id)->count(),
                
    //             'comment_good_count_day' => $cfavorite->getByCGCD()->where('comment.user_id', $user->id)->count(),
    //             'comment_good_count_week' => $cfavorite->getByCGCW()->where('comment.user_id', $user->id)->count(),
    //             'comment_good_count_month' => $cfavorite->getByCGCM()->where('comment.user_id', $user->id)->count(),
    //         ];
    //         $data[] = $userdata;
    //     }
        
    //     return view('labpages/ranking')->with(['data' => $data, 'users' => $user->get(),]);
    //     return $data;
    // }
    
    public function ranking(User $user, Ltfavorite $ltfavorite, Cfavorite $cfavorite)
    {
        $users = $user->get();
        
        foreach($users as $user){
            $data = [
                'user_name' => $user->name,
                
                $lt_today_count = $ltfavorite->getByLGCD()->where('labtask.user_id', $user->id)->count(),
                $c_today_count = $cfavorite->getByCGCD()->where('comment.user_id', $user->id)->count(),
                'good_today_count' => $lt_today_count + $c_today_count,
                
                $lt_week_count = $ltfavorite->getByLGCW()->where('labtask.user_id', $user->id)->count(),
                $c_week_count = $cfavorite->getByCGCW()->where('comment.user_id', $user->id)->count(),
                'good_week_count' => $lt_week_count + $c_week_count,
                
                $lt_month_count = $ltfavorite->getByLGCM()->where('labtask.user_id', $user->id)->count(),
                $c_month_count = $cfavorite->getByCGCM()->where('comment.user_id', $user->id)->count(),
                'good_month_count' => $lt_month_count + $c_month_count,
            ];
            $good_count[] = $data;
        }
        
        foreach((array) $good_count as $key => $value)
        {
            $sort[$key] = $value['good_today_count'];
        }
        array_multisort($sort, SORT_DESC, $good_count);
        $good_today_ranking = array_slice($good_count, 0, 3);
        
        foreach((array) $good_count as $key => $value)
        {
            $sort[$key] = $value['good_week_count'];
        }
        array_multisort($sort, SORT_DESC, $good_count);
        $good_week_ranking = array_slice($good_count, 0, 3);
        
        foreach((array) $good_count as $key => $value)
        {
            $sort[$key] = $value['good_month_count'];
        }
        array_multisort($sort, SORT_DESC, $good_count);
        $good_month_ranking = array_slice($good_count, 0, 3);
        
        
        $mytasks_today_ranking = $user->mytaskTodayRanking();
        $mytasks_week_ranking = $user->mytaskWeekRanking();
        $mytasks_month_ranking = $user->mytaskMonthRanking();
            
        $labtasks_today_ranking = $user->labtasksTodayRanking();
        $labtasks_thisweek_ranking = $user->labtasksThisweekRanking();
        $labtasks_thismonth_ranking = $user->labtasksThismonthRanking();
        
        $data = [
            'users' => $user->get(),
            
            'mytasks_today_ranking' => $mytasks_today_ranking,
            'mytasks_week_ranking' => $mytasks_week_ranking,
            'mytasks_month_ranking' => $mytasks_month_ranking,
            
            'good_today_ranking'=> $good_today_ranking,
            'good_week_ranking'=> $good_week_ranking,
            'good_month_ranking'=> $good_month_ranking,
            
            'labtasks_today_ranking' => $labtasks_today_ranking,
            'labtasks_thisweek_ranking' => $labtasks_thisweek_ranking,
            'labtasks_thismonth_ranking' => $labtasks_thismonth_ranking,
        ];
        // return $mytasks_month_ranking;
        return view('labpages/ranking', $data);
    }
}
