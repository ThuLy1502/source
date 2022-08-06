<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    @include('user.layout-main.head')
</head>

<body class="style-14">
    <!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Start Loading -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h1 class="loader">Loading...</h1>
        </div>
    </section>
    <!-- End Loading  -->

    <!-- start header -->
    <header>
        @include('user.layout-main.header')
    </header>
    <!-- end header -->

    <!-- start main content -->
    <main class="main-container">

        @yield('content')

    </main>
    <!-- end main content -->

    <!-- start footer area -->
    <footer class="footer-area-content">
        @include('user.layout-main.footer')
    </footer>
    <!-- footer area end -->

    <!-- All script -->
    <script src="{{URL('public/users/js/vendor/jquery-1.10.2.min.js')}}"></script>
    <script src="{{URL('public/users/js/bootstrap.min.js')}}"></script>
    <script src="{{URL('public/users/js/smoothscroll.js')}}"></script>
    <!-- Scroll up js
============================================ -->
    <script src="{{URL('public/users/js/jquery.scrollUp.js')}}"></script>
    <script src="{{URL('public/users/js/menu.js')}}"></script>
    <!-- new collection section script -->
    <script src="{{URL('public/users/js/swiper/idangerous.swiper.min.js')}}"></script>
    <script src="{{URL('public/users/js/swiper/swiper.custom.js')}}"></script>

    <!-- Magnific Popup -->
    <script src="{{URL('public/users/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{URL('public/users/js/jquery.countdown.min.js')}}"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script type="text/javascript" src="{{URL('public/users/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('public/users/rs-plugin/js/jquery.themepunch.revolution.min.js')}}">
    </script>
    <!-- Owl carousel -->
    <script src="{{URL('public/users/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL('public/users/js/main.js')}}"></script>



    <script type="text/javascript">
    /*-----------------------------------------------------------------------------------*/
    /* Product Carousel
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().owlCarousel) {
        var productCarousel = $("#product-carousel");
        productCarousel.owlCarousel({
            loop: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1100: {
                    items: 4
                }
            }
        });

        // Custom Navigation Events
        $(".product-control-nav .next").on("click", function() {
            productCarousel.trigger('next.owl.carousel');
        });

        $(".product-control-nav .prev").on("click", function() {
            productCarousel.trigger('prev.owl.carousel');
        });
    }

    /* Main Slider */
    $('.tp-banner0').show().revolution({
        dottedOverlay: "none",
        delay: 5000,
        startWithSlide: 0,
        startwidth: 869,
        startheight: 520,
        hideThumbs: 10,
        hideTimerBar: "on",
        thumbWidth: 50,
        thumbHeight: 50,
        thumbAmount: 4,
        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "round",
        touchenabled: "on",
        onHoverStop: "on",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
        keyboardNavigation: "off",
        navigationHAlign: "right",
        navigationVAlign: "bottom",
        navigationHOffset: 30,
        navigationVOffset: 30,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 50,
        soloArrowLeftVOffset: 8,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 50,
        soloArrowRightVOffset: 8,
        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",
        spinner: "spinner4",
        stopLoop: "on",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        forceFullWidth: "off",
        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 500,
        hideAllCaptionAtLilmit: 500,
        videoJsPath: "rs-plugin/videojs/",
        fullScreenOffsetContainer: ""
    });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.xemnhanh', function() {
            var book_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'{{url('/xem-nhanh')}}',
                method: "POST",
                dataType: "JSON",
                data:{book_id:book_id,_token:_token},
                success:function(data){
                    $('#book_thumb').html(data.book_thumb);
                    $('#book_name').html(data.book_name);
                    $('#book_description').html(data.book_description);

                    $('#book_format').html(data.book_format);
                    $('#book_pages').html(data.book_pages);
                    $('#book_weight').html(data.book_weight);

                    $('#book_publishing_year').html(data.book_publishing_year);
                    $('#book_price_sale').html(data.book_price_sale);
                    $('#author_name').html(data.author_name);
                }
            });
        });
    </script>
</body>
</html>