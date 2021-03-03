@extends('hrms::layouts.package')
@section('title')
    {{ __('User Edit') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('User Edit') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('users.index') }}"  class="btn btn-primary">{{ __('Back')}}</a>
            </div>
        </div>
        <div class="content">
            @include('hrms::leaves.common_errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                                <div class="row">
                                    @include('hrms::users.fields')
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
