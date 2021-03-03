<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Department</th>
                <th>Designation</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->department }}</td>
                <td>{{ __('NA') }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ url('users/details', $user->id) }}" class='btn btn-light action-btn '>User Details</a>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-light action-btn '>View</a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-warning action-btn edit-btn'>Edit</a>
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('Are you sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $users->links() !!}
</div>

