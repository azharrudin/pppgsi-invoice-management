<?php
namespace App\Services;

use Validator;

class ReceiptService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data receipt yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateReceipt($request){
        $rules = [
            "receipt_number" => ["bail", "required", "string"],
            "grand_total" => ["bail", "required", "numeric", "gte:0"],
            "receipt_date" => ["bail", "required", "date", "after_or_equal:today"],
            "receipt_send_date" => ["bail", "required", "date", "after_or_equal:receipt_date"],
            "tenant_id" => ["bail", "required", "numeric"],
            "invoice_id" => ["bail", "required", "numeric"],
            "status" => ["bail", "required", "string"],
            "check_number" => ["bail", "required", "string"],
            "bank_id" => ["bail", "required", "numeric"],
            "paid" => ["bail", "required", "numeric", "gte:0"],
            "grand_total_spelled" => ["bail", "required", "string"],
            "note" => ["bail", "nullable", "string"],
            "signature_date" => ["bail", "required", "date", "after_or_equal:today"],
            "signature_image" => ["bail", "required", "string"],
            "signature_name" => ["bail", "required", "string"],
        ];
        $errorMessages = [
            "required" => "The :attribute field is required",
            "string" => "The :attribute field must be string",
            "numeric" => "The :attribute field must be number",
            "gte" => "The :attribute field must be greater than or equal to 0",
            "date" => "The :attribute field must be date",
            "receipt_date.after_or_equal" => "The :attribute field must be greater than or equal to today",
            "receipt_send_date.after_or_equal" => "The :attribute field must be greater than or equal to receipt date",
            "signature_date.after_or_equal" => "The :attribute field must be greater than or equal to today",
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        if($message == ""){
            $getTenant = $this->CommonService->getDataById("App\Models\Tenant", $request->input("tenant_id"));
            $getBank = $this->CommonService->getDataById("App\Models\Bank", $request->input("bank_id"));
            $getInvoice = $this->CommonService->getDataById("App\Models\Invoice", $request->input("invoice_id"));

            if (is_null($getTenant)) $message = "Tenant not found";
            else if(is_null($getBank)) $message = "Bank not found";
            else if(is_null($getInvoice)) $message = "Invoice not found";
        }

        return $message;
    }
}
