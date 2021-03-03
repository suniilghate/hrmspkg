@extends('hrms::layouts.package')
@section('title')
    {{ __('Department Edit') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Department Edit') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('departments.index') }}"  class="btn btn-primary">{{ __('Back')}}</a>
            </div>
        </div>
        <div class="content">
            @include('hrms::leaves.common_errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::model($department, ['route' => ['departments.update', $department->id], 'method' => 'patch']) !!}
                                <div class="row">
                                    @include('hrms::departments.fields')
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
