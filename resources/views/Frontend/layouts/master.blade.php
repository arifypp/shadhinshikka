<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('settings.title') ? config('settings.title') : env('APP_NAME') }}</title>
    <!--fivicon icon-->
    <link rel="icon" href="{{ '/storage/'.LOGO_PATH.config('settings.adminfavicon') }}">

    <!-- Stylesheet -->
    @include('Frontend.includes.css')


</head>
<body class='sc5'>
    @include('Frontend.includes.preloader')


    @include('Frontend.includes.search')

    <!-- navbar start -->
    <header class="navbar-area">
    @include('Frontend.includes.menu')
    </header>
    @include('Frontend.includes.category')    
    <!-- navbar end -->

    <!-- Main Body -->
    @yield('body')
    <!-- Main Body end-->

    <!-- footer area start -->
    @include('Frontend.includes.footer')
    <!-- footer area end -->    

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>
    @include('Frontend.includes.scripts')    

</body>
</html>