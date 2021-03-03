<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{{ $department->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name').':') !!}
    <p>{{ $department->name }}</p>
</div>

<!-- Short from Field -->
<div class="form-group">
    {!! Form::label('shortform', __('Shortfrom').':') !!}
    <p>{{ $department->shortform }}</p>
</div>

<!-- Description -->
<div class="form-group">
    {!! Form::label('description', __('Description').':') !!}
    <p>{{ $department->description }}</p>
</div>