<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <div id="main">
            <div class="main-header container">
                <h1>
                    Cadastro de clientes
                </h1>
            </div>

            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('js/mask.min.js') }}"></script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
