<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('favicon-thecloth.png') }}" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>@yield('title')</title>

    <!-- Fonts-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ps-icon/style.css') }}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
    <style>
        .preloader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('../images/preloader/preloader.gif') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: .8;
        }

    </style>
    {{-- <script>
        $(window).load(function () {
            $("#preloaders").delay(3000).hide(1);
        });
    </script> --}}
</head>

<body>
    <!-- preloader -->
    {{-- <div id="preloaders" class="preloader"></div> --}}
    <!-- Header -->
    @include('layouts.user.includes.header')
    <!-- End of Header-->

    <!-- Header-Service -->
    @include('layouts.user.includes.header-service')
    <!-- End of Header-Service -->
    <main class="ps-main">
        <!-- Main COntent -->
        @yield('content')
        <!-- End of Main Content -->

        <!-- Ps-Sunscribe -->
        @include('layouts.user.includes.ps-subscribe')
        <!-- End of Ps-Subscribe -->

        <!-- Ps-Footer -->
        @include('layouts.user.includes.ps-footer')
        <!-- End of Ps-Footer -->
    </main>

    <!-- JS Library-->
    <script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/imagesloaded.pkgd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('plugins/jquery.matchHeight-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/slick/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=ID"></script> --}}

    <script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
