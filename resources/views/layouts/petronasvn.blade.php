<!DOCTYPE html>
<html lang="en" class="color_scheme desktop  scheme_1  landscape">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        {!! SEO::generate() !!}
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        @if(!Utils::blank($config['web_ico']))
        <link rel="shortcut icon" href="{{ $config['web_ico'] . '?t=' . time() }}">
        @endif

        <!-- GOOGLE FONTS -->
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700,900" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link href="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/assets7452.css?v=6668237586026847111') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/style.scss27ad.css?v=8236589296019241398') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/responsive.scsscce6.css?v=4056906366830093702') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- JS -->
        <script src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/jquery.1.8.3f196.js?v=16247894444909735408') }}" type="text/javascript"></script>
        <!-- SHOPIFY SERVICE SCRIPTS -->
        <script src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/jquery.swiper.min2de4.js?v=1795846187188654354') }}" type="text/javascript"></script>
    </head>
    <body  id="computers" class="template-index scheme_1">
        <div id="wrapper1">
            <div id="wrapper2">
                @include('petronasvn.common.header')
                @include('petronasvn.common.main_menu')
                @yield('content')
                @include('petronasvn.common.footer')
            </div>
        </div>
    </body>

    <script>
        jQuery(document).ready(function($) {
            var mySwiper = new Swiper('#swiper', {
                effect: 'fade',
                
                autoplay: 30000,
                
                loop: true,
                speed: 500,
                autoplayDisableOnInteraction: false,
                
                
                prevButton: '#swiper_btn_prev',
                nextButton: '#swiper_btn_next',
                
            });

            var homepage_carousel__1 = new Swiper('#homepage_carousel__1', {
                loop: true,
                speed: 400,
                slidesPerView: 4,
                spaceBetween: 0,
                prevButton: '#carousel_1__prev',
                nextButton: '#carousel_1__next',
                breakpoints: {
                991: {
                    slidesPerView: 3
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
                }
            });

            var homepage_carousel__2 = new Swiper('#homepage_carousel__2', {
                loop: true,
                speed: 400,
                slidesPerView: 4,
                spaceBetween: 0,
                prevButton: '#carousel_2__prev',
                nextButton: '#carousel_2__next',
                breakpoints: {
                991: {
                    slidesPerView: 3
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
                }
            });

            homepage_carousel__2.prevButton.hide();
            homepage_carousel__2.nextButton.hide();

            
            $('#carousel_prev').on('click', function() {
                homepage_carousel__1.slidePrev();
                homepage_carousel__2.slidePrev();
                homepage_carousel__2.prevButton.trigger('click');
            });

            $('#carousel_next').on('click', function() {
                homepage_carousel__1.slideNext();
                homepage_carousel__2.slideNext();
                homepage_carousel__2.nextButton.trigger('click');
            });
        });
   </script>
</html>