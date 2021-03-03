@extends('hrms::layouts.package')
@section('title')
    {{ __('Add New Leave Request') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Add New Leave Request') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-start">
                <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
            </div>
        </div>
        <div class="content">
        @include('hrms::leaves.common_errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                           <form action="{{ url('userleaves/save') }}" method="post" id="createUserLeaveRequestForm">
                                <div class="row">
                                    @csrf
                                    @include('hrms::userleaves.fields')
                                </div>
                           </form>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection

