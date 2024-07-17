<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            "country_id" => 1,
            "name" => "Karachi"
        ]);
        City::create([
            "country_id" => 1,
            "name" => "Lahore"
        ]);
    }
}
