<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{{ $holiday->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name').':') !!}
    <p>{{ $holiday->name }}</p>
</div>

<!-- Description -->
<div class="form-group">
    {!! Form::label('description', __('Description').':') !!}
    <p>{{ $holiday->description }}</p>
</div>

<!-- Start Date -->
<div class="form-group">
    {!! Form::label('start_date', __('Start Date').':') !!}
    <p>{{ $holiday->start_date }}</p>
</div>

<!-- End Date -->
<div class="form-group">
    {!! Form::label('end_date', __('End Date').':') !!}
    <p>{{ $holiday->end_date }}</p>
</div>