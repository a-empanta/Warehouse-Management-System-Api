<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'name' => 'Amsterdam Central Warehouse',
            'coordinates' => [
                'lat' => 52.379189,
                'lng' => 4.899431,
            ],
            'address' => 'Nieuwezijds Voorburgwal 182',
            'city' => 'Amsterdam',
            'country' => 'Netherlands',
        ]);

        Warehouse::create([
            'name' => 'Rotterdam Distribution Center',
            'coordinates' => [
                'lat' => 51.924420,
                'lng' => 4.477733,
            ],
            'address' => 'Weena 505',
            'city' => 'Rotterdam',
            'country' => 'Netherlands',
        ]);
    }
}
