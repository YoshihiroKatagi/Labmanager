<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Mytask extends Model
{
    protected $fillable = [
        'labtask_id',
        'title',
        'description',
        'will_begin_on',
        'will_begin_at',
        'will_finish_on',
        'will_finish_at',
        'is_finished_at',
        'task_state',
        'timer_count',
        'timer_result',
        'on_time_or_not',
        'within_timer_count_or_not',
    ];
    
    // データ取得制限
    // public function getByLimit()
    // {
    //     return $this::with('labtask')->orderBy('created_at', 'ASC')->get();
    // }
    
    public function getByToday()
    {
        return $this::with('labtask')->whereDate('will_finish_on', '<=', Carbon::today())->orderBy('created_at', 'ASC')->get();
    }
    
    public function getByTomorrow()
    {
        return $this::with('labtask')->whereDate('will_finish_on', '<=', Carbon::tomorrow())->orderby('created_at', 'ASC')->get();
    }
    
    public function getByThisweek()
    {
        return $this::with('labtask')->whereDate('will_finish_on','<=', Carbon::now()->endOfWeek())->orderby('created_at', 'ASC')->get();
    }
    
    public function getByThismonth()
    {
        return $this::with('labtask')->whereDate('will_finish_on','<=', Carbon::now()->endOfMonth())->orderby('created_at', 'ASC')->get();
    }
    
    // リレーション
    public function labtask()
    {
        return $this->belongsTo('App\Labtask');
    }
}
