<?php

namespace App\Http\Controllers;

use App\Helpers\CallApiHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        try {
            $data = [
                "url" => env('BASE_URL_API') . "/api/user/login",
                "method" => "POST"
            ];

            $params =  [
                'email' => $request->email,
                'password' => $request->password
            ];

            $records = CallApiHelpers::storeAPI($data, $params);

            if ($records) {
                $this->setUserSession($records);

                // $urlMenu = env('APP_BO') . "/managementmenu";
                // $recordsMenu = CallApiHelpers::getAPI($urlMenu);
                // usort($recordsMenu['data'], function ($a, $b) {
                //     return $a['order'] - $b['order'];
                // });
                // $sortedJson = json_encode($recordsMenu);
                // Session::put('listMenu', $recordsMenu);

                // $urlRole = env('APP_BO') . "/roles/get/".$records['data']['user']['role_id'];
                // $recordsRole = CallApiHelpers::getAPI($urlRole);

                // Session::put('SESSION_ROLE_NAME', $records['data']['user']['role_name']);
                // Session::put('SESSION_ACCESS_KEY', $records['data']['access_token']);
                // Session::put('SESSION_USER_ID', $records['data']['user']['id']);
                // Session::put('SESSION_USER_NAME', $records['data']['user']['phone_number']);
                // Session::put('SESSION_FULL_NAME', $records['data']['user']['name']);
                // Session::put('SESSION_BRANCH_CODE', $records['data']['user']['kd_cbg']);
                // Session::put('SESSION_BRANCH_NAME', $records['data']['user']['nm_cabang']);



                //kebutuhan MDS
                // session(['SESSION_ACCESS_KEY' => $access_token]);
                // session(['SESSION_USER_ID' => $user_id]);
                // session(['SESSION_USER_NAME' => $name]);
                // session(['SESSION_FULL_NAME' => $full_name]);
                // session(['SESSION_ROLE_NAME' => $role_name]);
                // session(['SESSION_BRANCH_CODE' => $kode_cabang]);
                //
                echo json_encode(array("message" => "SUCCESS_LOGIN", "credentials" => $records['data']));
                //return "SUCCESS_LOGIN";
            } else {
                echo json_encode(array("message" => $records['message'], "error" => $records['status']));
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                if ($e->getResponse()->getStatusCode() == '401') {
                    return redirect('/')->with('alert-error', 'Password atau User Anda Salah');
                    return '401 Password atau User Anda Salah';
                }
                if ($e->getResponse()->getStatusCode() == '403') {
                    return redirect('/')->with('alert-error', 'Role Anda Belum Diatur.');
                    return '403 Role Anda Belum Diatur';
                }
                if ($e->getResponse()->getStatusCode() == '500') {
                    return redirect('/login1')->with('alert-error', 'Maaf Anda Tidak Bisa Login.');
                    return '500 Terjadi kesalahan sistem!';
                }
            }
        }
    }

    public function logout()
    {
        Session::forget('ACCESS_TOKEN');
        Session::flush();
        return redirect()->route('login');
    }

    protected function setUserSession($auth)
    {
        session([
            'ACCESS_TOKEN' => $auth['token'],
            'data' => $auth['data'],
        ]);
    }
}
