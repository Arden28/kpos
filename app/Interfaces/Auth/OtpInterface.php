<?php
namespace App\Interfaces\Auth;

interface OtpInterface{

    public function sendWelcomeOtp($mobile);
}
