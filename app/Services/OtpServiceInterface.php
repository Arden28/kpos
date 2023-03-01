<?php
namespace App\Services;

interface OtpServiceInterface
{
    public function sendOtp(string $mobile): bool;

    public function verifyOtp(string $mobile, string $otp): bool;
}
