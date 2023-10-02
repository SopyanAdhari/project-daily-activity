<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/andifa-logo2.png') }}" />
    <title>Login - Absensi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- Styles --}}

    {{-- <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    {{-- Vite --}}
</head>

<body style="background-color: hsl(0, 0%, 96%)">
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" >
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="my-5 display-3 fw-bold ls-tight">
                            Daily Sync <br />
                            <span class="text-primary">Information System</span>
                        </div>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            A Daily Sync Application is a vital tool for teams seeking seamless collaboration and efficient task management. This specialized application streamlines daily operations by allowing team members to provide concise reports on their planned activities for the day. With this app, teams can effortlessly share progress updates, upcoming tasks, and any challenges they anticipate encountering. 
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body py-5 px-md-5">
                               @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
</body>

</html>
