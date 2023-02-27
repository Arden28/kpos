@extends('layouts.error')


@section('title', trans('errors.title.500'))

@section('code', trans('errors.code.500'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', trans('errors.message.500'))
