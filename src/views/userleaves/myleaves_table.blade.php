<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Created On</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($myLeaves as $myLeave)
            <tr>
                <td>{{ $myLeave->id }}</td>
                <td>{{ $myLeave->start_date }}</td>
                <td>{{ $myLeave->end_date }}</td>
                <td>
                    @if($myLeave->status == 1)
                        {{ __('Pending') }}
                    @elseif($myLeave->status == 2)
                        {{ __('Hold') }}
                    @elseif($myLeave->status == 3)
                        {{ __('Rejected') }}
                    @endif            
                </td>
                <td>{{ $myLeave->created_at }}</td>
                <td class=" text-center">
                    <div class='btn-group'>
                        <a href="{!! url('userleaves/myleaves-details', [$myLeave->id]) !!}" class='btn btn-light action-btn '>View</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $myLeaves->links() !!}
</div>

