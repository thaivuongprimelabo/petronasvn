@php
    $route = Route::currentRouteName();
	$mainNav = trans('petronasvn.main_menu');
    $menuCss = 'sf-menu megamenu_desktop visible-md visible-lg  col-sm-12  sidebar_left sf-js-enabled sf-arrows';
    if($route == 'home' ||  $route == 'category' || $route == 'products') {
        $menuCss = 'sf-menu megamenu_desktop visible-md visible-lg  col-sm-9 col-sm-push-3 sidebar_left';
    }
@endphp
<div id="megamenu">
    <div class="container">
        <div class="row">
            <ul class="{{ $menuCss }}">
                @foreach($mainNav as $link=>$nav)
                    <li class="megamenu_item_1">
                        <a href="{{ route($link) }}" class="{{ $route == $link ? 'active' : '' }}">{{ $nav['text'] }}</a>
                    </li>
                @endforeach
                <!-- <li class="megamenu_item_1">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="megamenu_item_2">
                    <a href="collections.html">Giới thiệu</a>
                    <ul>
                        <li>
                            <div class="submenu submenu_2">
                            <div class="row row_item">
                                <div class="col-sm-3 col_item">
                                    <div class="img_wrapper">
                                        <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/megamenu2_sub_col__1_img30e3.png?v=12523141577516616921') }} alt="" />
                                    </div>
                                    <h6>Laptops / Notebooks</h6>
                                    <ul>
                                        <li><a href="collections/accessories.html" title="">Accessories</a></li>
                                        <li><a href="collections/desktops.html" title="">Desktops</a></li>
                                        <li><a href="collections/laptops.html" title="">Laptops</a></li>
                                        <li><a href="collections/lightweight-pcs.html" title="">Lightweight PCs</a></li>
                                        <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 col_item">
                                    <div class="img_wrapper">
                                        <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/megamenu2_sub_col__2_img88b9.png?v=1905208442160543429') }} alt="" />
                                    </div>
                                    <h6>Desktop Computers</h6>
                                    <ul>
                                        <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                        <li><a href="collections/pcs-with-office.html" title="">PCs with Office</a></li>
                                        <li><a href="collections/tablets-2-in-1.html" title="">Tablets</a></li>
                                        <li><a href="collections/windows-10-pcs.html" title="">Windows 10 PCs</a></li>
                                        <li><a href="collections/desktops.html" title="">Desktops</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 col_item">
                                    <div class="img_wrapper">
                                        <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/megamenu2_sub_col__3_imgaa0b.png?v=3210394730242977507') }} alt="" />
                                    </div>
                                    <h6>Gaming Laptops</h6>
                                    <ul>
                                        <li><a href="collections/accessories.html" title="">Accessories</a></li>
                                        <li><a href="collections/laptops.html" title="">Laptops</a></li>
                                        <li><a href="collections/lightweight-pcs.html" title="">Lightweight PCs</a></li>
                                        <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                        <li><a href="collections/tablets-2-in-1.html" title="">Tablets</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 col_item">
                                    <div class="img_wrapper">
                                        <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/megamenu2_sub_col__4_img80ca.png?v=7903144484062236474') }} alt="" />
                                    </div>
                                    <h6>Tablets</h6>
                                    <ul>
                                        <li><a href="collections/tablets-2-in-1.html" title="">Tablets</a></li>
                                        <li><a href="collections/windows-10-pcs.html" title="">Windows 10 PCs</a></li>
                                        <li><a href="collections/accessories.html" title="">Accessories</a></li>
                                        <li><a href="collections/pc-gaming.html" title="">PC Gaming</a></li>
                                        <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="megamenu_item_3">
                    <a href="blogs/news.html">Sản phẩm</a>
                    <ul>
                        <li>
                            <div class="submenu submenu_3">
                            <div class="row row_item">
                                <div class="col-sm-4 col_item">
                                    <div class="blog_img"><img src="{{ url('petronasvn/s/files/1/1265/3751/articles/blog_img1_f8de1866-7972-43c4-bc09-e1fe21a7f997_1024x102413cd.jpg?v=1462362149') }} alt="It is very easy to buy a PC or console game in our store" /></div>
                                    <h6 class="blog_title"><a href="blogs/news/123228355-it-is-very-easy-to-buy-a-pc-or-console-game-in-our-store.html"><b>It is very easy to buy a PC or console game in our store</b></a></h6>
                                    <div class="blog_content">
                                        We are producing reliable and durable goods. That is why we are always in touch with the latest new inventions...						
                                    </div>
                                    <div class="blog_info clearfix">
                                        <span class="blog_author"><span class="icon material-icons-person"></span>David Braun</span>
                                        <span class="blog_comments"><span class="icon material-icons-chat_bubble"></span>0</span>
                                        <span class="blog_date"><span class="icon material-icons-access_time"></span>04/05</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col_item">
                                    <div class="blog_img"><img src="{{ url('petronasvn/s/files/1/1265/3751/articles/blog_img2_1024x1024b824.jpg?v=1462362026') }} alt="Everyone will be able to buy a game according to the taste" /></div>
                                    <h6 class="blog_title"><a href="blogs/news/123228035-everyone-will-be-able-to-buy-a-game-according-to-the-taste.html"><b>Everyone will be able to buy a game according to the taste</b></a></h6>
                                    <div class="blog_content">
                                        It seems that computer is such a revolutionary invention that we could not even realize the true extent of its...						
                                    </div>
                                    <div class="blog_info clearfix">
                                        <span class="blog_author"><span class="icon material-icons-person"></span>David Braun</span>
                                        <span class="blog_comments"><span class="icon material-icons-chat_bubble"></span>1</span>
                                        <span class="blog_date"><span class="icon material-icons-access_time"></span>04/05</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col_item">
                                    <div class="blog_img"><img src="{{ url('petronasvn/s/files/1/1265/3751/articles/blog_img3_1024x1024bb29.jpg?v=1463563716') }} alt="Video games are the most popular form of entertainment" /></div>
                                    <h6 class="blog_title"><a href="blogs/news/120943939-video-games-are-the-most-popular-form-of-entertainment.html"><b>Video games are the most popular form of entertainment</b></a></h6>
                                    <div class="blog_content">
                                        You know that computers are being applied in all spheres of society. It is a tremendous achievement of mankind. It...						
                                    </div>
                                    <div class="blog_info clearfix">
                                        <span class="blog_author"><span class="icon material-icons-person"></span>David Braun</span>
                                        <span class="blog_comments"><span class="icon material-icons-chat_bubble"></span>0</span>
                                        <span class="blog_date"><span class="icon material-icons-access_time"></span>25/04</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="megamenu_item_4">
                    <a href="collections/products-on-sale.html">Hướng dẫn mua hàng</a>
                    <ul>
                        <li>
                            <div class="submenu submenu_4">
                            <div class="row row_item2">
                                <div class="col-sm-8 submenu4_products">
                                    <h6 class="submenu_title">Now On Sale</h6>
                                    <div class="row">
                                        <div class="col-sm-4 product">
                                        <div class="product_wrapper">
                                            <div class="product_img">  
                                                <a href="products/asus-maximus-vii-hero.html">
                                                <img src="{{ url('petronasvn/s/files/1/1265/3751/products/asus_maximus_vii_hero_01_large9c93.png?v=1461669664') }} alt="Asus MAXIMUS VII HERO" />
                                                </a>
                                            </div>
                                            <div class="product_info clearfix">
                                                <div class="product_name">
                                                    <a href="products/asus-maximus-vii-hero.html">Asus MAXIMUS VII HERO</a>
                                                </div>
                                                <div class="product_price">
                                                    <span class="money">$75.00</span>
                                                </div>
                                                <div class="product_links">
                                                    <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                    <input type="hidden" name="id" value="19414841603" />
                                                    <button class="btn btn-cart" type="submit">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-sm-4 product">
                                        <div class="product_wrapper">
                                            <div class="product_img">  
                                                <a href="products/asus-sabertooth-x99-atx-ddr4-3000-oc-intel-lga-2011.html">
                                                <img src="{{ url('petronasvn/s/files/1/1265/3751/products/asus_sabertooth_x99_atx_ddr4_3000_oc_intel_lga_2011_01_largef3eb.png?v=1461669675') }} alt="Asus Sabertooth X99 ATX DDR4 3000 (o.c.) Intel LGA 2011" />
                                                </a>
                                            </div>
                                            <div class="product_info clearfix">
                                                <div class="product_name">
                                                    <a href="products/asus-sabertooth-x99-atx-ddr4-3000-oc-intel-lga-2011.html">Asus Sabertooth X99 ATX DDR4 3000 (o....</a>
                                                </div>
                                                <div class="product_price">
                                                    <span class="money">$110.00</span>
                                                    <span class="money compare-at-price">$120.00</span>
                                                </div>
                                                <div class="product_links">
                                                    <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                    <a class="btn btn_options" href="products/asus-sabertooth-x99-atx-ddr4-3000-oc-intel-lga-2011.html" title="Add to cart">Add to cart</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-sm-4 product">
                                        <div class="product_wrapper">
                                            <div class="product_img">  
                                                <a href="products/evga-geforce-gtx-980-4gb-256-bit.html">
                                                <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_980_4gb_256_bit_01_large7c7f.png?v=1461669718') }} alt="EVGA GeForce GTX 980 4GB 256 Bit" />
                                                </a>
                                            </div>
                                            <div class="product_info clearfix">
                                                <div class="product_name">
                                                    <a href="products/evga-geforce-gtx-980-4gb-256-bit.html">EVGA GeForce GTX 980 4GB 256 Bit</a>
                                                </div>
                                                <div class="product_price">
                                                    <span class="money">$170.00</span>
                                                </div>
                                                <div class="product_links">
                                                    <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                    <input type="hidden" name="id" value="19414855107" />
                                                    <button class="btn btn-cart" type="submit">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 submenu4_banners">
                                    <div class="banner banner_1">
                                        <a class="banner_ins" href="products/asus-maximus-vii-hero.html">
                                        <div class="banner_img">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/megamenu4_banner1_img6017.png?v=7628264261268009059') }} alt="">
                                        </div>
                                        <div class="banner_text">
                                            <h2 class="title2">iPad Pro</h2>
                                            <div class="clearfix">
                                                <p>Super Tablet. Now in two sizes.</p>
                                            </div>
                                            <span class="link">Shop now!</span>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="banner banner_2">
                                        <a class="banner_ins" href="products/asus-sabertooth-x99-atx-ddr4-3000-oc-intel-lga-2011.html">
                                        <div class="banner_img">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/megamenu4_banner2_img100a.png?v=7471087189623909250') }} alt="">
                                        </div>
                                        <div class="banner_text">
                                            <h2 class="title2">MacBook</h2>
                                            <div class="clearfix">
                                                <p>Light. Years ahead.</p>
                                            </div>
                                            <span class="link">Shop now!</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="megamenu_item_5">
                    <a href="pages/sitemap.html">Tin tức</a>
                </li>
                <li class="megamenu_item_6">
                    <a href="pages/contact-us.html">Liên hệ</a>
                </li> -->
            </ul>
            <div class="megamenu_mobile visible-xs visible-sm  col-sm-9 col-sm-push-3  sidebar_left">
                <h2>Computers<i></i></h2>
                <ul class="level_1">
                    @foreach($mainNav as $link=>$nav)
                        <li>
                            <a href="{{ route($link) }}">{{ $nav['text'] }}</a>
                        </li>
                    @endforeach
                    <!-- <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="collections.html">Products<i class="level_1_trigger"></i></a>
                        <ul class="level_2">
                            <li>
                                <a href="#">Laptops / Notebooks<i class="level_2_trigger"></i></a>
                                <ul class="level_3">
                                    <li><a href="collections/accessories.html" title="">Accessories</a></li>
                                    <li><a href="collections/desktops.html" title="">Desktops</a></li>
                                    <li><a href="collections/laptops.html" title="">Laptops</a></li>
                                    <li><a href="collections/lightweight-pcs.html" title="">Lightweight PCs</a></li>
                                    <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Desktop Computers<i class="level_2_trigger"></i></a>
                                <ul class="level_3">
                                    <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                    <li><a href="collections/pcs-with-office.html" title="">PCs with Office</a></li>
                                    <li><a href="collections/tablets-2-in-1.html" title="">Tablets</a></li>
                                    <li><a href="collections/windows-10-pcs.html" title="">Windows 10 PCs</a></li>
                                    <li><a href="collections/desktops.html" title="">Desktops</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Gaming Laptops<i class="level_2_trigger"></i></a>
                                <ul class="level_3">
                                    <li><a href="collections/accessories.html" title="">Accessories</a></li>
                                    <li><a href="collections/laptops.html" title="">Laptops</a></li>
                                    <li><a href="collections/lightweight-pcs.html" title="">Lightweight PCs</a></li>
                                    <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                    <li><a href="collections/tablets-2-in-1.html" title="">Tablets</a></li>
                                </ul>
                            </li>
                            <li>
                            <a href="#">Tablets<i class="level_2_trigger"></i></a>
                                <ul class="level_3">
                                    <li><a href="collections/tablets-2-in-1.html" title="">Tablets</a></li>
                                    <li><a href="collections/windows-10-pcs.html" title="">Windows 10 PCs</a></li>
                                    <li><a href="collections/accessories.html" title="">Accessories</a></li>
                                    <li><a href="collections/pc-gaming.html" title="">PC Gaming</a></li>
                                    <li><a href="collections/pc-sale.html" title="">PC sale</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blogs/news.html">Blog</a>
                    </li>
                    <li>
                        <a href="collections/products-on-sale.html">Sale</a>
                    </li>
                    <li>
                        <a href="pages/sitemap.html">Sitemap</a>
                    </li>
                    <li>
                        <a href="pages/contact-us.html">Contacts</a>
                    </li> -->
                </ul>
            </div>
            @if($route == 'home' ||  $route == 'category' || $route == 'products')
            <div class="widget_header_wr  col-sm-3 sidebar_left col-sm-pull-9">
                <h3 class="widget_header">{{ trans('petronasvn.category_txt') }}</h3>
            </div>
            @endif
        </div>
    </div>
    </div>