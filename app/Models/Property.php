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
        'category_id',

    ];

    /**
     * Relation : un bien appartient à une catégorie.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}