<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = ['A1', 'A2', 'B1', 'B2'];

        foreach ($apartments as $apartment) {
            Apartment::create([
                'title' => $apartment,
                'description' => $apartment,
                'bedrooms' => rand(1, 2),
                'bathrooms' => rand(1, 2),
                'has_balcony' => rand(0, 1),
                'price' => rand(5500, 8500),
                'available' => false,
            ]);
        }
    }
}
