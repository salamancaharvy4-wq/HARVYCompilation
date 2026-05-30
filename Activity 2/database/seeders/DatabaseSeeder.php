<?php

namespace Database\Seeders;

use App\Models\LaundryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Express Uniform Wash',
                'category' => 'Wash and Fold',
                'price' => 150,
                'duration_minutes' => 90,
                'detergent_type' => 'Antibacterial Liquid',
                'description' => 'Fast wash package for school or work uniforms.',
                'is_available' => true,
            ],
            [
                'name' => 'Delicate Fabric Care',
                'category' => 'Special Care',
                'price' => 220,
                'duration_minutes' => 120,
                'detergent_type' => 'Mild Hypoallergenic',
                'description' => 'Gentle cleaning for silk, lace, and soft clothing.',
                'is_available' => true,
            ],
            [
                'name' => 'Heavy Blanket Cleaning',
                'category' => 'Large Items',
                'price' => 300,
                'duration_minutes' => 180,
                'detergent_type' => 'Deep Clean Powder',
                'description' => 'Deep wash for blankets, comforters, and bulky linens.',
                'is_available' => true,
            ],
        ];

        foreach ($services as $service) {
            LaundryService::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}
