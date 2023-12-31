<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $nameArr = ["Admin", "Teknisi", "Kepala Unit", "BM", "Executive", "Vendor"];

        for($i = 0; $i < count($nameArr); $i++){
            Level::create([
                'name' => $nameArr[$i],
                'deleted_at' => null,
            ]);
        }
    }
}
