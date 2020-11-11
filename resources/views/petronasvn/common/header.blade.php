<header>
    <!-- SECTION HEADER TOP -->
    <section class="container header_top">
        <!-- USER MENU -->
        <ul class="header_user">
            <li><a href="account/login.html"><span class="icon material-icons-account_balance_wallet"></span>Hướng dẫn mua hàng</a></li>
            <li><a href="account/register.html"><span class="icon material-icons-local_shipping"></span>Chính sách giao hàng</a></li>
            <li class="checkout"><a href="cart.html"><span class="icon material-icons-account_balance_wallet"></span>Thanh toán</a></li>
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
                <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/logo8009.png?v=3086023828804869937') }}" alt="Computers" />
            </a>
        </div>
        <!-- HEADER CART -->
        <div class="header_cart">
            <a href="cart.html" class="clearfix">
            <span class="icon material-icons-local_grocery_store"></span>
            <span class="cart_text">
            <b>{{ trans('petronasvn.cart.txt') }}:</b><span id="cart_items">0</span> item(s)
            </span>
            </a>
        </div>
        <!-- HEADER SEARCH -->
        <div class="header_search">
            <form action="#" method="get" class="search_form">
                <input id="search-field" name="q" type="text" placeholder="Search store" class="hint" />
            </form>
        </div>
    </section>
</header>