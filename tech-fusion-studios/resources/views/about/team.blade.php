@extends('layouts.main')

@section('title', '| About the Team')

@section('stylesheet')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/timeline-style.min.css') }}">
@endsection

@section('content')
    <section id="about" cclass="services col-12">
	<div class="row justify-content-center">
		<div class="col-md-4 text-center section-heading">
			<h2>About Us</h2>
			<hr>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-10 text-center">
			<ul class="timeline">
				<li class="timeline-inverted">
					<div class="timeline-image">
						<img class="rounded-circle img-fluid" src="{{ asset('img/founder.jpg') }}">
					</div>
					<div class="timeline-panel">
						<h4>Founder</h4>
						<hr>
						<div class="timeline-body">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
						</div>
					</div>
				</li>

				<!--<li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Be Part
                            <br>Of Our
                            <br>Story!</h4>
                        </div>
                    </li>-->
			</ul>
		</div>
	</div>
    </section>
@endsection