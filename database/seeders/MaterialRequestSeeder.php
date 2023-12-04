<?php

namespace Database\Seeders;

use App\Models\MaterialRequest;
use App\Models\MaterialRequestDetail;
use App\Models\MaterialRequestSignature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ["Terbuat", "Disetujui KA", "Disetujui BM", "Terbuat", "Disetujui KA"];
        $signatureType = ["Prepared By", "Reviewed By", "Acknowledge By", "Approved By"];
        $image = "iVBORw0KGgoAAAANSUhEUgAAAB8AAAAfCAMAAAAocOYLAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADGUExURQAAACxPjTFSlC1VjjBQjzBTjTBUkTBSkDBRjzBSjy9UkC5Sji9Sji9TjjBRjy9TjjBRjy9SkC5TjzBRji9Sjy5Rjy5Sjy9SjzBTjy9SkC9SjzBTjzBSjjNQjTVPizlOiS9SjzRQjDZPijpOiHE5Y3Q3X3g1XXo0W4ouUIsuUJQqSZQqSpYpSJ0nRKMkP6QkPq8gN7IeNbkcMLwaLr8ZLMgWJssVJM0UItQRHtURHeYKEekJD+sIDe4HDPAGCvsCAv0BAf8AAGNcZoIAAAAgdFJOUwAdHy0wSk9qa3BzhYyOkJGmp7CwsrbAw8zl5vHy/v7+V5YDSAAAAAlwSFlzAAAXEQAAFxEByibzPwAAAZBJREFUOE+FkwlTwjAQhQMFBDw45CiH8gkUlFNEEK2C+f9/yk0TtHU83kwnzb6X5G12o76Qztf8Fi2/lk+7SBzZJl9oZl30CK8K18FqFx7C3SroQ9VzTIRcl978XR/xPh/QyTlOUIDx3nEW+zEUHKtyMIuib+vF7WL9Fv3PwO3gdS29GTl3o60VdKyHKmMzfxSmfXF50Zbx3gTGVA2dpWfPFkHJBFJnMJX5foBJs8nckDGBOoGJzOc05da4lsQ2JARFrl4lzT5plScQZkhSUOZOpgF5VWOl9YuxHRdkINR6RU357LReUy8lBQ2etN7hq5YRTjhVSUGFB61DWgrE3pJzlRScs9T6ALJenD5QkTVxwanJ0Kz3edb6iYY5NCaos7bnR/5DyCQF8GL92/zvKBs+JhjKYPJP0xeDrzcUk4KNuz93/xM4SQjki+5f6jcw9ZvCWSom+Kzfsf734ulY/0jg6q+8ju2f7Wf/yNmmf7quh//pv3/7V3boMPjW/91Y/9v30//9/Qj+fn8GP7xfpT4A7Fx3tyQuhu4AAAAASUVORK5CYII=";

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $count = $i + 1;
            $firstDate = $faker->dateTimeBetween('-2 week', '-1 week');

            MaterialRequest::create([
                "requester" => $faker->name,
                "department" => "Department {$count}",
                "request_date" => $firstDate,
                "status" => $status[$i],
                "stock" => null,
                "purchase" => null,
                "note" => $faker->text,
                'deleted_at' => null,
            ]);

            for($j = 1; $j <= 3; $j++){
                $quantity = $j * 2;

                MaterialRequestDetail::create([
                    "material_request_id" => $count,
                    "number" => $j,
                    "part_number" => "PART-{$j}",
                    "description" => $faker->text,
                    "quantity" => $quantity,
                    "stock" => ($j * 10),
                    "stock_out" => $quantity,
                    "end_stock" => ($j * 5),
                    "min_stock" => $quantity,
                    "deleted_at" => null,
                ]);
            }

            for($j = 0; $j < 4; $j++){
                MaterialRequestSignature::create([
                    "material_request_id" => $count,
                    "type" => $signatureType[$j],
                    "name" => $faker->name,
                    "signature" => $image,
                    "date" => $faker->dateTimeBetween('+1 week', '+2 week'),
                    "deleted_at" => null,
                ]);
            }
        }
    }
}
