@extends('frontend.include.header')

@section('page-title')
404
@endsection


@push('user_dashboard_style')
<link rel="stylesheet" href="{!! asset('frontend/css/details.css') !!}">
@endpush

@section('content')


<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center" style="padding:60px 0px;">
                <span class="display-1 d-block" style="color:red;font-size:160px;font-width:bold;">404</span>
                <div class="mb-4 lead">Oops! We can't seem to find the page you are looking for.</div>
            </div>
        </div>
    </div>
</div>
@endsection
