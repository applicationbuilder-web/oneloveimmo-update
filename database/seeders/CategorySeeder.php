<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Villa',
                'icon' => 'fa-house',
                'description' => 'Villas modernes et de luxe.',
            ],

            [
                'name' => 'Appartement',
                'icon' => 'fa-building',
                'description' => 'Appartements à vendre ou à louer.',
            ],

            [
                'name' => 'Terrain',
                'icon' => 'fa-map',
                'description' => 'Terrains constructibles et agricoles.',
            ],

            [
                'name' => 'Bureau',
                'icon' => 'fa-briefcase',
                'description' => 'Bureaux professionnels.',
            ],

            [
                'name' => 'Commerce',
                'icon' => 'fa-store',
                'description' => 'Locaux commerciaux.',
            ],

            [
                'name' => 'Construction',
                'icon' => 'fa-hammer',
                'description' => 'Services de construction.',
            ],

        ];

        foreach ($categories as $category) {

            Category::create([

                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'description' => $category['description'],

            ]);

        }
    }
}