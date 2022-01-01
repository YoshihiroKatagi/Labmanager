<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'labtask_id',
        'mention_to',
        'is_liked',
    ];
    
    //データ取得制限
    public function getWithLabtask()
    {
        return $this->with('labtask')->orderBy('created_at', 'ASC')->get();
    }
    
    public function getWithUser()
    {
        return $this->with('user')->orderBy('created_at', 'ASC')->get();
    }
    
    public function getMentionedComment()
    {
        return $this->with('user')->with('labtask')->where('mention_to', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
    }
    
    //リレーション
    public function labtask()
    {
        return $this->belongsTo('App\labtask');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function cfavorites()
    {
        return $this->hasMany('App\Cfavorite');
    }
    
}
