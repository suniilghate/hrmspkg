@extends('hrms::layouts.package')
@section('title')
     {{ __('Holidays') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Holidays') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('holidays.create')}}" class="btn btn-primary form-btn">{{ __('Add New') }}<i class="fas fa-plus"></i></a>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('hrms::holidays.table')
                </div>
            </div>
        </div>
    </section>
@endsection