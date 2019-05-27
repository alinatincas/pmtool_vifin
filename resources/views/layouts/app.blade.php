<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VIFIN') }}</title>

    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="main">
        @include('inc.navbar')
        <main class="container-fluid">
            <div class="row">
                <div class="col-2 sidebar-vifin">
                    @include('inc.sidebar')
                </div>
                <div class="col-10">
                    @include('inc.messages')
                    @yield('content')
                </div>
            </div>
            
        </main>
        <footer class="footer-vifin">
           <b> <p class="footer-vifin-p">COPYRIGHT &copy; VIFIN</p></b>
        </footer>    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        @yield('script')
    </script>
</body>
</html>
