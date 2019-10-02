@extends('layouts.main')

@section('title', '| 404 Error')

@section('content')
    <section id="exception404" class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <p>This is not the route you are looking for. Enjoy the game below while you think about where you want to go.</p>

                @include('errors.games.rps')
            </div>
        </div>
    </section>
@endsection