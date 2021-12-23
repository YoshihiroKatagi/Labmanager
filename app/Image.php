<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'labtask_id',
        'image_path',
        'description',
    ];
    
    //リレーション
    public function labtask()
    {
        return $this->belongsTo('App\Labtask');
    }
}
