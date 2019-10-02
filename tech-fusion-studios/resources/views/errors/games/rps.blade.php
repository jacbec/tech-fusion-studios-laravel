@section('stylesheet')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/rps-style.min.css') }}">
@endsection

<section id="rps" class="container-fluid " style="padding: 50px 0px 50px 0px">
    <div class="container">
        <div class="row">
            <div class="rps-header">
                <div class="col-lg-12 text-center">
                    <h2>Rock, Paper, Scissors</h2>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="rps-body">
                    <div class="col-lg-5 col-lg-offset-1">
                        <h3>You </h3>
                        <i class="fal fa-hand-rock-o fa-5x"></i>
                    </div>
                    <div class="col-lg-5">
                        <h3>Me </h3>
                        <i class="fal fa-hand-paper-o fa-5x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="rps-buttons">
                    <a class="btn btn-lg"><i class="fal fa-hand-rock-o fa-2x"></i></a>
                    <a class="btn btn-lg"><i class="fal fa-hand-paper-o fa-2x"></i></a>
                    <a class="btn btn-lg"><i class="fal fa-hand-scissors-o fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>