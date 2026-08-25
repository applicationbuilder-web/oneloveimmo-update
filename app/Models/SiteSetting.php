<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
   protected $fillable = [

    // Images
    'hero_image',
    'construction_image',
    'about_image',
    'project_image_1',
    'project_image_2',
    'project_image_3',

    // Contact
    'contact_address',
    'contact_phone',
    'contact_email',

    // Réseaux sociaux
    'facebook_url',
    'instagram_url',
    'linkedin_url',
    'whatsapp_url',
];
}