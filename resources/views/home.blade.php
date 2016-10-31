@extends('layouts.app')
    
@section('title')
    <title>gotta.watch</title>
@stop

@section('content')
    <div class="container-fluid text-center">
        <div class="title">
            gotta.watch
        </div>

        <div class=".col-xs-6 .col-md-4">    
            <label for="autocomplete">Search shows</label><br>
            <input id="autocomplete" autocomplete="off">
        </div>
    </div>
@stop

@section('js')
    <script src="{{ elixir('js/js.js') }}"></script>
@stop