@extends('layouts.error')

@section('code', '404 😵')

@section('title', __('Page Not Found'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_sign_in_e6hj.svg') }}" height="128" alt="">
@endsection

@section('message', __('Sorry, the page you are looking for could not be found.'))
