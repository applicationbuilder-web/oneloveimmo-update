<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::create([

            'title' => 'Villa moderne avec piscine',
            'slug' => 'villa-moderne-avec-piscine',
            'description' => 'Magnifique villa moderne située dans un quartier résidentiel calme.',
            'price' => 85000000,
            'type' => 'Villa',
            'city' => 'Brazzaville',
            'address' => 'Centre-ville',
            'surface' => 350,
            'bedrooms' => 5,
            'bathrooms' => 3,
            'status' => 'a_vendre',
            'image' => 'villa1.jpg',

        ]);


        Property::create([

            'title' => 'Appartement luxueux',
            'slug' => 'appartement-luxueux',
            'description' => 'Appartement moderne avec toutes les commodités.',
            'price' => 45000000,
            'type' => 'Appartement',
            'city' => 'Pointe-Noire',
            'address' => 'Quartier résidentiel',
            'surface' => 120,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'status' => 'a_louer',
            'image' => 'appartement1.jpg',

        ]);


        Property::create([

            'title' => 'Terrain résidentiel',
            'slug' => 'terrain-residentiel',
            'description' => 'Terrain idéal pour construction de maison.',
            'price' => 20000000,
            'type' => 'Terrain',
            'city' => 'Dolisie',
            'address' => 'Zone extension',
            'surface' => 600,
            'bedrooms' => 0,
            'bathrooms' => 0,
            'status' => 'a_vendre',
            'image' => 'terrain1.jpg',

        ]);
    }
}