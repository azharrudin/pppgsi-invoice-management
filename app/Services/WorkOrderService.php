<?php
namespace App\Services;

use Validator;

class WorkOrderService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data work order yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateWorkOrder($request){
        $rules = [
            "scope" => ["bail", "required", "string"],
            "classification" => ["bail", "required", "string"],
            "work_order_date" => ["bail", "required", "date"],
            "action_plan_date" => ["bail", "required", "date", "after_or_equal:work_order_date"],
            "status" => ["bail", "required", "string"],
            "damage_report_id" => ["bail", "required", "numeric"],
            "finish_plan" => ["bail", "required", "date", "after_or_equal:action_plan_date"],
            "job_description" => ["bail", "required", "string"],
            "klasifikasi" => ["bail", "required", "string"],

            "details" => ["bail", "required", "array"],
            "details.*.location" => ["bail", "required", "string"],
            "details.*.material_request" => ["bail", "required", "string"],
            "details.*.type" => ["bail", "required", "string"],
            "details.*.quantity" => ["bail", "required", "numeric", "gte:0"],

            "signatures" => ["bail", "nullable", "array"],
            "signatures.*.name" => ["bail", "required", "string"],
            "signatures.*.signature" => ["bail", "required", "string"],
            "signatures.*.date" => ["bail", "required", "date"],
        ];
        $errorMessages = [
            "required" => "Field :attribute harus diisi",
            "string" => "Field :attribute harus diisi dengan string",
            "date" => "Field :attribute harus diisi dengan tanggal",
            "action_plan_date.after_or_equal" => "Field :attribute harus diisi dengan tanggal yang lebih besar atau sama dengan tanggal laporan kerusakan",
            "finish_plan.after_or_equal" => "Field :attribute harus diisi dengan tanggal yang lebih besar atau sama dengan tanggal action plan",
            "numeric" => "Field :attribute harus diisi dengan angka",
            "array" => "Field :attribute harus diisi dengan array",
            "gte" => "Field :attribute harus lebih besar dari sama dengan 0",
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        if($message == ""){
            $validScope = ["telekomunikasi", "electric", "plumbing", "civil", "bas", "mdp", "hvac", "lift", "fire system", "genset", "others"];
            $validClassification = ["previous maintenance routine", "previous maintenance non routine", "repair", "replacement", "vendor"];
            $validKlasifikasi = ["closed", "cancelled", "explanation", "others"];

            $scope = strtolower($request->input("scope"));
            $classification = strtolower($request->input("classification"));
            $klasifikasi = strtolower($request->input("klasifikasi"));

            if(!in_array($scope, $validScope)) $message = "Scope tidak ditemukan";
            else if(!in_array($classification, $validClassification)) $message = "Classification tidak ditemukan";
            else if(!in_array($klasifikasi, $validKlasifikasi)) $message = "Klasifikasi tidak ditemukan";
        }

        if($message == ""){
            $getDamageReport = $this->CommonService->getDataById("App\Models\DamageReport", $request->input("damage_report_id"));

            if (is_null($getDamageReport)) $message = "Laporan kerusakan tidak ditemukan";
        }

        return $message;
    }
}
