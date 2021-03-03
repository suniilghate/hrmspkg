<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Shortform Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Shortform : ') !!}
    {!! Form::textarea('shortform', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description : ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaves.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>
