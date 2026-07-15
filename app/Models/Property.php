<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    protected $fillable = [

        'category_id',
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
        'featured',
        'image',

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    
}