@extends('layouts.error')

@section('code', '403 🤐')

@section('title', __('Unauthorized'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __("Sorry, you don't have the permission to visit this page."))
