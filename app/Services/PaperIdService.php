<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Validator;

class PaperIdService{
    protected $baseUrl;
    protected $clientId;
    protected $clientSecret;
    protected $headers;

    public function __construct() {
        $this->baseUrl = env("PAPER_ID_PROD_URL");
        $this->clientId = env("PAPER_ID_PROD_CLIENT_ID");
        $this->clientSecret = env("PAPER_ID_PROD_CLIENT_SECRET");
        $this->headers = [
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret,
        ];
    }

    /**
     * Fungsi untuk memanggil API Create Partner atau API Update Partner
     *
     * @param String $id Id dari tenant
     * @param String $name Nama dari tenant
     * @param String $phone No Hp tenant
     * @param String $partnerId Id dari partner yang akan di update
     * @param Boolean $isCreate Diisi true jika fungsi ini dipanggil untuk create partner, selain itu false
     * @return String string yang berisi pesan error
     */
    public function createOrUpdatePartner($id, $name, $phone, $partnerId, $isCreate = true){
        $payload = [
            "name" => $name,
            "phone" => $phone,
            "number" => strval($id),
            "email" => "",
            "type" => "client",
            "business_type" => "",
            "mobile_phone" => "",
            "address" => [
                "address_line_1" => "",
                "address_line_2" => "",
                "state" => "",
                "city" => "",
                "postal_code" => "",
                "country" => ""
            ],
            "notes" => "",
            "virtual_account" => "",
            "bank_accounts" => [],
            "contacts" => [],
            "payment_method" => [
                "credit_card" => true,
                "bank_transfer" => true,
                "ewallet" => true,
                "digital_payment_partner" => true,
                "qris" => true,
            ]
        ];

        if($isCreate){
            $url = $this->baseUrl . "/api/v2/partners";
            $callApi = Http::withHeaders($this->headers)->post($url, $payload);
        } else{
            $url = $this->baseUrl . "/api/v2/partners/" . $partnerId;
            $callApi = Http::withHeaders($this->headers)->put($url, $payload);
        }

        if($callApi->successful()) $callApiJson = $callApi->json();
        else $callApiJson = [];

        return $callApiJson;
    }
}
