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
        $departmentArr = ["CS", "Teknik", "BM", "KA Unit Umum", "KA Unit Account"];
        $levelArr = ["Lead CS", "Kord Teknik", "Administrator", "KA Unit", "KA Unit"];
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 20; $i++){
            $count = $i + 1;
            $dataIndex = $i % 5;

            User::create([
                'username' => "username{$count}",
                'password' => Hash::make("123456"),
                'name' => $faker->name,
                'email'=> $faker->email,
                'department' => $departmentArr[$dataIndex],
                'level' => $levelArr[$dataIndex],
                'status' => "Active",
            ]);
        }
    }
}
