@extends('hrms::layouts.package')
@section('title')
    {{ __('User Details') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('User Details') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('users.index') }}" class="btn btn-primary form-btn float-right">{{ __('Back') }}</a>
            </div>
        </div>
    @include('hrms::leaves.common_errors')
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('users/userdetails', $user_id) }}" method="post" id="createUserDetailsForm">
                        <div class="row">
                        @if (isset($user_details)) 
                            @include('hrms::users.edituserdetails_fields')
                        @else
                            @csrf
                            @include('hrms::users.userdetails_fields')    
                        @endif    
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

