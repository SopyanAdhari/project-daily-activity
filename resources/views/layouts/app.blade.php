<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preeconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png">
	<title>Daily Activity</title>
	@include('partials.styles')
	@stack('styles')
</head>
<body>
	<div class="wrapper">
		@include('partials.sidebar')
		<div class="main">
			@include('partials.navbar')
		<div class="content">
				<div class="container-fluid p-0">

					@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error )
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
					@endif

					@yield('content')
				</div>
		</div>
		</div>
	</div>

	@include('sweetalert::alert')


	@include('partials.scripts')
	@stack('scripts')
	
</body>
</html>