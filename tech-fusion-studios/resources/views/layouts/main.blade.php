<!DOCTYPE html>
<html>

<head>
	<title>Tech Fusion Studios @yield('title')</title>

	<!-- Meta/Favicons/Fonts Section ---------------------------------------------------------------------------------->
	<meta charset="utf-8">

	<meta name="description" content="Tech Fusion Studios is a team dedicated to all thing programming and IT.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="keywords" content="">
	<meta name="author" content="Tech Fusion Studios">

	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{ asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
	<link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
	<link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#663399">
	<meta name="theme-color" content="#663399">

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/fontawesome-pro-5.0.8/web-fonts-with-css/css/fa-brands.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/fontawesome-pro-5.0.8/web-fonts-with-css/css/fa-light.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/fontawesome-pro-5.0.8/web-fonts-with-css/css/fontawesome.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}"> @yield('css')
</head>

<body>
	@include('shared.navbar')

	<section id="slide-wrapper" class="slide-wrapper" style="background-color: #fff">
		<!---------- Header ---------->
		<section id="header" class="header container-fluid">
			<div class="row justify-content-center">
				<div class="col-auto">
					<a href="{{ route('home') }}">
						<img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="">
					</a>
				</div>
			</div>
			<p>A team dedicated to all things programming and IT.</p>
		</section>

		<!---------- Content ---------->
		<section id="content" class="content container-fluid">
			@yield('content')
		</section>

		<!---------- Contact ---------->
		<section id="contact" class="contact container-fluid">
			<div class="row justify-content-center">
				<div class="col-md text-center">
					<div class="section-heading text-center">
						<h2>Contact Us</h2>
						<hr>
					</div>
				</div>
			</div>

			<div class="row justify-content-around">
				<div class="col-md-8">
					<form class="parsley-validate" name="contact" action="{{ route('emails.contact') }}" method="post">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" name="name" type="text" placeholder="Name *" data-parsley-required>
									<div class="parsley-errors-container"></div>
								</div>

								<div class="form-group">
									<input class="form-control" name="email" type="text" placeholder="Email *" data-parsley-type="email" data-parsley-required>
									<div class="parsley-errors-container"></div>
								</div>

								<div class="form-group">
									<input class="form-control" name="reason" type="text" placeholder="Reason *" data-parsley-required>
									<div class="parsley-errors-container"></div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" name="msg" type="text" placeholder="Message *" data-parsley-required></textarea>
									<div class="parsley-errors-container"></div>
								</div>
							</div>
						</div>

						<div class="clearfix"></div>

						<div class="col-md-auto text-center">
							<input class="btn btn-xl" name="send" type="submit" value="Send Message" />
							<input class="btn btn-xl" name="reset" type="reset" value="Reset Fields" />
						</div>
					</form>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md">
					<div class="flexible-container">
						<iframe width="425" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=greenfield%20IN&key=AIzaSyBJCjmTpX4OSV9IpZIzrpIMnxhAWhE7-qQ"
							allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</section>

		@include('shared.footer')
	</section>

	<!-- Scripts ------------------------------------------------------------------------------------------------------>
	<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('lib/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('lib/parsleyjs/dist/parsley.min.js') }}"></script>
	<script src="{{ asset('lib/parsleyjs/dist/parsley.custom.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	@yield('js')
</body>

</html>