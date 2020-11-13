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

        <script src="{{ url('js/custom.petronasvn.js') }}" type="text/javascript"></script>
    </head>
    <body  id="computers" class="template-index scheme_1">
        <div id="page_preloader" class="off" style="display:none"><div class="global_loader"></div></div>
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
        let addCart = '{{ route('api.cart.addToCart') }}';
        let removeCart = '{{ route('api.cart.removeCart') }}';
        let loadCart = '{{ route('api.cart.loadCart') }}';
        let updateCart = '{{ route('api.cart.updateCart') }}';

        jQuery(function($) {

            let _this = $(this);

            _this.refreshCount();

            $('.add_to_cart').click(function() {
                let params = {
                    data: {
                    pid: Number($(this).attr('data-pid')),
                    qty: 1
                    }
                };
                _this.addToCart(params);
                _this.refreshCount();
            });
        });
    </script>
</html>