<li class="sidebar-item {{ request()->routeIs('mentor.dashboard') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentor.dashboard') }}">
        <i class="align-middle" data-feather="home"></i> <span
            class="align-middle">Dashboard</span>
    </a>
</li>
<li class="sidebar-item {{ request()->routeIs('mentee.*') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('mentee.index') }}">
        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Mentee</span>
    </a>