<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Leaves Management  </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('leaves.index') }}"> Leaves </a></li>
        <li><a class="dropdown-item" href="{{ route('holidays.index') }}"> Holidays </a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Users Management  </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('users.index') }}"> Users </a></li>
        <li><a class="dropdown-item" href="{{ route('departments.index') }}"> User Department </a></li>
        <li><a class="dropdown-item" href="{{ url('userleaves/create') }}"> User Leave Request </a></li>
        <li><a class="dropdown-item" href="{{ url('userleaves/myleaves') }}"> My Leave Request </a></li>
        <li><a class="dropdown-item" href="{{ url('userleaves/balance-leaves') }}"> My Balance Leaves </a></li>
        <li><a class="dropdown-item" href="{{ url('userleaves/pendingleaves') }}"> Latest Leave Requests </a></li>

        </ul>
    </li>
    <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Notifications </a> </li>
    <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Search </a> </li>
</ul>