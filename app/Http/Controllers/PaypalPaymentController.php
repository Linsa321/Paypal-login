<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Illuminate\Support\Facades\Http;

class PaypalPaymentController extends Controller
{
    public function index()
    {
        return view('paypal.paypal-login'); 
    }

    public function success()
    {   
        
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_CLIENT_SECRET');

        $client = new \GuzzleHttp\Client();

        $authorizationString = base64_encode($clientId . ':' . $clientSecret);

        $response = $client->post( 
            env('PAYPAL_SANDBOX_URI'). 'oauth2/token',
            [
                'headers' => [
                    'Authorization' => 'Basic ' . $authorizationString
                ], 
                'form_params' => [
                    'grant_type' => "client_credentials",
                    'code' => '{authorization_code}'
                ]
            ]
        );
        $result = json_decode($response->getBody(), true);

        return $this->userInfo($result['access_token']);
    }

    public function userInfo($access_token){

        $client = new \GuzzleHttp\Client();

        $response = $client->get(
            env('PAYPAL_SANDBOX_URI'). 'identity/oauth2/userinfo?schema=paypalv1.1',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            ]
        );
        $result = json_decode($response->getBody(), true);

        $data = ['name' => $result['name'], 'email' => $result['emails'][0]['value']];

        return view('paypal.paypal-success', compact("data")); 

    }
}