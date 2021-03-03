@extends('hrms::layouts.package')
@section('title')
    {{ __('Add New Holidays') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">{{ __('Add New Holidays') }}</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-start">
                <a href="{{ route('holidays.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
            </div>
        </div>
        <div class="content">
        @include('hrms::leaves.common_errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                           {!! Form::open(['route' => 'holidays.store', 'method' => 'post','id'=>'createHolidayForm']) !!}
                                <div class="row">
                                    @csrf
                                    @include('hrms::holidays.fields')
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

