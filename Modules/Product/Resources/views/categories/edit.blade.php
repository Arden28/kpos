@extends('layouts.master')

@section('title', 'Edit Product Category')

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Edit Product Category') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection


@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product-categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label class="font-weight-bold" for="category_code">
                                        {{ __('Category Code') }}
                                        <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true"
                                         data-bs-content="<p>{{ __('A category code is used to identify and classify different types of products or items in an inventory management system. This makes it easier to find and manage these items by grouping them by category.') }}</p>
                                        <p class='mb-0'><a href=''>Generate a code</a></p>
                                        ">?</span><span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="category_code" required value="{{ $category->category_code }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="category_name">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name" required value="{{ $category->category_name }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }} <i class="bi bi-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

