@extends('layouts.error')

@section('code', '403 🤐')

@section('title', __('Application Manquante'))

@section('image')
    <img src="{{ asset('images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __("Désolé. Le module ".$module->name." n'est pas installé pour votre entreprise"))
