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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="card">
      <img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/toppage_background.jpg" class="card-img">
      <div class="card-img-overlay text-center">
        <div class="col-12" style="height:210px;"></div>
        <div class="">
            <h1 class="card-title display-1 mb-2">Labmanager</h1>
            <h4 class="card-text display-6 mb-2">～研究活動のためのタスク管理アプリ～</h4>
            <h5 class="card-text">ラボマネージャーは、タスク管理やタスク共有によって研究活動の質を研究室全体で向上させるためのサービスです。<br>
                うまく活用して、研究効率を高めましょう。</h5>
                <div class="d-grid gap-2 col-2 mx-auto">
                  <a href="/login" class="btn btn-primary mt-4" type="button">Login</a>
                  <a href="/register" class="btn btn-success mt-1" type="button">Sign up</a>
          </div>
            
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>