<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <title>Daily Activity</title>
    @include('partials.styles')
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        <div class="main">
            <main class="content">
                <div class="container-fluid p-0">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Home') }}</div>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        Hi, <b>{{ Auth::user()->name }}</b> <br />
                                        {{ __('You are logged in!') }}
                                        <br/> <br/>
                                        @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'Admin')
                                            <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-outline-secondary">Back to Dashboard</a>
                                        @elseif (Auth::user()->role->name == 'mentor' || Auth::user()->role->name == 'Mentor')
                                            <a href="{{ route('mentor.dashboard') }}" class="btn btn-sm btn-outline-secondary">Back to Dashboard</a>
                                        @elseif (Auth::user()->role->name == 'mentee' || Auth::user()->role->name == 'Mentee')
                                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary">Back to Dashboard</a>
                                        @endif
                                        <br /><br />
                                        <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                            out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('partials.scripts')
    @stack('scripts')
</body>

</html>