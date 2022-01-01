<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Ltfavorite extends Model
{
    public function getByLGCD()
    {
        return $this::with('labtask')->whereDate('created_at', '>=', Carbon::today())->get();
    }
    public function getByLGCW()
    {
        return $this::with('labtask')->whereDate('created_at', '>=', Carbon::now()->subWeek())->get();
    }
    public function getByLGCM()
    {
        return $this::with('labtask')->whereDate('created_at', '>=', Carbon::now()->subMonth())->get();
    }
    
    
    //リレーション
    public function labtask()
    {
        return $this->belongsTo('App\Labtask');
    }
}
