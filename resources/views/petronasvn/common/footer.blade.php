<!-- FOOTER -->
<footer>
    <div class="container">
        <section class="row">
            <div class="col-md-2 col-sm-3 footer_block footer_block__1">
            <h6>Navigation</h6>
            <ul class="footer_links">
                <li class="active"><a href="/" title="">Trang chủ</a></li>
                <li ><a href="{{ route('about') }}" title="">Giới thiệu</a></li>
                <li ><a href="{{ route('products') }}" title="">Sản phẩm</a></li>
                <li ><a href="{{ route('posts.list') }}" title="">Tin tức</a></li>
            </ul>
            </div>
            <div class="col-md-2 col-sm-3 footer_block footer_block__2">
            <h6>Khách hàng</h6>
            <ul class="footer_links">
                <li ><a href="{{ route('contact') }}" title="">Liên hệ</a></li>
                <li ><a href="{{ route('cart.checkout') }}" title="">Thanh toán</a></li>
            </ul>
            </div>
            <div class="col-md-2 col-sm-3 footer_block footer_block__3">
                <h6>Danh mục</h6>
                <ul class="footer_links">
                    @php
                        $count = 1;
                    @endphp
                    @foreach($config['categories'] as $category)
                    <li ><a href="{{ $category->getLink() }}" title="">{{ $category->name }}</a></li>
                    @php
                        $count++;
                        if($count > 4) {
                            break;
                        }
                    @endphp
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 footer_block footer_block__4">
                <h6>Hướng dẫn</h6>
                <ul class="footer_links">
                    @foreach($config['footer_pages'] as $page)
                    <li ><a href="{{ $page->getLink() }}" title="">{{ $page->name }}</a></li>
                    @endforeach
                    <li ><a href="{{ route('cart.list') }}" title="">Giỏ hàng</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 footer_block footer_block__5">
                <h6>Contacts</h6>
                <ul class="footer_contacts">
                    <li class="contacts_address"><span class="material-icons-location_on icon"></span>{{ $config['web_address'] }}</li>
                    <li class="contacts_phone"><span class="icon material-icons-phone icon"></span><a href="tel:800-2345-6789">{{ $config['web_hotline'] }}
                        </a>
                    </li>
                    <li class="contacts_email"><span class="material-icons-email icon"></span><a href="mailto:info@demolink.org">{{ $config['web_email'] }}</a>
                    <li class="contacts_time"><span class="material-icons-schedule icon"></span>{{ $config['web_working_time'] }}
                    </li>
                </ul>
            </div>
        </section>
        <section class="copyright">
            <ul class="footer_social">
            <li><a href="{{ $config['zalo_page'] }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ $config['facebook_fanpage'] }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{ $config['shopee_page'] }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <p role="contentinfo">© {{ date('Y') }} Petronas Vietnam. All rights reserved.</p>
        </section>
    </div>
</footer>