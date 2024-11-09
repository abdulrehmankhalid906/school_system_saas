<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | School System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium School System Admin + Administration" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">
        <!-- jsvectormap css -->
        <link href="{{ asset('theme/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
        <!--Swiper slider css-->
        <link href="{{ asset('theme/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Layout config Js -->
        <script src="{{ asset('theme/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('theme/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="{{ asset('theme/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="layout-wrapper">
            @include('partials.header')

            <div class="app-menu navbar-menu">
                @include('partials.sidebar')
            </div>

            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>

                @include('partials.footer')
            </div>
        </div>
       
        <!-- JAVASCRIPT -->
        <script src="{{ asset('theme/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('theme/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('theme/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
        <script src="{{ asset('theme/js/plugins.js') }}"></script>
        
        <!--Swiper slider js-->
        <script src="{{ asset('theme/libs/swiper/swiper-bundle.min.js') }}"></script>
        
        <!-- Dashboard init -->
        <script src="{{ asset('theme/js/pages/dashboard-ecommerce.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('theme/js/app.js') }}"></script>
    </body>
</html>