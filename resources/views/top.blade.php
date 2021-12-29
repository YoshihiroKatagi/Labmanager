<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Labmanager') }}</title>
    <link rel="icon" href="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/Labmanager_logo.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="top" style="text-align:center;">
        <h1>Labmanager</h1>
        <h2>研究活動に特化したタスク管理アプリ</h2>
        <p>
            ラボマネージャーは、タスク管理や研究室内の情報共有によって研究室全体の活動の質を向上させるためのサービスです。<br>
            うまく活用して、研究に必要な基盤の力を身につけましょう。
        </p>
        <a href="/login" class="button btn btn-success">ログイン</a><br>
        <a href="/register" class="button btn btn-danger">新規登録</a>
    </div>
</body>
</html>
