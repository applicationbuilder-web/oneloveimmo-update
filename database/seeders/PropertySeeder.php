<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Seed the database.
     */
    public function run(): void
    {
        Property::create([
            'category_id' => 1,
            'title' => 'Villa moderne avec piscine',
            'slug' => Str::slug('Villa moderne avec piscine'),
            'description' => 'Magnifique villa moderne située dans un quartier résidentiel sécurisé.',
            'price' => 85000000,
            'type' => 'Vente',
            'city' => 'Brazzaville',
            'address' => 'Centre-ville',
            'surface' => 350,
            'bedrooms' => 5,
            'bathrooms' => 3,
            'status' => 'a_vendre',
            'featured' => true,
            'image' => 'villa1.jpg',
        ]);

        Property::create([
            'category_id' => 2,
            'title' => 'Appartement haut standing',
            'slug' => Str::slug('Appartement haut standing'),
            'description' => 'Appartement moderne avec une vue panoramique.',
            'price' => 45000000,
            'type' => 'Vente',
            'city' => 'Pointe-Noire',
            'address' => 'Centre',
            'surface' => 180,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'status' => 'a_vendre',
            'featured' => true,
            'image' => 'appartement1.jpg',
        ]);

        Property::create([
            'category_id' => 3,
            'title' => 'Terrain constructible',
            'slug' => Str::slug('Terrain constructible'),
            'description' => 'Terrain plat avec tous les documents administratifs.',
            'price' => 18000000,
            'type' => 'Vente',
            'city' => 'Dolisie',
            'address' => 'Quartier résidentiel',
            'surface' => 800,
            'bedrooms' => 0,
            'bathrooms' => 0,
            'status' => 'a_vendre',
            'featured' => false,
            'image' => 'terrain1.jpg',
        ]);

        Property::create([
            'category_id' => 4,
            'title' => 'Bureau professionnel',
            'slug' => Str::slug('Bureau professionnel'),
            'description' => 'Bureau idéal pour entreprise.',
            'price' => 1200000,
            'type' => 'Location',
            'city' => 'Brazzaville',
            'address' => 'Plateau',
            'surface' => 120,
            'bedrooms' => 0,
            'bathrooms' => 2,
            'status' => 'a_louer',
            'featured' => false,
            'image' => 'bureau1.jpg',
        ]);

        Property::create([
            'category_id' => 5,
            'title' => 'Local commercial',
            'slug' => Str::slug('Local commercial'),
            'description' => 'Local situé dans une zone très fréquentée.',
            'price' => 2500000,
            'type' => 'Location',
            'city' => 'Pointe-Noire',
            'address' => 'Marché central',
            'surface' => 200,
            'bedrooms' => 0,
            'bathrooms' => 1,
            'status' => 'a_louer',
            'featured' => false,
            'image' => 'commerce1.jpg',
        ]);
    }
}