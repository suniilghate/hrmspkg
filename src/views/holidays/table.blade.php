<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($holidays as $holiday)
            <tr>
                <td>{{ $holiday->id }}</td>
                <td>{{ $holiday->name }}</td>
                <td>{{ $holiday->start_date }}</td>
                <td>{{ $holiday->end_date }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['holidays.destroy', $holiday->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('holidays.show', [$holiday->id]) !!}" class='btn btn-light action-btn '>View</a>
                        <a href="{!! route('holidays.edit', [$holiday->id]) !!}" class='btn btn-warning action-btn edit-btn'>Edit</a>
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('Are you sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $holidays->links() !!}
</div>

