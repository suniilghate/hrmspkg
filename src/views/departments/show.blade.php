@extends('hrms::layouts.package')
@section('title')
    {{ __('Department Details') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Department Details') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('departments.index') }}" class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
            </div>
        </div>
    @include('hrms::leaves.common_errors')
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('hrms::departments.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection

