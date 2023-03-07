@extends('layouts.connect')

@section('title', __('Edit your Company'))

@section('content')
    <form action="{{ route('companies.connect.update') }}" method="POST">
        @csrf
        @method('patch')
            <div class="card" style="text-align: center;">
                <img src="img_avatar.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <select name="company_id" id="" class="form-control">
                        <option value="">Select the company you want log in!</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="form-class" value="">Me connecter</button>
                </div>
            </div>
    </form>
@endsection
