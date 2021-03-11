<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>No of days</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pendingLeaves as $leaveData)
            <tr>
                <td>{{ $leaveData->name }}</td>
                <td>{{ $leaveData->no_of_days }}</td>
                <td>{{ $leaveData->start_date }}</td>
                <td>{{ $leaveData->end_date }}</td>
                <td class=" text-center">
                    <div class='btn-group'><a href="{!! url('userleaves/approve', [$leaveData->leave_id]) !!}" class='btn btn-light action-btn '>Approve</a> | <a href="{!! url('userleaves/reject', [$leaveData->leave_id]) !!}" class='btn btn-light action-btn '>Reject</a></div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

