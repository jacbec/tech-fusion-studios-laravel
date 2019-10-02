@extends('layouts.main') @section('content')
	<div class="row justify-content-center">
		<div class="col-md-4 text-center section-heading">
			<h2 >Services</h2>
			<hr>
		</div>
	</div>

	<div class="row no-gutters justify-content-center">
		<div class="col-xl text-center">
			<a href="{{ route('services.web') }}">
				<div class="box">
					<i class="fal fa-browser fa-5x"></i>
					<h3>Web Development</h3>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
				</div>
			</a>
		</div>

		<div class="col-xl text-center">
			<a href="{{ route('services.app') }}">
				<div class="box">
					<i class="fal fa-code fa-5x"></i>
					<h3>Application Development</h3>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
				</div>
			</a>
		</div>

		<div class="col-xl text-center">
			<a href="{{ route('services.pc') }}">
				<div class="box">
					<i class="fal fa-desktop fa-5x"></i>
					<h3>Build/Fix PC</h3>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
				</div>
			</a>
		</div>
	</div>

	<div class="row no-gutters justify-content-center">
		<div class="col-xl text-center">
			<a href="{{ route('services.serverhosting') }}">
				<div class="box">
					<i class="fal fa-server fa-5x"></i>
					<h3>Server Hosting</h3>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
				</div>
			</a>
		</div>

		<div class="col-xl text-center">
			<a href="{{ route('services.networking') }}">
				<div class="box">
					<i class="fal fa-sitemap fa-5x"></i>
					<h3>Networking</h3>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
				</div>
			</a>
		</div>

		<div class="col-xl text-center">
			<a href="{{ route('services.ethicalhacking') }}">
				<div class="box">
					<i class="fal fa-user-secret fa-5x"></i>
					<h3>Ethical Hacking</h3>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
				</div>
			</a>
		</div>
	</div>
@endsection

@section('js') @parent
{{--  <script src="{{ asset('js/direction-aware.js') }}"></script>  --}}
@show