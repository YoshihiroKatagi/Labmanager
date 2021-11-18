<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labtask extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];
}
