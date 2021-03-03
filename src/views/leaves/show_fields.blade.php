<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{{ $leave->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name').':') !!}
    <p>{{ $leave->name }}</p>
</div>

<!-- Shortfrom Field -->
<div class="form-group">
    {!! Form::label('shortform', __('Shortform').':') !!}
    <p>{{ $leave->shortform }}</p>
</div>

<!-- Count Field -->
<div class="form-group">
    {!! Form::label('count', __('Count').':') !!}
    <p>{{ $leave->count }}</p>
</div>

<!-- Description -->
<div class="form-group">
    {!! Form::label('description', __('Description').':') !!}
    <p>{{ $leave->description }}</p>
</div>