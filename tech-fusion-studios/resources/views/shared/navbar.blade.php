@section('css') @parent
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/navbar.css') }}"> @show

<!---------- Navbar Top ---------->
<section id="navbar-top" class="container-fluid">
	<div class="navbar-top navbar fixed-top" role="navigation">
		@if(session('alert-success'))
		<div class="navbar-alert">
			<div class="alert alert-success alert-dismissable fade show" role="alert">
				<button class="close" type="button" data-dismiss="alert" aria-label="Close">&times;</button>
				{{ session('alert-success') }}
			</div>
		</div>
		@endif @if(session('alert-danger'))
		<div class="navbar-alert">
			<div class="alert alert-danger alert-dismissable fade show" role="alert">
				<button class="close" type="button" data-dismiss="alert" aria-label="Close">&times;</button>
				{{ session('alert-danger') }}
			</div>
		</div>
		@elseif(count($errors) > 0)
		<div class="navbar-alert">
			<div class="alert alert-danger alert-dismissable fade show" role="alert">
				<button class="close" type="button" data-dismiss="alert" aria-label="Close">&times;</button>
				@foreach ($errors->all() as $error)
				<li class="">{{ $error }}</li>
				@endforeach
			</div>
		</div>
		@endif

		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a class="nav-link navbar-left-btn" title="Toggle Navigation">
					<i class="fal fa-bars" aria-hidden="true"></i>
				</a>
			</li>
		</ul>

		<ul class="nav justify-content-end">
			@if(Auth::guest())
			{{--  <li class="nav-item">
				<a class="nav-link" title="Login" data-toggle="modal" data-target=".login-modal">
					<i class="fal fa-sign-in" aria-hidden="true"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" title="Register" data-toggle="modal" data-target=".register-modal">
					<i class="fal fa-user-plus" aria-hidden="true"></i>
				</a>
			</li>  --}}

			<li class="nav-item">
				<a class="nav-link navbar-right-login-btn" title="Login">
					<i class="fal fa-sign-in" aria-hidden="true"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link navbar-right-register-btn" title="Register">
					<i class="fal fa-user-plus" aria-hidden="true"></i>
				</a>
			</li>

			@else @if (Auth::check() && (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Staff')))
			<li class="nav-item dropdown">
				<a id="dropdown-mail" class="nav-link dropdown-toggle" href="#" role="button" title="Mail" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<i class="fal fa-at" aria-hidden="true"></i>
				</a>
				<div class="dropdown-menu dropdown-mail" aria-labelledby="dropdown-mail">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-center" href="#">See All Mail</a>
				</div>
			</li>
			@endif
			<li class="nav-item dropdown">
				<a id="dropdown-messages" class="nav-link dropdown-toggle" href="#" role="button" title="Messages" data-toggle="dropdown"
				 aria-haspopup="true" aria-expanded="false">
					<i class="fal fa-comments" aria-hidden="true"></i>
				</a>
				<div class="dropdown-menu dropdown-messages" aria-labelledby="dropdown-messages">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-center" href="#">See All Messages</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a id="dropdown-users" class="nav-link dropdown-toggle" href="#" role="button" title="Users" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<i class="fal fa-users" aria-hidden="true"></i>
				</a>
				<div class="dropdown-menu dropdown-users" aria-labelledby="dropdown-users">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-center" href="#">See All Users</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a id="dropdown-notifications" class="nav-link dropdown-toggle" href="#" role="button" title="Notifications" data-toggle="dropdown"
				 aria-haspopup="true" aria-expanded="false">
					<i class="fal fa-bell" aria-hidden="true"></i>
				</a>
				<div class="dropdown-menu dropdown-notifications" aria-labelledby="dropdown-mail">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-center" href="#">See All Notifications</a>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="" title="Logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">
					<i class="fal fa-sign-out" aria-hidden="true"></i>
				</a>
			</li>
			@endif
		</ul>
	</div>
</section>

<!---------- Navbar Right ---------->
<section id="navbar-right-login" class="container">
	<div class="navbar-right-login fixed-top ml-auto" role="navigation">
		<form class="parsley-validate" name="login" action="{{ route('user.login') }}" method="post">
			{{ csrf_field() }}

			<div class="row justify-content-center">
				<h3>Login</h3>
			</div>
			
			<div class="col-sm-auto">
				<div class="form-group">
					<input class="form-control" name="email" type="email" placeholder="Email *" data-parsley-type="email" data-parsley-required>
					<div class="parsley-errors-container"></div>
				</div>

				<div class="form-group">
					<input class="form-control" name="password" type="password" placeholder="Password *" data-parsley-required>
					<div class="parsley-errors-container"></div>
				</div>

				<div class="form-group" hidden>
					<input class="form-control" name="route" type="password" placeholder="" value="{{ url()->current() }}">
				</div>

				<div class="clearfix"></div>

				<div class="row justify-content-center">
					<div class="form-group">
						<input class="btn btn-md" name="login" type="submit" value="Login">
						<input class="btn btn-md" data-toggle="modal" data-target=".forgot-password-modal" name="forgot-password" type="submit" onclick="event.preventDefault();"
							data-dismiss="modal" value="Forgot Password">
						<input class="btn btn-md navbar-right-login-btn reset-form-btn" name="cancel" type="button" value="Cancel">
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<section id="navbar-right-register" class="container">
	<div class="navbar-right-register fixed-top ml-auto" role="navigation">
		<form class="parsley-validate" name="register" action="{{ route('user.register') }}" method="post">
			{{ csrf_field() }}

			<div class="row justify-content-center">
				<h3>Register</h3>
			</div>

			<div class="col-sm-auto">
				
					<div class="form-group">
						<input class="form-control firstname" name="firstname" type="text" placeholder="First Name *" data-parsley-required>
						<div class="parsley-errors-container"></div>
					</div>

					<div class="form-group">
						<input class="form-control lastname" name="lastname" type="text" placeholder="Last Name *" data-parsley-required>
						<div class="parsley-errors-container"></div>
					</div>

					<div class="form-group" hidden>
						<input class="form-control fullname" name="fullname" type="text" placeholder="Full Name *">
					</div>
				

				
					<div class="form-group">
						<input class="form-control" name="email" type="email" placeholder="Email *" data-parsley-type="email" data-parsley-required>
						<div class="parsley-errors-container"></div>
					</div>

					<div class="form-group">
						<input class="form-control password" name="password" type="password" placeholder="Password *" data-parsley-required>
						<a class="btn password-toggle pull-right">
							<i class="fal fa-eye" aria-hidden="true"></i>
						</a>
						<div class="parsley-errors-container"></div>
					</div>

					<div class="form-group" hidden>
						<input class="form-control" name="route" type="password" placeholder="" value="{{ url()->current() }}">
					</div>
				

				<div class="clearfix"></div>

				<div class="row justify-content-center">
					<div class="form-group mx-auto">
						<input class="btn btn-md" name="register" type="submit" value="Register" />
						<input class="btn btn-md" name="reset" type="reset" value="Reset Fields" />
						<input class="btn btn-md navbar-right-register-btn reset-form-btn" name="cancel" type="button" value="Cancel" />
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<!---------- Navbar Left ---------->
<section id="navbar-left" class="container">
	<div class="navbar-left fixed-top" role="navigation">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('home') }}">
					<i class="fal fa-home" aria-hidden="true"></i>
					<p>Home</p>
				</a>
			</li>

			<li class="nav-item group">
				<a class="nav-link" href="{{ route('services') }}">
					<i class="fal fa-briefcase" aria-hidden="true"></i>
					<p>Services</p>
				</a>
				<a class="nav-link second-level-button">
					<i class="fal fa-caret-left" aria-hidden="true"></i>
				</a>
				<ul class="nav second-level">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('services.web') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Web Development</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('services.app') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>App Development</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('services.pc') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Build/Fix PCs</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('services.serverhosting') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Server Hosting</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('services.networking') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Networking</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('services.ethicalhacking') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Ehthical Hacking</p>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item group">
				<a class="nav-link" href="{{ route('about.us') }}">
					<i class="fal fa-info-circle" aria-hidden="true"></i>
					<p>About</p>
				</a>
				<a class="nav-link second-level-button">
					<i class="fal fa-caret-left" aria-hidden="true"></i>
				</a>
				<ul class="nav second-level">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('about.us') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>About Us</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('about.team') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>About Team</p>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="#contact">
					<i class="fal fa-paper-plane" aria-hidden="true"></i>
					<p>Contact</p>
				</a>
			</li>

			@if (!Auth::guest())
			<li class="nav-item group">
				<a class="nav-link" href="{{ route('profile') }}">
					<i class="fal fa-user" aria-hidden="true"></i>
					<p>Profile</p>
				</a>
				<a class="nav-link second-level-button">
					<i class="fal fa-caret-left" aria-hidden="true"></i>
				</a>
				<ul class="nav second-level">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('profile.users') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Users</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('profile.stream') }}">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Stream</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Logout</p>
						</a>
					</li>
				</ul>
			</li>
			@endif

			<li class="nav-item group">
				<a class="nav-link" href="{{ route('forums') }}">
					<i class="fal fa-pencil" aria-hidden="true"></i>
					<p>Forums</p>
				</a>
				<a class="nav-link second-level-button">
					<i class="fal fa-caret-left" aria-hidden="true"></i>
				</a>
				<ul class="nav second-level">
					<li class="nav-item group">
						<a class="nav-link" href="">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Tech Fusion Studios</p>
						</a>
						<a class="nav-link third-level-button">
							<i class="fal fa-caret-left" aria-hidden="true"></i>
						</a>
						<ul class="nav third-level">
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>News Discussions</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>Update Discussions</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>Project Discussions</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>Random Discussions</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item group">
						<a class="nav-link" href="">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>Need Help</p>
						</a>
						<a class="nav-link third-level-button">
							<i class="fal fa-caret-left" aria-hidden="true"></i>
						</a>
						<ul class="nav third-level">
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>Website Discussions</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>PC Discussions</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>Server Discussions</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>Network Discussions</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item group">
						<a class="nav-link" href="">
							<i class="fal fa-circle" aria-hidden="true"></i>
							<p>General</p>
						</a>
						<a class="nav-link third-level-button">
							<i class="fal fa-caret-left" aria-hidden="true"></i>
						</a>
						<ul class="nav third-level">
							<li class="nav-item">
								<a class="nav-link" href="">
									<i class="fal fa-circle" aria-hidden="true"></i>
									<p>General Discussions</p>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ route('store') }}">
					<i class="fal fa-shopping-cart fa-fw"></i>
					<p>Store</p>
				</a>
			</li>

			@if (Auth::check() && (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Staff')))
			<li class="nav-item">
				<a class="nav-link" href="{{ route('mail') }}">
					<i class="fal fa-at" aria-hidden="true"></i>
					<p>Mail</p>
				</a>
			</li>
			@endif
		</ul>

	</div>
</section>

<!---------- Hidden Forms for Navbars ---------->
<section id="hidden-forms">
	<form id="logout" name="logout" action="{{ route('user.logout') }}" method="post" hidden>
		{{ csrf_field() }}
	</form>
</section>

<!---------- Login Modal ---------->
<section id="login-modal" class="container">
	<div class="login-modal modal fade" role="dialog" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Login</h3>
				</div>

				<div class="modal-body">
					<form class="parsley-validate" name="login" action="{{ route('user.login') }}" method="post">
						{{ csrf_field() }}

						<div class="col-sm-auto">
							<div class="form-group">
								<input class="form-control" name="email" type="email" placeholder="Email *" data-parsley-type="email" data-parsley-required>
								<div class="parsley-errors-container"></div>
							</div>

							<div class="form-group">
								<input class="form-control" name="password" type="password" placeholder="Password *" data-parsley-required>
								<div class="parsley-errors-container"></div>
							</div>

							<div class="form-group" hidden>
								<input class="form-control" name="route" type="password" placeholder="" value="{{ url()->current() }}">
							</div>

							<div class="clearfix"></div>

							<div class="form-group">
								<input class="btn btn-md" name="login" type="submit" value="Login">
								<input class="btn btn-md" data-toggle="modal" data-target=".forgot-password-modal" name="forgot-password" type="submit" onclick="event.preventDefault();"
								 data-dismiss="modal" value="Forgot Password">
								<input class="btn btn-md" name="cancel" type="submit" value="Cancel" data-dismiss="modal">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!---------- Forgot Password Modal ---------->
<section id="forgot-password-modal" class="container">
	<div class="forgot-password-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="forgot-password-modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Forgot Password</h3>
				</div>

				<div class="modal-body">
					<form class="parsley-validate" name="forgot-password" action="{{ route('user.forgot') }}" method="post">
						{{ csrf_field() }}

						<div class="col-sm-auto">
							<div class="form-group">
								<input class="form-control" name="email" type="email" placeholder="Email *" data-parsley-type="email" data-parsley-required>
								<div class="parsley-errors-container"></div>
							</div>

							<div class="form-group" hidden>
								<input class="form-control" name="route" type="password" placeholder="" value="{{ url()->current() }}">
							</div>

							<div class="clearfix"></div>

							<div class="form-group">
								<input class="btn btn-md" name="forgot-password" type="submit" value="Send">
								<input class="btn btn-md" name="cancel" type="submit" value="Cancel" data-dismiss="modal">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!---------- Register Modal ---------->
<section id="register-modal" class="container">
	<div class="register-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="register-modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Register</h3>
				</div>

				<div class="modal-body">
					<form class="parsley-validate" name="register" action="{{ route('user.register') }}" method="post">
						{{ csrf_field() }}

						<div class="col-sm-auto">
							<div class="row">
								<div class="col-sm-6 form-group">
									<input class="form-control firstname" name="firstname" type="text" placeholder="First Name *" data-parsley-required>
									<div class="parsley-errors-container"></div>
								</div>

								<div class="col-sm-6 form-group">
									<input class="form-control lastname" name="lastname" type="text" placeholder="Last Name *" data-parsley-required>
									<div class="parsley-errors-container"></div>
								</div>

								<div class="col-sm-6 form-group" hidden>
									<input class="form-control fullname" name="fullname" type="text" placeholder="Full Name *">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6 form-group">
									<input class="form-control" name="email" type="email" placeholder="Email *" data-parsley-type="email" data-parsley-required>
									<div class="parsley-errors-container"></div>
								</div>

								<div class="col-sm-6 form-group">
									<input class="form-control password" name="password" type="password" placeholder="Password *" data-parsley-required>
									<a class="btn password-toggle pull-right">
										<i class="fal fa-eye" aria-hidden="true"></i>
									</a>
									<div class="parsley-errors-container"></div>
								</div>

								<div class="col-sm-6 form-group" hidden>
									<input class="form-control" name="route" type="password" placeholder="" value="{{ url()->current() }}">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="form-group">
								<input class="btn btn-md" name="register" type="submit" value="Register" />
								<input class="btn btn-md" name="reset" type="reset" value="Reset Fields" />
								<input class="btn btn-md" name="cancel" type="submit" data-dismiss="modal" value="Cancel" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!---------- Reset Password Modal ---------->
<section id="reset-password-modal" class="container">
	<div class="row">
		<div class="reset-password-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="reset-password-modal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Reset Password</h3>
					</div>

					<div class="modal-body">
						<div class="row justify-content-center">
							<form class="parsley-validate" name="reset-password" action="{{ route('user.reset') }}" method="post">
								{{ csrf_field() }}

								<div class="col-sm-auto">
									<div class="input-group">
										<input class="form-control password" name="password" type="password" placeholder="Password *" data-parsley-required>
										<span class="input-group-btn">
											<a class="btn password-toggle">
												<i class="fal fa-eye" aria-hidden="true"></i>
											</a>
										</span>
										<div class="parsley-errors-container"></div>
									</div>

									<div class="form-group" hidden>
										<input class="form-control" name="route" type="password" placeholder="" value="{{ url()->current() }}">
									</div>

									<div class="clearfix"></div>

									<div class="form-group">
										<input class="btn btn-md" name="forgot-password" type="submit" value="Send">
										<input class="btn btn-md" name="cancel" type="submit" value="Cancel" data-dismiss="modal">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@section('js') @parent
<script src="{{ asset('js/navbar.js') }}"></script>
@show