<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', __('Start Date').':') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', __('End Date').':') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
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

<!-- Reason Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Reason : ') !!}
    {!! Form::textarea('reason', null, ['class' => 'form-control']) !!}
</div>

<!-- Metadata Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Leave Types : ') !!}

    <!-- Repeater Html Start -->
    <div id="metadataRepeater">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Leave Type</th>
                    <th>Count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody data-repeater-list="leaveData">
                <tr data-repeater-item>
                    <td>
                        {!! Form::select('leave_type', $leaves, null, array('class' => 'form-control')) !!}
                    </td>
                    <td>
                        <input class="form-control" type="text" name="leave_type_count" placeholder="Leave Count" />
                    </td>
                    <td>
                        <input class="btn btn-danger" data-repeater-delete type="button" value="Delete"/>
                    <td>
                </tr>
            </tbody>
        </table>
        <button type="button" data-repeater-create class="btn btn-success">Add New</button>
    </div>
    <!-- Repeater End -->
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaves.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
</div>

@push("custom_scripts")
    <script>
        /* Create Repeater for Leave Types */
        var jqMetadataRepeater=jQuery('#metadataRepeater').repeater();
    </script>
@endpush