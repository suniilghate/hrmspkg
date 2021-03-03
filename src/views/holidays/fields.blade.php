<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description : ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', __('Start Date').':') !!}
    @php
        $stDate = 'null';
        if (isset($holiday->start_date)){
            $stDate = \Carbon\Carbon::parse($holiday->start_date);
        }
    @endphp 
    {!! Form::date('start_date', $stDate, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', __('End Date').':') !!}
    @php
        $edDate = 'null';
        if (isset($holiday->end_date)){
            $edDate = \Carbon\Carbon::parse($holiday->end_date);
        }
    @endphp
    {!! Form::date('end_date', $edDate, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })

        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaves.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>
