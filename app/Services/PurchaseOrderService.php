<?php
namespace App\Services;

use Validator;

class PurchaseOrderService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data purchase order yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validatePurchaseOrder($request){
        $rules = [
            "vendor_id" => ["bail", "required", "numeric"],
            "about" => ["bail", "required", "string"],
            "grand_total" => ["bail", "required", "numeric", "gte:0"],
            "purchase_order_date" => ["bail", "required", "date"],
            "status" => ["bail", "required", "string"],
            "tenant_id" => ["bail", "required", "numeric"],
            "note" => ["bail", "required", "string"],
            "subtotal" => ["bail", "required", "numeric"],
            "tax" => ["bail", "required", "numeric"],
            "grand_total_spelled" => ["bail", "required", "string"],
            "term_and_conditions" => ["bail", "required", "string"],
            "signature" => ["bail", "required", "string"],
            "signature_name" => ["bail", "required", "string"],

            "details" => ["bail", "required", "array"],
            "details.*.number" => ["bail", "required", "numeric"],
            "details.*.name" => ["bail", "required", "string"],
            "details.*.specification" => ["bail", "required", "string"],
            "details.*.quantity" => ["bail", "required", "numeric"],
            "details.*.units" => ["bail", "required", "string"],
            "details.*.price" => ["bail", "required", "numeric"],
            "details.*.tax" => ["bail", "required", "string"],
            "details.*.total_price" => ["bail", "required", "numeric"],
        ];
        $errorMessages = [
            "required" => "Field :attribute harus diisi",
            "string" => "Field :attribute harus diisi dengan string",
            "date" => "Field :attribute harus diisi dengan tanggal",
            "gte" => "Field :attribute harus lebih besar atau sama dengan 0",
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

        if($message == ""){
            $vendorExist = $this->CommonService->getDataById("App\Models\Vendor", $request->input("vendor_id"));
            $tenantExist = $this->CommonService->getDataById("App\Models\Tenant", $request->input("tenant_id"));

            if(is_null($vendorExist)) $message = "Vendor tidak ditemukan";
            else if(is_null($tenantExist)) $message = "Tenant tidak ditemukan";
        }

        return $message;
    }
}
