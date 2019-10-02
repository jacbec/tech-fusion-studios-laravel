<!DOCTYPE html>
<html>
<head>
    <title>Profile - @yield('title')</title>

    <!-- Meta/Favicons/Fonts Section ---------------------------------------------------------------------------------->
    <meta charset="utf-8">

    <meta name="description" content="Tech Fusion Studios is a team dedicated to all thing programming and IT.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/croppie/croppie.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/profile.css') }}">
    @yield('css')
</head>
<body>
    @if (Auth::check() && !Auth::user()->hasRole('Admin'))
        <!---------- Top Navbar ---------->
        <section id="navbar-top" class="container-fluid">
            <div class="row">
                <div class="navbar-top navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="navbar-alert">
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            This part of the site is currently under development!
                        </div>
                    </div>
                    <div class="navbar-header pull-left">
                        <a class="navbar-brand" href="{{ route('home') }}"><i class="fal fa-home" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </section>

        @include('shared.footer')
    @else
        @include('shared.navbar')

        <section id="slide-wrapper" class="slide-wrapper" style="background-color: #fff">
            <!---------- Left Navbar ---------->
            <section id="left-menu" class="container-fluid">
                <div class="row">
                    <div class="left-menu mCustomScrollbar" data-mcs-theme="dark">
                        <div class="user-avatar">
                            <img class="img-circle" src="{{ asset('img/user-avatars/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->username }}" />

                            {{--<img class="img-circle" src="{{ asset('img/user-pics/no-photo.png') }}" alt="{{ Auth::user()->username }}" />--}}

                            <a class="user-avatar-change" data-toggle="modal" data-target=".avatar-modal">
                                Change
                            </a>
                        </div>

                        <div class="user-info">
                            <table class="table">
                                <tbody>
                                    <tr class="user-name">
                                        <td colspan="3">{{ Auth::user()->full_name }}</td>
                                    </tr>
                                    <tr class="user-role">
                                        <td colspan="3">{{ Auth::user()->roles()->where('user_id', Auth::user()->id)->first()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                    </tr>
                                    <tr class="user-stats">
                                        <td><i class="fal fa-comments" aria-hidden="true"></i> <p>999999</p></td>
                                        <td><i class="fal fa-thumbs-up" aria-hidden="true"></i> <p>999999</p></td>
                                        <td><i class="fal fa-star" aria-hidden="true"></i> <p>999999</p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><i class="fal fa-calendar pull-left" aria-hidden="true"></i> <p class="pull-right">{{ Auth::user()->created_at->format('Y-m-d') }}</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!---------- Content ---------->
            <section id="content" class="container-fluid">
                <div class="row">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </section>

            <div class="content">
                @include('shared.footer')
            </div>
        </section>

        <!---------- Avatar Modal ---------->
        <section id="avatar" class="container-fluid">
            <div class="row">
                <div class="avatar-modal modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Change Avatar</h3>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <form class="avatar-form" name="avatar-form" action="{{ route('profile.avatar') }}" method="post" enctype="multipart/form-data" data-parsley-validate >
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="croppie-editor"></div>
                                                
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="form-group">
                                                <label class="btn btn-xl btn-file">
                                                    Choose Image <input class="avatar" name="avatar" type="file" style="display: none;" data-parsley-required="true"
                                                                        data-parsley-required-message="Please choose an image before uploading" data-parsley-errors-container=".parsley-errors" >
                                                </label>
                                                <input class="btn btn-xl" type="submit" value="Upload">
                                                <button class="btn btn-xl croppie-sweet-alert" type="button" hidden>Sweet Alert</button>
                                                <button class="btn btn-xl" type="button" data-dismiss="modal">Cancel</button>
                                            </div>

                                            <div class="form-group">
                                                <div class="parsley-errors">
                                                </div>
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
    @endif

    <!-- Scripts ------------------------------------------------------------------------------------------------------>
    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('lib/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('lib/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ asset('lib/croppie/croppie.js') }}"></script>
    <script src="{{ asset('lib/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script>
        var token = '{{ Session::token() }}';
    </script>
    @yield('js')
</body>
</html>