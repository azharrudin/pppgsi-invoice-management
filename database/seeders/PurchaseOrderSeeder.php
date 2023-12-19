<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ["Terbuat", "Disetujui KA", "Disetujui BM", "Terbuat", "Disetujui KA"];
        $grandTotalSpelled = ["Seratus juta rupiah", "Dua ratus juta rupiah", "Tiga ratus juta rupiah", "Empat ratus juta rupiah", "Lima ratus juta rupiah"];
        $image = "iVBORw0KGgoAAAANSUhEUgAAAB8AAAAfCAMAAAAocOYLAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADGUExURQAAACxPjTFSlC1VjjBQjzBTjTBUkTBSkDBRjzBSjy9UkC5Sji9Sji9TjjBRjy9TjjBRjy9SkC5TjzBRji9Sjy5Rjy5Sjy9SjzBTjy9SkC9SjzBTjzBSjjNQjTVPizlOiS9SjzRQjDZPijpOiHE5Y3Q3X3g1XXo0W4ouUIsuUJQqSZQqSpYpSJ0nRKMkP6QkPq8gN7IeNbkcMLwaLr8ZLMgWJssVJM0UItQRHtURHeYKEekJD+sIDe4HDPAGCvsCAv0BAf8AAGNcZoIAAAAgdFJOUwAdHy0wSk9qa3BzhYyOkJGmp7CwsrbAw8zl5vHy/v7+V5YDSAAAAAlwSFlzAAAXEQAAFxEByibzPwAAAZBJREFUOE+FkwlTwjAQhQMFBDw45CiH8gkUlFNEEK2C+f9/yk0TtHU83kwnzb6X5G12o76Qztf8Fi2/lk+7SBzZJl9oZl30CK8K18FqFx7C3SroQ9VzTIRcl978XR/xPh/QyTlOUIDx3nEW+zEUHKtyMIuib+vF7WL9Fv3PwO3gdS29GTl3o60VdKyHKmMzfxSmfXF50Zbx3gTGVA2dpWfPFkHJBFJnMJX5foBJs8nckDGBOoGJzOc05da4lsQ2JARFrl4lzT5plScQZkhSUOZOpgF5VWOl9YuxHRdkINR6RU357LReUy8lBQ2etN7hq5YRTjhVSUGFB61DWgrE3pJzlRScs9T6ALJenD5QkTVxwanJ0Kz3edb6iYY5NCaos7bnR/5DyCQF8GL92/zvKBs+JhjKYPJP0xeDrzcUk4KNuz93/xM4SQjki+5f6jcw9ZvCWSom+Kzfsf734ulY/0jg6q+8ju2f7Wf/yNmmf7quh//pv3/7V3boMPjW/91Y/9v30//9/Qj+fn8GP7xfpT4A7Fx3tyQuhu4AAAAASUVORK5CYII=";

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 12; $i++) {
            $count = $i + 1;
            $firstDate = $faker->dateTimeBetween('-2 week', '-1 week');
            $grandTotal = $count * 100000000;
            $tax = $grandTotal / 10;
            $subtotal = $grandTotal - $tax;
            $dataIndex = $i % 5;

            PurchaseOrder::create([
                "purchase_order_number" => "PURCHASE/ORD/ER/{$count}",
                "vendor_id" => $count,
                "about" => $faker->colorName,
                "grand_total" => $grandTotal,
                "purchase_order_date" => $firstDate,
                "status" => $status[$dataIndex],
                "tenant_id" => $count,
                "note" => $faker->text,
                "subtotal" => $subtotal,
                "tax" => $tax,
                "grand_total_spelled" => $grandTotalSpelled[$dataIndex],
                "term_and_conditions" => $faker->text,
                "signature" => $image,
                "signature_name" => $faker->name,
                'deleted_at' => null,
            ]);

            for($j = 1; $j <= 5; $j++){
                $totalPrice = $subtotal / 5;

                PurchaseOrderDetail::create([
                    "purchase_order_id" => $count,
                    "number" => $j,
                    "name" => "Item {$j}",
                    "specification" => null,
                    "quantity" => $j,
                    "units" => "pcs",
                    "price" => $totalPrice,
                    "tax" => "Pajak 11%",
                    "total_price" => $totalPrice,
                    "deleted_at" => null,
                ]);
            }
        }
    }
}
