@php
    $array = [
        'home',
        'category',
        'products',
        'about',
        'posts',
        'contact'
    ];
    
    $route = Route::currentRouteName();
    $routeSplit = explode('.', $route);
    $routeGroup = $routeSplit[0];

	$mainNav = trans('petronasvn.main_nav');
    $menuCss = 'sf-menu megamenu_desktop visible-md visible-lg  col-sm-12  sidebar_left sf-js-enabled sf-arrows';
    if(in_array($route, $array) || in_array($routeGroup, $array)) {
        $menuCss = 'sf-menu megamenu_desktop visible-md visible-lg  col-sm-9 col-sm-push-3 sidebar_left';
    }
@endphp
<div id="megamenu">
    <div class="container">
        <div class="row">
            <ul class="{{ $menuCss }}">
                <li class="megamenu_item_1">
                    <a href="{{ route('home') }}">{{ trans("petronasvn.main_nav.home") }}</a>
                </li>
                <li class="megamenu_item_2">
                    <a href="{{ route('about') }}">{{ trans("petronasvn.main_nav.about") }}</a>
                </li>
                <li class="megamenu_item_3">
                    <a href="{{ route('posts.list') }}" class="sf-with-ui">{{ trans("petronasvn.main_nav.posts") }}</a>
                    <ul>
                        <li>
                            <div class="submenu submenu_3">
                                <div class="row row_item">
                                                                
                                    @foreach($config['posts'] as $post)
                                    <div class="col-sm-4 col_item">
                                        <div class="blog_img"><img src="{{ $post->getPhoto() }}" alt="{{ $post->getTitle() }}" /></div>
                                        <h6 class="blog_title"><a href="{{ $post->getLink() }}"><b>{{ $post->getTitle(50) }}</b></a></h6>
                                        <div class="blog_content">
                                            {{ $post->getShortSummary(100) }}						
                                        </div>
                                        <div class="blog_info clearfix">
                                            <span class="blog_author"><span class="icon material-icons-person"></span>Administrator</span>
                                            <span class="blog_date"><span class="icon material-icons-access_time"></span>{{ Utils::formatDate($post->created_at) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="megamenu_item_4">
                    <a href="{{ route('products') }}">{{ trans("petronasvn.main_nav.products") }} <span class="menu_badge">hot deals</span></a>
                </li>
                <li class="megamenu_item_5">
                    <a href="{{ route('discountProducts') }}" class="sf-with-ui">{{ trans("petronasvn.main_nav.discount") }} <span class="menu_badge">hot deals</span></a>
                    <ul>
                        <li>
                            <div class="submenu submenu_5">
                                <div class="row row_item2">
                                    <div class="col-sm-8 submenu4_products">
                                        <div class="row">
                                            @foreach($config['discountProducts'] as $product)
                                            <div class="col-sm-4 product">
                                                <div class="product_wrapper">
                                                    <div class="product_img">  
                                                        <a href="{{ $product->getLink() }}">
                                                            <img src="{{ $product->getFirstImage() }}" alt="{{ $product->getName() }}" style="max-width: 100%; height:auto" />
                                                        </a>
                                                    </div>
                                                    <div class="product_info clearfix">
                                                        <div class="product_name">
                                                            <a href="{{ $product->getLink() }}">{{ $product->getName() }}</a>
                                                        </div>
                                                        <div class="product_price">
                                                            <span class="money">{{ $product->getPriceDiscount() }}</span>
                                                        </div>
                                                        <div class="product_links">
                                                            <button class="btn btn-cart add_to_cart" style="font-size:12px" type="submit">Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-4 submenu4_banners">
                                        @if(isset($config['bannerRightUp']))
                                        <div class="banner banner_1">
                                            <a class="banner_ins" href="{{ $config['bannerRightUp']->getLink() }}">
                                                <div class="banner_img">
                                                    <img src="{{ $config['bannerRightUp']->getBanner() }}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        @endif

                                        @if(isset($config['bannerRightDown']))
                                        <div class="banner banner_1">
                                            <a class="banner_ins" href="{{ $config['bannerRightDown']->getLink() }}">
                                                <div class="banner_img">
                                                    <img src="{{ $config['bannerRightDown']->getBanner() }}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        @endif
									</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="megamenu_item_6">
                    <a href="{{ route('contact') }}">{{ trans("petronasvn.main_nav.contact") }}</a>
                </li>
            </ul>
            <div class="megamenu_mobile visible-xs visible-sm  col-sm-9 col-sm-push-3  sidebar_left">
                <h2>{{ $config['web_name'] }}<i></i></h2>
                <ul class="level_1">
                    <li>
                        <a href="{{ route('home') }}">{{ trans("petronasvn.main_nav.home") }}</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">{{ trans("petronasvn.main_nav.about") }}</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.list') }}">{{ trans("petronasvn.main_nav.posts") }}</a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">{{ trans("petronasvn.main_nav.products") }}</a>
                    </li>
                    <li>
                        <a href="{{ route('discountProducts') }}">{{ trans("petronasvn.main_nav.discount") }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">{{ trans("petronasvn.main_nav.contact") }}</a>
                    </li>
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
            @if($route == 'home' ||  $route == 'category' || $route == 'products' || $route == 'contact')
            <div class="widget_header_wr  col-sm-3 sidebar_left col-sm-pull-9">
                <h3 class="widget_header">{{ trans('petronasvn.category_txt') }}</h3>
            </div>
            @endif
        </div>
    </div>
    </div>