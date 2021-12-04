<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>LabManager</title>
        <!-- Fonts -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @yield('content')
    </body>
</html>