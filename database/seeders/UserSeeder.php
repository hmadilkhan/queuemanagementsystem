<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "company_id" => 1,
            "branch_id" => 1,
            "role_id" => 1,
            "name" => "Muhammad Adil Khan",
            "email" => "aptechadil@gmail.com",
            "email" => "aptechadil@gmail.com",
            "username" => "hmadilkhan",
            "password" => Hash::make("12345678"),
        ]);
    }
}
