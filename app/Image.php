<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function labtask()
    {
        return $this->belongsTo('App\Labtask');
    }
}
