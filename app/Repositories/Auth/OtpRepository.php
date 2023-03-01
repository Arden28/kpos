<?php

namespace App\Repositories\Auth;
use App\Interfaces\Auth\OtpInterface;
use Vonage\Client\Credentials\Basic;
use \Vonage\Client;
use Vonage\SMS\Message\SMS;

class OtpRepository implements OtpInterface{

    public function sendWelcomeOtp($phone){

        $basic = new Basic(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
        $client = new \Vonage\Client($basic);

        $response = $client->verify()->start([
            'number' => $phone,
            'brand' => env('VONAGE_BRAND_NAME'),
            'code_length' => 4,
        ]);

        return $response->getResponseData();
    }
}
