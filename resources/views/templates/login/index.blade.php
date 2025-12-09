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

    <link rel="icon" type="image/png" href="{{ env('APP_ICON') }}"/>
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
@stack('scripts')
</body>
</html>
