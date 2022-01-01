<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Cfavorite extends Model
{
    public function getByCGCD()
    {
        return $this::with('comment')->whereDate('created_at', '>=', Carbon::today())->get();
    }
    public function getByCGCW()
    {
        return $this::with('comment')->whereDate('created_at', '>=', Carbon::now()->subWeek())->get();
    }
    public function getByCGCM()
    {
        return $this::with('comment')->whereDate('created_at', '>=', Carbon::now()->subMonth())->get();
    }
    
    
    //リレーション
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
