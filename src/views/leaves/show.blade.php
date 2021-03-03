@extends('hrms::layouts.package')
@section('title')
    {{ __('Leave Details') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Leave Details') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('leaves.index') }}" class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
            </div>
        </div>
    @include('hrms::leaves.common_errors')
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('hrms::leaves.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection

