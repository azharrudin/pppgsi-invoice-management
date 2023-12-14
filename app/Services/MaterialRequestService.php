<?php
namespace App\Services;

use Validator;

class MaterialRequestService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data material request yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateMaterialRequest($request){
        $rules = [
            "requester" => ["bail", "required", "string"],
            "department" => ["bail", "required", "string"],
            "request_date" => ["bail", "required", "date"],
            "status" => ["bail", "required", "string"],
            "stock" => ["bail", "nullable", "numeric"],
            "purchase" => ["bail", "nullable", "string"],
            "note" => ["bail", "required", "string"],

            "details" => ["bail", "required", "array"],
            "details.*.number" => ["bail", "required", "numeric"],
            "details.*.part_number" => ["bail", "required", "string"],
            "details.*.description" => ["bail", "required", "string"],
            "details.*.quantity" => ["bail", "required", "numeric"],
            "details.*.stock" => ["bail", "required", "numeric"],
            "details.*.stock_out" => ["bail", "required", "numeric"],
            "details.*.end_stock" => ["bail", "required", "numeric"],
            "details.*.min_stock" => ["bail", "required", "numeric"],

            "signatures" => ["bail", "nullable", "array"],
            "signatures.*.type" => ["bail", "required", "string"],
            "signatures.*.name" => ["bail", "required", "string"],
            "signatures.*.signature" => ["bail", "required", "string"],
            "signatures.*.date" => ["bail", "required", "date"],
        ];
        $errorMessages = [
            "required" => "Field :attribute harus diisi",
            "string" => "Field :attribute harus diisi dengan string",
            "date" => "Field :attribute harus diisi dengan tanggal",
            "numeric" => "Field :attribute harus diisi dengan angka",
            "array" => "Field :attribute harus diisi dengan array",
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        if($message == ""){
            $validStatus = ["terbuat", "disetujui ka", "disetujui bm", "terkirim", "lunas"];
            $status = strtolower($request->input("status"));

            if(!in_array($status, $validStatus)) $message = "Status tidak valid";
        }

        if($message == "" && !is_null($request->input("signatures"))){
            $validType = ["prepared by", "reviewed by", "acknowledge by", "approved by"];

            foreach($request->input("signatures") as $signature){
                $type = strtolower($signature['type']);
                if(!in_array($type, $validType)){
                    $message = "Signature type tidak ditemukan";
                    break;
                }
            }
        }

        return $message;
    }
}
