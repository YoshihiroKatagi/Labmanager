<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labtask extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];
    
    // データ取得制限
    public function getByLimit()
    {
        return $this->orderBy('created_at', 'ASC')->get();
    }
    
    public function getByLabtask(int $limit_count = 20)
    {
        return $this->mytasks()->with('labtask')->orderBy('created_at', 'ASC')->get();
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
}