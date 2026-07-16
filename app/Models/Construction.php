<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    protected $fillable = [

        'title',

        'slug',

        'location',

        'type',

        'status',

        'description',

        'image',

    ];
}