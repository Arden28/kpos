@extends('layouts.error')

@section('code', '419 👾')

@section('title', __('Page Expired'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __('Maybe, the CSRF token is missing.'))
