<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Shortform</th>
                <th>Count</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->name }}</td>
                <td>{{ $leave->shortform }}</td>
                <td>{{ $leave->count }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['leaves.destroy', $leave->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('leaves.show', [$leave->id]) !!}" class='btn btn-light action-btn '>View</a>
                        <a href="{!! route('leaves.edit', [$leave->id]) !!}" class='btn btn-warning action-btn edit-btn'>Edit</a>
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('Are you sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $leaves->links() !!}
</div>

