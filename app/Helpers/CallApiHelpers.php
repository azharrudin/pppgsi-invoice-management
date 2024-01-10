<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Spatie\Menu\Link;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;
use Illuminate\Support\Facades\Log;
// use Monolog\Logger;
// use Logtail\Monolog\LogtailHandler;

class CallApiHelpers
{

    public static function getAPI($url)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('ACCESS_TOKEN')
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public static function storeAPI($data, $params)
    {
        try {
            $client = new Client(['http_errors' => false]);
            $response = $client->request($data["method"], $data["url"], [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('ACCESS_TOKEN')
                ],
                'form_params' => $params
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


        // return json_decode($response->getBody()->getContents(), true);

    }

    public static function deleteAPI($url)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->delete($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('ACCESS_TOKEN')
            ]
        ]);
        return json_decode($response->getBody(), true);
    }
}
