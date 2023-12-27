<?php
namespace App\Services;

use Validator;

class DamageReportService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data damage report yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateDamageReport($request){
        $rules = [
            "scope" => ["bail", "required", "string"],
            "classification" => ["bail", "required", "string"],
            "damage_report_date" => ["bail", "required", "date"],
            "action_plan_date" => ["bail", "required", "date", "after_or_equal:damage_report_date"],
            "status" => ["bail", "required", "string"],
            "ticket_id" => ["bail", "required", "numeric"],

            "details" => ["bail", "nullable", "array"],
            "details.*.category" => ["bail", "required", "string"],
            "details.*.location" => ["bail", "required", "string"],
            "details.*.total" => ["bail", "required", "numeric", "gte:0"],

            "signatures" => ["bail", "nullable", "array"],
            "signatures.*.type" => ["bail", "required", "string"],
            "signatures.*.name" => ["bail", "required", "string"],
            "signatures.*.signature" => ["bail", "required", "string"],
            "signatures.*.date" => ["bail", "required", "string"],
        ];
        $errorMessages = [
            "required" => "Field :attribute harus diisi",
            "string" => "Field :attribute harus diisi dengan string",
            "date" => "Field :attribute harus diisi dengan tanggal",
            "action_plan_date.after_or_equal" => "Field :attribute harus diisi dengan tanggal yang lebih besar atau sama dengan tanggal laporan kerusakan",
            "numeric" => "Field :attribute harus diisi dengan angka",
            "array" => "Field :attribute harus diisi dengan array",
            "gte" => "Field :attribute harus lebih besar dari sama dengan 0",
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        if($message == ""){
            $getTicket = $this->CommonService->getDataById("App\Models\Ticket", $request->input("ticket_id"));

            if (is_null($getTicket)) $message = "Ticket tidak ditemukan";
        }

        if($message == ""){
            $validStatus = ["terbuat", "disetujui ka", "disetujui bm", "terkirim", "lunas"];
            $status = strtolower($request->input("status"));

            if(!in_array($status, $validStatus)) $message = "Status tidak valid";
        }

        if($message == "" && !is_null($request->input("signatures"))){
            foreach($request->input("signatures") as $signature){
                $type = strtolower($signature["type"]);
                if(is_null($type)) continue;

                if(
                    $type != "ka. unit pelayanan" &&
                    $type != "kord. teknik" &&
                    $type != "leader cleaning"
                ){
                    $message = "Tipe tanda tangan tidak valid";
                    break;
                }
            }
        }

        return $message;
    }
}
