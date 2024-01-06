<?php

namespace App\Http\Controllers;

use Validator;
use App\Exceptions\CustomException;
use App\Mail\EmailWithAttachment;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    public function send(Request $request)
    {
        try{
            $rules = [
                "tenant_id" => ["bail", "required", "numeric"],
                "file_name" => ["bail", "required", "string"],
                "file" => ["bail", "required", "string"],
            ];
            $errorMessages = [
                "required" => "Field :attribute harus diisi",
                "numeric" => "Field :attribute harus diisi dengan angka",
                "string" => "Field :attribute harus diisi dengan string",
            ];

            $validator = Validator::make($request->all(), $rules, $errorMessages);
            if ($validator->fails()) throw new CustomException( implode(', ', $validator->errors()->all()), 400);

            $tenantId = $request->input("tenant_id");
            $tenantExist = $this->CommonService->getDataById("App\Models\Tenant", $tenantId);
            if(is_null($tenantExist)) throw new CustomException("Tenant tidak ditemukan", 404);

            Mail::to($tenantExist["email"])->send(new EmailWithAttachment($tenantExist, $request->input("file"), $request->input("file_name")));

            return [
                "message" => "Email berhasil dikirim"
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }
}
