<li class="sidebar-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('dashboard.index') }}">
        <i class="align-middle" data-feather="home"></i> <span
            class="align-middle">Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('mentor.index') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentor.index') }}">
        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Mentor</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('mentee.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentee.index') }}">
        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Mentee</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('role.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('role.index') }}">
        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Role</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('division*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('division.index') }}">
        <i class="align-middle" data-feather="tool"></i> <span class="align-middle">Division</span>
    </a>
</li>