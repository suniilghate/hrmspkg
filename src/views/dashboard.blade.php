@extends('hrms::layouts.package')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Leaves Management  </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('leaves.index') }}"> Leaves </a></li>
                            <li><a class="dropdown-item" href="{{ route('holidays.index') }}"> Holidays </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Users Management  </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('users.index') }}"> Users </a></li>
                            <li><a class="dropdown-item" href="{{ route('departments.index') }}"> User Department </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Notifications </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Search </a> </li>
                    </ul>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
