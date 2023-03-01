<?php
namespace App\Repositories;

use App\Services\OtpServiceInterface;

class OtpRepository
{
    protected $otpService;

    public function __construct(OtpServiceInterface $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOtp(string $mobile): bool
    {
        return $this->otpService->sendOtp($mobile);
    }

    public function verifyOtp(string $mobile, string $otp): bool
    {
        return $this->otpService->verifyOtp($mobile, $otp);
    }
}
