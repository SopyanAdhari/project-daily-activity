<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Daily Activity</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">

            </li>
            @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'Admin')
            @include('partials.sidebar-role.sidebar-admin')
            @endif

            @if (Auth::user()->role->name == 'mentor' || Auth::user()->role->name == 'Mentor')
            @include('partials.sidebar-role.sidebar-mentor')
            @endif

            @if (Auth::user()->role->name == 'mentee' || Auth::user()->role->name == 'Mentee')
            @include('partials.sidebar-role.sidebar-mentee')
            @endif
        </ul>
    </div>
</nav>