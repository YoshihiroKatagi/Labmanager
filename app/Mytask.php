<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function getByLimit(int $limit_count = 20)
    {
        return $this::with('labtask')->orderBy('created_at', 'ASC')->limit($limit_count)->get();
    }
    
    public function getByToday()
    {
        // return $this::with('labtask')::where('will_finish_on', today())->orderBy('created_at', 'ASC')->get();
        return $this::with('labtask')::whereDate('will_finish_on', Carbon::today())->orderBy('created_at', 'ASC')->get();
    }
    
    // リレーション
    public function labtask()
    {
        return $this->belongsTo('App\Labtask');
    }
}
