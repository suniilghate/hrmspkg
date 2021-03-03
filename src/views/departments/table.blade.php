<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Shortform</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->shortform }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('departments.show', [$department->id]) !!}" class='btn btn-light action-btn '>View</a>
                        <a href="{!! route('departments.edit', [$department->id]) !!}" class='btn btn-warning action-btn edit-btn'>Edit</a>
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('Are you sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $departments->links() !!}
</div>

