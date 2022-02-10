<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Labtask extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'is_done',
        'is_liked',
    ];
    
    // データ取得制限
    // public function getByLimit()
    // {
    //     return $this->orderBy('created_at', 'ASC')->get();
    // }
    
    public function getMytaskTodoByLabtask()
    {
        return $this->mytasks()->with('labtask')->where('task_state', 0)->orderBy('created_at', 'ASC')->get();
    }
    public function getMytaskCompletedByLabtask()
    {
        return $this->mytasks()->with('labtask')->where('task_state', 2)->orderBy('updated_at', 'DESC')->limit(10)->get();
    }
    
    public function getWithUser()
    {
        return $this::with('user')->orderBy('created_at', 'ASC')->get();
    }
    
    public function getByLabtaskForComment()
    {
        return $this::comments()->with('labtask')->with('user')->orderBy('created_at', 'ASC')->get();
    }
    
    public function getByLabtaskForImage()
    {
        return $this::images()->with('labtask')->orderBy('created_at', 'ASC')->get();
    }
    
    //statistic data
    public function getByLACD()
    {
        return $this::with('user')->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::today())->get();
    }
    public function getByLACW()
    {
        return $this::with('user')->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::now()->subWeek())->get();
    }
    public function getByLACM()
    {
        return $this::with('user')->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::now()->subMonth())->get();
    }
    
    
    
    
    // リレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function mytasks()
    {
        return $this->hasMany('App\Mytask');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    
    public function ltfavorites()
    {
        return $this->hasMany('App\Ltfavorite');
    }
}
