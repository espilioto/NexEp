@extends('layouts.app')

@section('title')
    <title>gotta.watch</title>
@stop

@section('head')
    <link rel="stylesheet" href="{{ elixir('css/landing.css') }}">
@stop

@section('content')
    <div class="banner vertical-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 intro-message">
                    <h1>gotta.watch</h1>
                    <hr class="intro-divider">
                    <h3>never forget</h3>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="footer">
        <div class="text-center">
            <p class="copyright text-muted small">Using the Start Bootstrap - Landing Page template. <br>Copyright &copy; SouLSLayeR 2016. All Rights Reserved.</p>
        </div>
    </div>
@stop