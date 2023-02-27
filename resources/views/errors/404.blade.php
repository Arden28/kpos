@extends('layouts.error')


@section('title', trans('errors.title.404'))

@section('code', trans('errors.code.404'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_sign_in_e6hj.svg') }}" height="128" alt="">
@endsection

@section('message', trans('errors.message.404'))
