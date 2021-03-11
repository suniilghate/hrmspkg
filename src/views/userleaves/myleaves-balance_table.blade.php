<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Leave Type</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
        @foreach($myLeavesBalance as $myBalance)
            <tr>
                <td>{{ $myBalance->shortform }}</td>
                <td>{{ $myBalance->total_balance }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

