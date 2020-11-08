<!-- BREADCRUMBS -->
<section class="main_page_custom">
    <!-- SWIPER -->
    <div id="swiper" class="swiper-container">
        <div class="swiper-wrapper">
            @php
                $bannerCnt = 1;
            @endphp
            @foreach($banners as $banner)
            <div class="swiper-slide swiper-slide_1">
                <a href="{{ $banner->link }}" target="_blank">
                    <img src="{{ $banner->getBanner() }}" alt="" />
                </a>
                <!-- <div class="slider_caption ">
                    <h2 class="title1">{{ $banner->getTitle() }}</h2>
                    <h2>{{ $banner->getDescription() }}</h2>
                    <a class="btn" href="search.html">Shop now!</a>
                </div> -->
            </div>
            @endforeach
            <!-- <div class="swiper-slide swiper-slide_2">
                <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/slide2_image6009.png?v=18367236743245983755') }}" alt="" />
                <div class="slider_caption ">
                    <h2 class="title1">Mac Mini</h2>
                    <h2>Macs differ from Windows  PCs in that they run Apple’s  own operating system,  OS X.</h2>
                    <a class="btn" href="pages/about-us.html">Shop now!</a>
                </div>
            </div>
            <div class="swiper-slide swiper-slide_3">
                <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/slide3_imagee895.png?v=16389171856313299365') }}" alt="" />
                <div class="slider_caption ">
                    <h2 class="title1">MacBook Air</h2>
                    <h2>New fifth-generation  Intel Core Processors</h2>
                    <a class="btn" href="collections/all.html">Shop now!</a>
                </div>
            </div> -->
        </div>
        <div class="swiper_btn_wrapper container">
            <div id="swiper_btn_prev" class="swiper_btn"><span class="material-icons-chevron_left"></span></div>
            <div id="swiper_btn_next" class="swiper_btn"><span class="material-icons-chevron_right"></span></div>
        </div>
    </div>
    <!-- HOMEPAGE COLLECTIONS -->
    <!-- <section class="homepage_collections">
        <div class="row">
            <div class="col-sm-4 homepage_collection homepage_collection__1">
            <a href="collections/laptops.html" class="inside">
                <div class="collection_img">
                    <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/homepage_collection1_imgebdd.png?v=9412628934429165705') }}" alt="" />
                </div>
                <h2>Laptops</h2>
            </a>
            </div>
            <div class="col-sm-4 homepage_collection homepage_collection__2">
            <a href="collections/tablets-2-in-1.html" class="inside">
                <div class="collection_img">
                    <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/homepage_collection2_imge19d.png?v=14812730899292113775') }}" alt="" />
                </div>
                <h2>Tablets</h2>
            </a>
            </div>
            <div class="col-sm-4 homepage_collection homepage_collection__3">
            <a href="collections/desktops.html" class="inside">
                <div class="collection_img">
                    <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/homepage_collection3_img3354.png?v=14716178506144417331') }}" alt="" />
                </div>
                <h2>Desktops</h2>
            </a>
            </div>
        </div>
    </section> -->
    <!-- SHOWCASE CUSTOM BLOCKS -->
    <div id="showcase">
        <div class="row">
            <div class="col-sm-4 custom_showcase custom_showcase__1">
            <a class="inside" href="collections/accessories.html">
                <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/custom_showcase1_img140c.jpg?v=820591689889303691') }}" alt="" />
                <div class="showcase_text">
                    <h2>Mac</h2>
                    <h3>Book</h3>
                    <h6>Light.</h6>
                    <h6>Years ahead.</h6>
                    <span class="btn">
                    Shop now!
                    </span>
                </div>
            </a>
            </div>
            <div class="col-sm-8 custom_showcase custom_showcase__2">
            <a class="inside" href="collections/pc-sale.html">
                <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/custom_showcase2_img93b5.jpg?v=7589780684013026972') }}" alt="" />
                <div class="showcase_text">
                    <h2>-20% off</h2>
                    <h6>Smart Keyboard for 9.7-inch</h6>
                    <h6>iPad Pro</h6>
                    <span class="btn">
                    Shop now!
                    </span>
                </div>
            </a>
            </div>
            <div class="col-sm-8 custom_showcase custom_showcase__3">
            <a class="inside" href="collections/windows-10-pcs.html">
                <div class="showcase_badge">-20%</div>
                <img src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/custom_showcase3_img44ea.jpg?v=498362435097630316') }}" alt="" />
                <div class="showcase_text">
                    <h2>Accessories</h2>
                    <h6>for Mac</h6>
                    <span class="link">
                    Shop now!
                    </span>
                </div>
            </a>
            </div>
        </div>
    </div>
</section>