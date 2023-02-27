@extends('layouts.error')


@section('title', trans('errors.title.419'))

@section('code', trans('errors.code.419'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', trans('errors.message.419'))
