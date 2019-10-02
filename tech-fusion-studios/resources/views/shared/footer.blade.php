@section('css') @parent
<style>
	/********** FooterStyling **********/

	.footer {
		text-align: center;
		font-size: 0.8125em;
		padding: 1.5625em 0;
		background-color: #fff;
	}

	.footer .copyright {
		line-height: 2.5em;
	}

	.footer .social-buttons a {
		display: inline-block;
		font-size: 1.25em;
		color: #fff;
		line-height: 2.5em;
		outline: 0;
		width: 2.5em;
		height: 2.5em;
		border-radius: 100%;
		background-color: #000;
		-webkit-transition: all .75s;
		-moz-transition: all .75s;
		transition: all .75s;
	}

	.footer .social-buttons a:hover {
		background-color: #663399;
	}

	.footer .quicklinks {
		line-height: 2.5em;
	}
</style>
@show

<!---------- Footer ---------->
<section id="footer" class="footer container-fluid col-12">
	<div class="row justify-content-center">
		<div class="col-4 copyright">
			Copyright &copy; Tech Fusion Studios 2015
		</div>
		<div class="col-4 social-buttons">
			<a href="#">
				<i class="fab fa-twitter"></i>
			</a>
			<a href="https://www.facebook.com/techfusionstudios/">
				<i class="fab fa-facebook-f"></i>
			</a>
			<a href="#">
				<i class="fab fa-linkedin-in"></i>
			</a>
		</div>
		<div class="col-4 quicklinks">
			<a href="#">Privacy Policy</a>
			<a href="#">Terms of Use</a>
		</div>
</section>