<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NexEp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    NexEp
                </div>

                <div class="col-md-18">    
                    <label for="autocomplete">Search shows</label><br>
                    <input id="autocomplete" autocomplete="off">
                </div>

                <div class="row">
                    <div class="col-md-18">    
                        <h6 class="content"></h6>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ elixir('js/all.js') }}"></script>
        <script src="{{ elixir('js/js.js') }}"></script>
    </body>
</html>
