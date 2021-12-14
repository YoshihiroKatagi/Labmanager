<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lab_id',
        'icon',
        'student_or_not',
        'thema',
        'background',
        'motivation',
        'object',
        'github_account',
        'timer_mode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    //データ取得制限
    public function getByUser()
    {
        return $this->labtasks()->with('user')->orderBy('created_at', 'ASC')->get();
    }
    
    
    //リレーション
    public function lab()
    {
        return $this->belongsTo('App\Lab');
    }
    
    public function labtasks()
    {
        return $this->hasMany('App\Labtask');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
