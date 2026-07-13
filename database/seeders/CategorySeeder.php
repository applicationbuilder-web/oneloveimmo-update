<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([

            [
                'name' => 'Villa',
                'slug' => 'villa',
                'icon' => 'fa-house'
            ],

            [
                'name' => 'Appartement',
                'slug' => 'appartement',
                'icon' => 'fa-building'
            ],

            [
                'name' => 'Terrain',
                'slug' => 'terrain',
                'icon' => 'fa-earth-africa'
            ],

            [
                'name' => 'Bureau',
                'slug' => 'bureau',
                'icon' => 'fa-briefcase'
            ],

            [
                'name' => 'Local commercial',
                'slug' => 'local-commercial',
                'icon' => 'fa-shop'
            ]

        ]);
    }
}