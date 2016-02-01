<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('meta_title')</title>
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="description" content="@yield('meta_description')" />

    <!--[if lt IE 9]>
    <script src="{{ asset('/js/html5shiv.js') }}"></script>
    <script src="{{ asset('/js/respond.min.js') }}"></script>
    <![endif]-->

    <link href="{{ asset('/assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/assets/js/jquery/jquery-1.10.1.min.js') }}"></script>

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/admin/index.js') }}"></script>
</body>
</html>