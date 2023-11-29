<?php
namespace App\Services;

use Validator;

class TicketService{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Fungsi yang berfungsi untuk memvalidasi data ticket yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateTicket($request){
        $rules = [
            "reporter_name" => ["bail", "required", "string"],
            "reporter_phone" => ["bail", "required", "string"],
            "reporter_company" => ["bail", "required", "string"],
            "ticket_title" => ["bail", "required", "string"],
            "ticket_body" => ["bail", "required", "string"],
            "status" => ["bail", "required", "string"],
            "attachment" => ["bail", "nullable", "array"],
            "attachment.*" => ["bail", "required", "string"]
        ];
        $errorMessages = [
            "required" => "Field :attribute harus diisi",
            "string" => "Field :attribute harus diisi dengan string",
            "array" => "Field :attribute harus diisi dengan array"
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        return $message;
    }
}
