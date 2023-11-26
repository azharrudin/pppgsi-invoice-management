<?php
namespace App\Services;

use Validator;

class InvoiceService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data invoice yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateInvoice($request){
        $rules = [
            "invoice_number" => ["bail", "required", "string"],
            "tenant_id" => ["bail", "required", "numeric"],
            "grand_total" => ["bail", "required", "numeric", "gte:0"],
            "invoice_date" => ["bail", "required", "date", "after_or_equal:today"],
            "invoice_due_date" => ["bail", "required", "date", "after_or_equal:invoice_date"],
            "status" => ["bail", "required", "string"],
            "opening_paragraph" => ["bail", "required", "string"],
            "contract_number" => ["bail", "required", "string"],
            "contract_date" => ["bail", "required", "date", "after_or_equal:today"],
            "addendum_number" => ["bail", "required", "string"],
            "addendum_date" => ["bail", "required", "date", "after_or_equal:today"],
            "details" => ["bail", "required", "array"],
            "details.*.item" => ["bail", "required", "string"],
            "details.*.description" => ["bail", "required", "string"],
            "details.*.price" => ["bail", "required", "numeric"],
            "details.*.tax" => ["bail", "required", "numeric"],
            "details.*.total_price" => ["bail", "required", "numeric"],
            "grand_total_spelled" => ["bail", "required", "string"],
            "materai_date" => ["bail", "nullable", "date"],
            "materai_image" => ["bail", "nullable", "string"],
            "materai_name" => ["bail", "nullable", "string"],
            "term_and_conditions" => ["bail", "required", "string"],
            "bank_id" => ["bail", "required", "numeric"],
        ];
        $errorMessages = [
            "required" => "Field :attribute harus diisi",
            "string" => "Field :attribute harus diisi dengan string",
            "numeric" => "Field :attribute harus diisi dengan angka",
            "grand_total.gte" => "Field :attribute harus lebih besar dari sama dengan 0",
            "invoice_date.after_or_equal" => "Field :attribute harus lebih dari atau sama dengan hari ini",
            "invoice_due_date.after_or_equal" => "Field :attribute harus lebih besar dari atau sama dengan invoice date",
            "date" => "Field :attribute harus diisi dengan tanggal",
            "array" => "Field :attribute harus diisi dengan array",
            "contract_date.after_or_equal" => "Field :attribute harus lebih dari atau sama dengan hari ini",
            "addendum_date.after_or_equal" => "Field :attribute harus lebih dari atau sama dengan hari ini",
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        if($message == ""){
            $getTenant = $this->CommonService->getDataById("App\Models\Tenant", $request->input("tenant_id"));
            $getBank = $this->CommonService->getDataById("App\Models\Bank", $request->input("bank_id"));

            if (is_null($getTenant)) $message = "Tenant tidak ditemukan";
            else if(is_null($getBank)) $message = "Bank tidak ditemukan";
        }

        return $message;
    }
}
