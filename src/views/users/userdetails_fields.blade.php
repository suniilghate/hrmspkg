<!-- Designation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation', __('Designation').':') !!}
    {!! Form::text('designation', null, ['class' => 'form-control']) !!}
</div>

<!-- Joining Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_joining', __('Date of Joining').':') !!}
    @php
        $stDate = 'null';
        if (isset($user_details->date_of_joining)){
            $stDate = \Carbon\Carbon::parse($user_details->date_of_joining);
        }
    @endphp 
    {!! Form::date('date_of_joining', $stDate, ['class' => 'form-control','id'=>'date_of_joining']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_exist', __('Date of Exist').':') !!}
    @php
        $edDate = 'null';
        if (isset($user_details->date_of_exist)){
            $edDate = \Carbon\Carbon::parse($user_details->date_of_exist);
        }
    @endphp
    {!! Form::date('date_of_exist', $edDate, ['class' => 'form-control','id'=>'date_of_exist']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_of_joining').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })

        $('#date_of_exist').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Address Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Address : ') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', __('City').':') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', __('State').':') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', __('Country').':') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Reporting Teamleader Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Reporting Teamleader') !!}
    @php 
        $userLeaderFld = 'null';
        if (isset($userLeader)) 
            $userLeaderFld = $userLeader;
    @endphp
    {!! Form::select('reporting_teamleader', $leaders, $userLeaderFld, array('class' => 'form-control')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>