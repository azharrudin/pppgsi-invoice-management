<?php
namespace App\Services;

use Validator;

class TenantService{
    /**
     * Fungsi yang berfungsi untuk memvalidasi data tenant yang diinput oleh user
     *
     * @param \Illuminate\Http\Request $request Object Request yang berisi input dari user
     * @return String string yang berisi pesan error
     */
    public function validateTenant($request){
        $rules = [
            "name" => ["bail", "required", "string"],
            "email" => ["bail", "required", "email"],
            "phone" => ["bail", "required", "numeric"],
            "company" => ["bail", "required", "string"],
            "floor" => ["bail", "required", "string"],
        ];
        $errorMessages = [
            "required" => "The :attribute field is required",
            "string" => "The :attribute field must be string",
            "email" => "The :attribute field must be written using valid email format",
            "numeric" => "The :attribute field must be written using number",
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        $message = "";
        if ($validator->fails()) $message = implode(', ', $validator->errors()->all());

        return $message;
    }
}
