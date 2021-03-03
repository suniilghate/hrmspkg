<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{{ $user->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Short from Field -->
<div class="form-group">
    {!! Form::label('email', __('Email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Mobile -->
<div class="form-group">
    {!! Form::label('mobile', __('Mobile').':') !!}
    <p>{{ $user->mobile }}</p>
</div>

<!-- Department -->
<div class="form-group">
    {!! Form::label('department', __('Department').':') !!}
    <p>{{ __('NA') }}</p>
</div>

<!-- Designation -->
<div class="form-group">
    {!! Form::label('designation', __('Designation').':') !!}
    <p>{{ __('NA') }}</p>
</div>