<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [

        'title',
        'slug',
        'description',
        'price',
        'type',
        'city',
        'address',
        'surface',
        'bedrooms',
        'bathrooms',
        'status',
        'image',

    ];
}