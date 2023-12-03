<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(TenantsTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(ReceiptSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(DamageReportSeeder::class);
        $this->call(WorkOrderSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(MaterialRequestSeeder::class);
        $this->call(PurchaseRequestSeeder::class);
    }
}
