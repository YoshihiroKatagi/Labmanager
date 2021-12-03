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
    ];
    
    public function labtask()
    {
        return $this->belongsTo('App\labtask');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
