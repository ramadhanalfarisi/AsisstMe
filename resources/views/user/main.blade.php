<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Aironepage" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Assist Me!</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="/Home/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
        <link href="/Home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="/Home/css/animate.css" rel="stylesheet">
        <link href="/Home/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Home/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="/Home/css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body id="body" data-spy="scroll" data-target=".header">

        <!--========== HEADER ==========-->
        @include('user.layout.header')
        <!--========== END HEADER ==========-->

        <!--========== SLIDER ==========-->
        @include('user.content.slider')
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Categories -->
        @include('user.content.categories')
        <!-- End Categories -->

        <!-- Service -->
        @include('user.content.service')
        <!-- End Service -->

        <!-- Promo Banner -->
        @include('user.content.promo')
        <!-- End Promo Banner -->

        <!-- Testimonials -->
        @include('user.content.testi')
        <!-- End Testimonials -->

        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        @include('user.layout.footer')
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="/Home/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="/Home/vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="/Home/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="/Home/vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="/Home/vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="/Home/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="/Home/vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="/Home/vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
        <script src="/Home/vendor/magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script src="/Home/vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="/Home/vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&amp;callback=initMap" async defer></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
        <script src="js/components/swiper.min.js" type="text/javascript"></script>
        <script src="js/components/maginific-popup.min.js" type="text/javascript"></script>
        <script src="js/components/masonry.min.js" type="text/javascript"></script>
        <script src="js/components/gmap.min.js" type="text/javascript"></script>

    </body>
    <!-- END BODY -->
</html>