<header>
    <!-- SECTION HEADER TOP -->
    <section class="container header_top">
        <!-- USER MENU -->
        <ul class="header_user">
            <li><a href="/huong-dan-mua-hang"><span class="icon material-icons-account_balance_wallet"></span>Hướng dẫn mua hàng</a></li>
            <li><a href="/chinh-sach-van-chuyen"><span class="icon material-icons-local_shipping"></span>Chính sách giao hàng</a></li>
            <li class="checkout"><a href="{{ route('cart.checkout') }}"><span class="icon material-icons-account_balance_wallet"></span>Thanh toán</a></li>
            <li class="checkout"><a href="#"></span>Anh</a> | <a href="#"></span>Việt</a></li>
        </ul>

        <!-- CUSTOM HEADER -->
        <div class="custom_header">
            <span class="icon material-icons-local_phone"></span>
            <h4>{{ $config['web_hotline'] }}</h4>
            <span>{{ $config['web_working_time'] }}</span>
        </div>
    </section>

    <!-- SECTION HEADER MAIN -->
    <section class="container header_main">
        <!-- LOGO -->
        <div id="logo" class="logo_main">
            <a href="index.html">
                <img src="{{ $config['web_logo'] }}" style="max-width: 150px" alt="{{ $config['web_name'] }}" />
            </a>
        </div>
        <!-- HEADER CART -->
        <div class="header_cart">
            <a href="{{ route('cart.list') }}" class="clearfix">
            <span class="icon material-icons-local_grocery_store"></span>
            <span class="cart_text">
            <b>{{ trans('petronasvn.cart.txt') }}:</b><span id="cart_items">0</span> item(s)
            </span>
            </a>
        </div>
        <!-- HEADER SEARCH -->
        <div class="header_search">
            <form action="{{ route('search') }}" method="get" class="search_form">
                <input id="search-field" name="q" type="text" placeholder="Search store" class="hint" />
            </form>
        </div>
    </section>
</header>