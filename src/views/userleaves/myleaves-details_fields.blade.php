<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{{ $myLeaveDetails->id }}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', __('Start Date').':') !!}
    <p>{{ $myLeaveDetails->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', __('End Date').':') !!}
    <p>{{ $myLeaveDetails->end_date }}</p>
</div>

<!-- Reason Field -->
<div class="form-group">
    {!! Form::label('reason', __('Leave Reason').':') !!}
    <p>{{ $myLeaveDetails->reason }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status').':') !!}
    @if($myLeaveDetails->status == 1)
        <p>{{ __('Pending') }}</p>
    @elseif($myLeaveDetails->status == 2)
        <p>{{ __('Hold') }}</p>
    @elseif($myLeaveDetails->status == 3)
        <p>{{ __('Rejected') }}</p>
    @endif        
</div>

<!-- Approved By Field -->
<div class="form-group">
    {!! Form::label('approved_by', __('Approved By').':') !!}
        <p>{{ $myLeaveDetails->approved_by }}</p>    
</div>

<!-- Approved On Field -->
<div class="form-group">
    {!! Form::label('approved_on', __('Approved On').':') !!}
        <p>{{ $myLeaveDetails->approved_on }}</p>    
</div>

<!-- Rejected By Field -->
<div class="form-group">
    {!! Form::label('rejected_by', __('Rejected By').':') !!}
        <p>{{ $myLeaveDetails->rejected_by }}</p>    
</div>

<!-- Rejected On Field -->
<div class="form-group">
    {!! Form::label('rejected_on', __('Rejected On').':') !!}
        <p>{{ $myLeaveDetails->rejected_on }}</p>    
</div>

<!-- Created at Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created On').':') !!}
        <p>{{ $myLeaveDetails->created_at }}</p>    
</div>