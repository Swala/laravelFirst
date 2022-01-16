<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [  //fillable allows mass-assignment but you can also break this out and assign separately
        'title',
        'url',
        'description'
    ];
}
