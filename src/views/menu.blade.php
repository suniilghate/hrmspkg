<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Leaves Management  </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('leaves.index') }}"> Leaves </a></li>
        <li><a class="dropdown-item" href="{{ route('leaves.index') }}"> Holidays </a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Users Management  </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('users.index') }}"> Users </a></li>
        </ul>
    </li>
    <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Notifications </a> </li>
    <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Search </a> </li>
</ul>
