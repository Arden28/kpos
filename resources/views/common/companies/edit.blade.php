@extends('layouts.master')

@section('title', __('Edit your Company'))
@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('My Company :') }} {{ $company->company_name }}
        </h2>
    </div>
    </div>
</div>
</div>

@endsection

@section('content')
    <!-- Page body -->
    <div class="page-body">

    </div>
@endsection
