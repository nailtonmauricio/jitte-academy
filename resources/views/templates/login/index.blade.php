<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ env('APP_ICON') }}"/>
    <!--===============================================================================================-->

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">--}}
    <!--===============================================================================================-->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">--}}
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter" id="login-page">
    <div class="container-login100">
        <div class="wrap-login100">
            <x-alert/>
            @yield('content')
        </div>
    </div>
</div>

<!--===============================================================================================-->
{{--<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>--}}
<!--===============================================================================================-->
{{--<script src="{{ asset('js/main.js') }}"></script>--}}
@stack('scripts')
</body>
</html>
