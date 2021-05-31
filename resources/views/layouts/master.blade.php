<!DOCTYPE html><html lang="en">
    <!-- Mirrored from echotheme.com/educati/index-school-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 21:09:01 GMT -->
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Educavo - Education HTML Template</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/front/assets//images/easy-learn.png">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/font-awesome.min.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/animate.css') }}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/owl.carousel.css') }}">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/slick.css') }}">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/off-canvas.css') }}">
        <!-- linea-font css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/fonts/linea-fonts.css') }}">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/fonts/flaticon.css') }}">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/magnific-popup.css') }}">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/rsmenu-main.css') }}">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/rs-spacing.css') }}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/style.css') }}"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/responsive.css') }}">
        <!--[if lt IE 9]>
            <script src="https:/oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
            <script src="https:/oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front/main.css') }}">
        @yield('css')
    </head>
    <body class="defult-home">
        <div class="full-width-header header-style1 home1-modifiy">
            @include('includes.header')
            <div class="main-content">
                @yield('content')
            </div>
            @include('includes.footer')
        </div>   

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        
        <!-- script files -->
        <script src="assets/js/contact.form.js"></script>
        <!-- modernizr js -->
        <script src="{{ asset('front/assets/js/modernizr-2.8.3.min.js') }}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
        <!-- Menu js -->
        <script src="{{ asset('front/assets/js/rsmenu-main.js') }}"></script> 
        <!-- op nav js -->
        <script src="{{ asset('front/assets/js/jquery.nav.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Slick js -->
        <script src="{{ asset('front/assets/js/slick.min.js') }}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('front/assets/js/isotope.pkgd.min.js') }}"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="{{ asset('front/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- wow js -->
        <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
        <!-- Skill bar js -->
        <script src="{{ asset('front/assets/js/skill.bars.jquery.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery.counterup.min.js') }}"></script>        
         <!-- counter top js -->
        <script src="{{ asset('front/assets/js/waypoints.min.js') }}"></script>
        <!-- video js -->
        <script src="{{ asset('front/assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>      
        <!-- plugins js -->
        <script src="{{ asset('front/assets/js/plugins.js') }}"></script>
        <!-- contact form js -->
        <script src="{{ asset('front/assets/js/contact.form.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('front/assets/js/main.js') }}"></script>
        @yield('js')

       
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/educavo/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 19:19:20 GMT -->
</html>