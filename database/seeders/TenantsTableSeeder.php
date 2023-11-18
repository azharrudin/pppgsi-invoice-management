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
        Tenant::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Tenant::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => "080000123{$i}",
                'company' => $faker->company,
                'floor' => "Lantai {$i}",
                'deleted_at' => null,
            ]);
        }
    }
}
