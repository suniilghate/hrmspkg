<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Short form Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shortform', __('Shortfrom').':') !!}
    {!! Form::text('shortform', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description : ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Count -->
<div class="form-group col-sm-6">
    {!! Form::label('count', __('Count').':') !!}
    {!! Form::text('count', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaves.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>
