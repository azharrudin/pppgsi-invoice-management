<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Invoice::truncate();
        // InvoiceDetail::truncate();

        $status = ["Terbuat", "Disetujui KA", "Disetujui BM", "Terkirim", "Lunas"];
        $spelled = ["Seratus ribu rupiah", "Dua ratus ribu rupiah", "Tiga ratus ribu rupiah", "Empat ratus ribu rupiah", "Lima ratus ribu rupiah"];

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 12; $i++) {
            $count = $i + 1;
            $grandTotal = $count * 100000;
            $startDate = $faker->dateTimeBetween('-2 week', '-1 week');
            $dataIndex = $i % 5;

            Invoice::create([
                "invoice_number" => "INV/2023/{$count}",
                "tenant_id" => $count,
                "grand_total" => $grandTotal,
                "invoice_date" => $startDate,
                "invoice_due_date" => $faker->dateTimeBetween('+1 week', '+2 week'),
                "status" => $status[$dataIndex],
                "opening_paragraph" => $faker->text,
                "contract_number" => "Contr/act/{$count}",
                "contract_date" => $startDate,
                "addendum_number" => "Add/en/dum/{$count}",
                "addendum_date" => $startDate,
                "grand_total_spelled" => $spelled[$dataIndex],
                "materai_date" => $startDate,
                "materai_image" => "",
                "materai_name" => $faker->name,
                "term_and_conditions" => $faker->text,
                "bank_id" => $count,
                'deleted_at' => null,
            ]);

            for($j = 1; $j <= 2; $j++){
                $totalPrice = $grandTotal / 2;
                $tax = $totalPrice * 0.1;
                $price = $totalPrice - $tax;

                InvoiceDetail::create([
                    "invoice_id" => $count,
                    "item" => "Item {$j}",
                    "description" => $faker->text,
                    "price" => $price,
                    "tax" => $tax,
                    "total_price" => $totalPrice,
                    'deleted_at' => null,
                ]);
            }
        }
    }
}
