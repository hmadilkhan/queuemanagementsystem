<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            "company_id" => 1,
            "country_id" => 1,
            "city_id" => 1,
            "name" => "Admin Branch",
        ]);
    }
}
