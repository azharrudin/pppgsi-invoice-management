<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Tenant::create([
                'paper_id' => "5e55edfd-b6d8-45fd-88e1-20f6bb49cdca",
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => "080000123{$i}",
                'company' => $faker->company,
                'floor' => "Lantai {$i}",
                'status' => "Active",
                'deleted_at' => null,
            ]);
        }
    }
}
