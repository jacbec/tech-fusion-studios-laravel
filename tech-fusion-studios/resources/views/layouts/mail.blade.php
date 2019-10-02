<!DOCTYPE html>
<html>
<head>
    <title>Tech Fusion Mail @yield('title')</title>

    <!---------- Meta/Favicons/Fonts Section ---------->
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">

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
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/mail.css') }}">
    @yield('stylesheet')
</head>
<body>
    <!---------- Top Top Navbar ---------->
    <section id="top-navbar-top" class="container-fluid">
        <div class="row">
            <div class="top-navbar-top navbar navbar-default navbar-fixed-top" role="navigation">
                @if(session('alert-success'))
                    <div class="navbar-alert">
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">&times;</button>
                            {{ session('alert-success') }}
                        </div>
                    </div>
                @endif

                @if(session('alert-danger'))
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

                <div class="navbar-header pull-left">
                    <a class="navbar-brand sidebar-slide"><i class="fal fa-bars" aria-hidden="true"></i></a>
                </div>

                <div class="navbar-header pull-right">
                        <span class="dropdown">
                            <a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-envelope" aria-hidden="true"></i>  <i class="fal fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu dropdown-messages">
                                {{--<li><a href="#">
                                    <div>
                                        <strong></strong><span class="pull-right text-muted"><em></em></span>
                                    </div>
                                    <div></div>
                                </a></li>--}}

                                <li><a class="text-center" href="#">Read All Messages</a></li>
                            </ul>
                        </span>

                    <span class="dropdown">
                            <a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-tasks" aria-hidden="true"></i>  <i class="fal fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu dropdown-tasks">
                                {{--<li><a href="#">
                                    <div>
                                        <p><strong></strong><span class="pull-right text-muted"></span></p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>
                                    </div>
                                </a></li>--}}

                                <li><a class="text-center" href="#">See All Tasks</a></li>
                            </ul>
                        </span>

                    <span class="dropdown">
                            <a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-bell" aria-hidden="true"></i>  <i class="fal fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu dropdown-notifications">
                                    {{--<li><a href="#">
                                        <div><i class="fa-fw"></i><span class="pull-right text-muted small"></span></div>
                                    </a></li>--}}

                                <li><a class="text-center" href="#">See All Notifications</a></li>
                            </ul>
                        </span>

                    <a class="navbar-brand" href="" title="Logout" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="fal fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!---------- Top Top Navbar ---------->
    <section id="navbar-top" class="container-fluid">
        <div class="row">
            <div class="navbar-top navbar navbar-default navbar-fixed-top" role="navigation">
                <ul class="navbar-header">
                    <li><a class="navbar-brand" href="{{ route('home') }}"><i class="fal fa-home" aria-hidden="true"></i> Home</a></li>

                    <li class="group">
                        <a class="navbar-brand" href="{{ route('services') }}"><i class="fal fa-briefcase" aria-hidden="true"></i> Services</a>
                        {{--<a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-caret-down" aria-hidden="true"></i></a>--}}
                        <ul class="second-level dropdown-menu services-dropdown-menu">
                            <li><a href="{{ route('services.web') }}">Web Development</a></li>
                            <li><a href="{{ route('services.app') }}">App Development</a></li>
                            <li><a href="{{ route('services.pc') }}">Build PCs</a></li>
                            <li><a href="{{ route('services.fixpc') }}">Fix PCs</a></li>
                            <li><a href="{{ route('services.serverhosting') }}">Server Hosting</a></li>
                            <li><a href="{{ route('services.networking') }}">Networking</a></li>
                            <li><a href="{{ route('services.ethicalhacking') }}">Ehthical Hacking</a></li>
                        </ul>
                    </li>

                    <li class="group">
                        <a class="navbar-brand" href="{{ route('about.us') }}"><i class="fal fa-info-circle" aria-hidden="true"></i> About</a>
                        {{--<a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-caret-down" aria-hidden="true"></i></a>--}}
                        <ul class="second-level dropdown-menu about-dropdown-menu">
                            <li><a href="{{ route('about.us') }}">About Us</a></li>
                            <li><a href="{{ route('about.team') }}">About Team</a></li>
                        </ul>
                    </li>

                    <li><a class="navbar-brand" href="#contact"><i class="fal fa-at" aria-hidden="true"></i> Contact</a></li>

                    <li class="group">
                        <a class="navbar-brand" href="{{ route('profile') }}"><i class="fal fa-user" aria-hidden="true"></i> Profile</a>
                        {{--<a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-caret-down" aria-hidden="true"></i></a>--}}
                        <ul class="second-level dropdown-menu profile-dropdown-menu">
                            <li><a href="{{ route('profile.users') }}">Users</a></li>
                            <li><a href="{{ route('profile.stream') }}">Stream</a></li>
                            <li><a href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a></li>
                        </ul>
                    </li>

                    <li class="group">
                        <a class="navbar-brand" href="{{ route('forums') }}"><i class="fal fa-pencil-square-o" aria-hidden="true"></i> Forums</a>
                        {{--<a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fal fa-caret-down" aria-hidden="true"></i></a>--}}
                        <ul class="second-level dropdown-menu forums-dropdown-menu">
                            <li class="group">
                                <a href="">Tech Fusion Studios</a>
                                {{--<a class="dropdown-toggle" data-toggle="dropdown"><i class="fal fa-caret-down" aria-hidden="true"></i></a>--}}
                                <ul class="third-level dropdown-menu tfs-dropdown-menu">
                                    <li><a href="">News Discussions</a></li>
                                    <li><a href="">Update Discussions</a></li>
                                    <li><a href="">Project Discussions</a></li>
                                    <li><a href="">Random Discussions</a></li>
                                </ul>
                            </li>
                            <li class="group">
                                <a href="">Need Help</a>
                                {{--<a class="dropdown-toggle" data-toggle="dropdown"><i class="fal fa-caret-down" aria-hidden="true"></i></a>--}}
                                <ul class="third-level dropdown-menu need-dropdown-menu">
                                    <li><a href="">Website Discussions</a></li>
                                    <li><a href="">PC Discussions</a></li>
                                    <li><a href="">Server Discussions</a></li>
                                    <li><a href="">Network Discussions</a></li>
                                </ul>
                            </li>
                            <li><a href="">General</a></li>
                        </ul>
                    </li>

                    <li><a class="navbar-brand" href="{{ route('store') }}"><i class="fal fa-shopping-cart fa-fw"></i> Store</a></li>

                    @if (Auth::check() && (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Staff')))
                        <li><a class="navbar-brand" href="{{ route('mail') }}"><i class="fal fa-envelope" aria-hidden="true"></i> Mail</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>

    <!---------- Right Navbar ---------->
    <section id="navbar-right" class="container-fluid">
        <div class="row">
        </div>
    </section>

    <!---------- Left Navbar ---------->
    <section id="navbar-left" class="container-fluid">
        <div class="row">
            <div class="navbar-left mCustomScrollbar" data-mcs-theme="dark">
                <div class="navbar-left-header">
                    <a href="{{ route('mail') }}"><h4>Tech Fusion Mail</h4></a>
                </div>

                <div class="navbar-left-user">
                    <a href="#" class="pull-left">
                        <img class="img-circle" src="{{ asset('img/user-avatars/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->username }}" />
                    </a>
                    <h5>{{ Auth::user()->full_name }}</h5>
                </div>

                <div class="navbar-left-search">
                    <form name="search" {{--action="{{ route('mail.') }}"--}} method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control search" name="search" type="search" placeholder="Search" >
                                <span class="input-group-btn"><button class="btn" type="submit"><i class="fal fa-search" aria-hidden="true"></i></button></span>
                            </div>
                        </div>

                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="navbar-left-nav">
                    <ul class="nav">
                        <li><a href="{{ route('mail.compose') }}"><i class="fal fa-pencil-square-o" aria-hidden="true"></i> <p>Compose</p></a></li>

                        <li><a href="{{ route('mail.inbox') }}"><i class="fal fa-inbox" aria-hidden="true"></i> <p>Inbox</p></a></li>

                        <li><a href="{{ route('mail.sentmail') }}"><i class="fal fa-paper-plane" aria-hidden="true"></i> <p>Sent Mail</p></a></li>

                        <li><a href="{{ route('mail.drafts') }}"><i class="fal fa-archive" aria-hidden="true"></i> <p>Drafts</p></a></li>

                        <li><a href="{{ route('mail.addresses') }}"><i class="fal fa-address-book" aria-hidden="true"></i> <p>Addresses</p></a></li>

                        <li class="group">
                            <a href="{{ route('mail.folders') }}"><i class="fal fa-folder-open" aria-hidden="true"></i> <p>Folders</p></a>
                            <a class="second-level-button pull-right"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                            <ul class="nav second-level">
                                <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Folders 1</p></a></li>
                                <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Folders 2</p></a></li>
                                <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Folders 3</p></a></li>
                                <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Folders 4</p></a></li>
                                <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Folders 5</p></a></li>
                                <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Folders 6</p></a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('mail.spam') }}"><i class="fal fa-ban" aria-hidden="true"></i> <p>Spam</p></a></li>

                        <li><a href="{{ route('mail.trash') }}"><i class="fal fa-trash" aria-hidden="true"></i> <p>Trash</p></a></li>

                        <li class="group">
                            <a href="{{ route('mail.settings') }}"><i class="fal fa-cogs" aria-hidden="true"></i> <p>Settings</p></a>
                            <a class="second-level-button pull-right"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                            <ul class="nav second-level">
                                <li class="group">
                                    <a class=""><i class="fal fa-circle-o" aria-hidden="true"></i></i> <p>Settings 1</p></a>
                                    <a class="third-level-button pull-right"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                                    <ul class="nav third-level">
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 1.1</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 1.2</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 1.3</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 1.4</p></a></li>
                                    </ul>
                                </li>
                                <li class="group">
                                    <a class=""><i class="fal fa-circle-o" aria-hidden="true"></i></i> <p>Settings 2</p></a>
                                    <a class="third-level-button pull-right"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                                    <ul class="nav third-level">
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 2.1</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 2.2</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 2.3</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 2.4</p></a></li>
                                    </ul>
                                </li>
                                <li class="group">
                                    <a class=""><i class="fal fa-circle-o" aria-hidden="true"></i></i> <p>Settings 3</p></a>
                                    <a class="third-level-button pull-right"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                                    <ul class="nav third-level">
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 3.1</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 3.2</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 3.3</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 3.4</p></a></li>
                                    </ul>
                                </li>
                                <li class="group">
                                    <a class=""><i class="fal fa-circle-o" aria-hidden="true"></i></i> <p>Settings 4</p></a>
                                    <a class="third-level-button pull-right"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                                    <ul class="nav third-level">
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 4.1</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 4.2</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 4.3</p></a></li>
                                        <li><a href=""><i class="fal fa-circle-o" aria-hidden="true"></i> <p>Sub Settings 4.4</p></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!---------- Content ---------->
    <section id="content" class="container-fluid slide-wrapper content-wrapper">
        <div class="row">
            <div class="content">
                <ul class="nav nav-tabs">
                    <li class="active"><a href=".category" data-toggle="tab">@yield('content-tab')<span class="menu-active"></span></a></li>
                    <li><a href=".contact" data-toggle="tab"><i class="fal fa-at" aria-hidden="true"></i> <p>Contact</p><span class="menu-active"></span></a></li>
                    <li><a href=".support" data-toggle="tab"><i class="fal fa-ticket" aria-hidden="true"></i> <p>Support</p><span class="menu-active"></span></a></li>
                </ul>

                <div class="tab-content clearfix">
                    <div class="category tab-pane active">
                        <section id="category" class="container-fluid">
                            <div class="row">
                                @yield('content')
                            </div>
                        </section>
                    </div>

                    <div class="contact tab-pane">
                        <section id="contact" class="container-fluid">
                            <div class="row">
                            </div>
                        </section>
                    </div>

                    <div class="support tab-pane">
                        <section id="support" class="container-fluid">
                            <div class="row">
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------- Scripts ---------->
    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('lib/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/mail.js') }}"></script>
    @yield('script')
</body>
</html>