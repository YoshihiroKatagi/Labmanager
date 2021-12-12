<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
    //リレーション
    public function labtask()
    {
        return $this->belongsTo('App\labtask');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
