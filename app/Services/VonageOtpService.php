<?php
namespace App\Services;

use Vonage\Client\Credentials\Basic;
use Vonage\Client;
use Vonage\SMS\Message\SMS;
use Ferdous\OtpValidator\Object\OtpRequestObject;
use Ferdous\OtpValidator\OtpValidator;
use Ferdous\OtpValidator\Object\OtpValidateRequestObject;

class VonageOtpService implements OtpServiceInterface
{
    public function sendOtp(string $mobile): bool
    {
        $otp = OtpValidator::generate($mobile);

        $basic = new Basic(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
        $client = new Client($basic);
        $response = $client->sms()->send(
            new SMS(env('VONAGE_BRAND_NAME'), $mobile, "Your OTP for registration is: $otp")
        );

        return $response->getStatusCode() == 202;
    }

    public function verifyOtp(string $mobile, string $otp): bool
    {
        return OtpValidator::check($mobile, $otp);
    }
}
