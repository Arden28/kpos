@extends('auth::layouts.master')

@section('page-title')
    {{ __('Verify your Phone Number') }}
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <h4 class="card-title">Verify Your Phone Number</h4>
                        @if (session('resent'))
                            <p class="alert alert-success" role="alert">A fresh number OTP has been sent to
                                your phone number</p>
                        @endif
                        <p class="card-text">Before proceeding, please check your sms for a verification OTP.If you
                            did not receive the sms,</p>
                        <a href="{{ route('verification.resend') }}">click here to request another</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
