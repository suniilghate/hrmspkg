<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('Email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', __('Mobile').':') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('Password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirm Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Confirm Password') !!}
    {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Department') !!}
    @php 
        $userDepartmentFld = 'null';
        if (isset($userDepartment)) 
            $userDepartmentFld = $userDepartment;
    @endphp
    {!! Form::select('department', $departments, $userDepartmentFld, array('class' => 'form-control')) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>
