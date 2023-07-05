<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Charifit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href={{asset('frontend/img/favicon.png')}}>
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href={{asset('frontend/css/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/owl.carousel.min.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/magnific-popup.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/font-awesome.min.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/themify-icons.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/nice-select.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/flaticon.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/gijgo.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/animate.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/slicknav.css')}}>
    <link rel="stylesheet" href={{asset('frontend/css/style.css')}}>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    @stack('css')
</head>

<body>

        @include('frontend.layouts.header')
            @yield('content')
        @include('frontend.layouts.footer')



    <!-- link that opens popup -->
    <!-- JS here -->
    <script src={{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}></script>
    <script src={{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}></script>
    <script src={{asset('frontend/js/popper.min.js')}}></script>
    <script src={{asset('frontend/js/bootstrap.min.js')}}></script>
    <script src={{asset('frontend/js/owl.carousel.min.js')}}></script>
    <script src={{asset('frontend/js/isotope.pkgd.min.js')}}></script>
    <script src={{asset('frontend/js/ajax-form.js')}}></script>
    <script src={{asset('frontend/js/waypoints.min.js')}}></script>
    <script src={{asset('frontend/js/jquery.counterup.min.js')}}></script>
    <script src={{asset('frontend/js/imagesloaded.pkgd.min.js')}}></script>
    <script src={{asset('frontend/js/scrollIt.js')}}></script>
    <script src={{asset('frontend/js/jquery.scrollUp.min.js')}}></script>
    <script src={{asset('frontend/js/wow.min.js')}}></script>
    <script src={{asset('frontend/js/nice-select.min.js')}}></script>
    <script src={{asset('frontend/js/jquery.slicknav.min.js')}}></script>
    <script src={{asset('frontend/js/jquery.magnific-popup.min.js')}}></script>
    <script src={{asset('frontend/js/plugins.js')}}></script>
    <script src={{asset('frontend/js/gijgo.min.js')}}></script>
    <!--contact js-->
    <script src={{asset('frontend/js/contact.js')}}></script>
    <script src={{asset('frontend/js/jquery.ajaxchimp.min.js')}}></script>
    <script src={{asset('frontend/js/jquery.form.js')}}></script>
    <script src={{asset('frontend/js/jquery.validate.min.js')}}></script>
    <script src={{asset('frontend/js/mail-script.js')}}></script>

    <script src={{asset('frontend/js/main.js')}}></script>
    @stack('js')

</body>

</html>