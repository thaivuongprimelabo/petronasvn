@extends('layouts.petronasvn')
@section('content')
<!-- MAIN CONTENT -->
<div id="main" role="main">
    <div class="container">
        <div class="row">
            <section class="main_content  col-sm-9 col-sm-push-3">
                @include('petronasvn.common.carousel')
                <section class="homepage_carousel_wrapper">
                    <h2 class="page_heading">{{ trans('petronasvn.popular_txt') }}</h2>
                    <div class="homepage_carousel">
                        @php
                            $count = 1;
                        @endphp
                        @foreach($featureProducts as $chunk)
                        <div id="homepage_carousel__{{ $count }}" class="swiper-container product_listing_main product_listing_main_1">
                            <div class="swiper-wrapper">
                                @include('petronasvn.common.product_list', ['data' => $chunk])
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                        @endforeach
                        <div class="swiper_btn btn_prev" id="carousel_prev"></div>
                        <div class="swiper_btn btn_next" id="carousel_next"></div>
                        <!-- <div id="carousel_1__prev"></div>
                        <div id="carousel_1__next"></div>
                        <div id="homepage_carousel__2" class="swiper-container product_listing_main">
                            <div class="swiper-wrapper">
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-geforce-gtx-980-4gb-256-bit.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_980_4gb_256_bit_01_medium7c7f.png?v=1461669718') }}" alt="EVGA GeForce GTX 980 4GB 256 Bit" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_980_4gb_256_bit_02_medium7c7f.png?v=1461669718') }}" alt="EVGA GeForce GTX 980 4GB 256 Bit" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-geforce-gtx-980-4gb-256-bit.html">EVGA GeForce GTX 980 4GB 256 Bit</a>
                                            </div>
                                            <div class="product_desc product_desc__long">You know that computers are being applied in all spheres of society
                                            It is totally safe for environment and for the people, it runs with electricity. The most important thing is that the computer technology has great perspectives for further development and it could be called a panacea for humanity. It seems that computer is such a revolutionary ...
                                            </div>
                                            <div class="product_desc product_desc__short">You know that computers are being applied in all spheres of society
                                            It is totally safe for environment and for the people, it runs with electricity...
                                            </div>
                                            <div class="product_price">
                                            <span class="money">$170.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <input type="hidden" name="id" value="19414855107" />
                                                <button class="btn btn-cart" type="submit">Add to cart</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-geforce-gtx-980-4gb-256-bit.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-geforce-gtx-980-4gb-256-bit.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-geforce-gtx-980-ti-sc-acx-20-graphics-card-06g-p4-4993-kr.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_980_ti_sc_acx_20_graphics_card_06g_p4_4993_kr_01_medium5ab6.png?v=1461669728') }}" alt="EVGA GeForce GTX 980 Ti SC ACX 2.0+ Graphics Card 06G P4 4993 KR" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_980_ti_sc_acx_20_graphics_card_06g_p4_4993_kr_02_medium5ab6.png?v=1461669728') }}" alt="EVGA GeForce GTX 980 Ti SC ACX 2.0+ Graphics Card 06G P4 4993 KR" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–3%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-geforce-gtx-980-ti-sc-acx-20-graphics-card-06g-p4-4993-kr.html">EVGA GeForce GTX 980 Ti SC ACX 2...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We are providing a great choice of different commodities
                                            Some people are even afraid of such rapid and striking computer expansion; they state that mankind is in danger because of it. Their main argument is the problem of artificial intelligence. But we hope that all these problems will disappear soon. So, it is natural that this sphere is one o...
                                            </div>
                                            <div class="product_desc product_desc__short">We are providing a great choice of different commodities
                                            Some people are even afraid of such rapid and striking computer expansion; they state that...
                                            </div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$339.00</span>
                                            <span class="money money_sale">$350.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <a class="btn btn_options" href="products/evga-geforce-gtx-980-ti-sc-acx-20-graphics-card-06g-p4-4993-kr.html" title="Add to cart">Add to cart</a>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-geforce-gtx-980-ti-sc-acx-20-graphics-card-06g-p4-4993-kr.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-geforce-gtx-980-ti-sc-acx-20-graphics-card-06g-p4-4993-kr.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-geforce-gtx-titan-black-superclocked-g-sync-support-6gb-gddr5-384bit-06g-p4-3791-kr.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_titan_black_superclocked_g_sync_support_6gb_gddr5_384bit_06g_p4_3791_kr_01_medium5c14.png?v=1461669737') }}" alt="EVGA GeForce GTX TITAN BLACK Superclocked G Sync Support 6GB GDDR5 384bit 06G P4 3791 KR" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_titan_black_superclocked_g_sync_support_6gb_gddr5_384bit_06g_p4_3791_kr_02_medium5c14.png?v=1461669737') }}" alt="EVGA GeForce GTX TITAN BLACK Superclocked G Sync Support 6GB GDDR5 384bit 06G P4 3791 KR" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–2%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-geforce-gtx-titan-black-superclocked-g-sync-support-6gb-gddr5-384bit-06g-p4-3791-kr.html">EVGA GeForce GTX TITAN BLACK Sup...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We can satisfy customers with different claims
                                            Nowadays we have a problem of choice because we are living in society of total consumption and this process gives a negative effect. Simple customer has a problem of a lack of information. And we have a superb 24/7 support system where you can get more information about our products, terms, delivery...
                                            </div>
                                            <div class="product_desc product_desc__short">We can satisfy customers with different claims
                                            Nowadays we have a problem of choice because we are living in society of total consumption and this ...
                                            </div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$119.00</span>
                                            <span class="money money_sale">$121.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <input type="hidden" name="id" value="19414859139" />
                                                <button class="btn btn-cart" type="submit">Add to cart</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-geforce-gtx-titan-black-superclocked-g-sync-support-6gb-gddr5-384bit-06g-p4-3791-kr.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-geforce-gtx-titan-black-superclocked-g-sync-support-6gb-gddr5-384bit-06g-p4-3791-kr.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-geforce-gtx-titan-x-hybrid-12-gb-gddr5-air-water-hybrid-graphics-card-12g-p4-1999-kr.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_titan_x_hybrid_12_gb_gddr5_air_water_hybrid_graphics_card_12g_p4_1999_kr_01_medium5292.png?v=1461669748') }}" alt="EVGA GeForce GTX Titan X Hybrid 12 GB GDDR5 Air Water Hybrid Graphics Card 12G P4 1999 KR" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_titan_x_hybrid_12_gb_gddr5_air_water_hybrid_graphics_card_12g_p4_1999_kr_02_medium5292.png?v=1461669748') }}" alt="EVGA GeForce GTX Titan X Hybrid 12 GB GDDR5 Air Water Hybrid Graphics Card 12G P4 1999 KR" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-geforce-gtx-titan-x-hybrid-12-gb-gddr5-air-water-hybrid-graphics-card-12g-p4-1999-kr.html">EVGA GeForce GTX Titan X Hybrid ...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We have a great number of different but grateful customers and this fact proves that our goods are of high quality and fair price. We’re sure that no one could stay indifferent because everybody wants to get professionally made up product and pay a fair price for that.
                                            We can satisfy customers with different claims
                                            Accessories
                                            Cables
                                            External h...
                                            </div>
                                            <div class="product_desc product_desc__short">We have a great number of different but grateful customers and this fact proves that our goods are of high quality and fair price. We’re sure that ...</div>
                                            <div class="product_price">
                                            <span class="money">$39.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <button class="btn btn-cart btn-disabled" disabled="disabled">Unavailable</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-geforce-gtx-titan-x-hybrid-12-gb-gddr5-air-water-hybrid-graphics-card-12g-p4-1999-kr.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-geforce-gtx-titan-x-hybrid-12-gb-gddr5-air-water-hybrid-graphics-card-12g-p4-1999-kr.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-geforce-gtx-titan-x-hydro-copper-12-gb-gddr5-384bit-pci-express-30-12g-p4-2999-kr.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_titan_x_hydro_copper_12_gb_gddr5_384bit_pci_express_30_2012g_p4_2999_kr_01_medium79c6.png?v=1461669758') }}" alt="EVGA GeForce GTX TITAN X Hydro Copper 12 GB GDDR5, 384bit, PCI Express 3.0, 12G P4 2999 KR" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_geforce_gtx_titan_x_hydro_copper_12_gb_gddr5_384bit_pci_express_30_2012g_p4_2999_kr_02_medium79c6.png?v=1461669758') }}" alt="EVGA GeForce GTX TITAN X Hydro Copper 12 GB GDDR5, 384bit, PCI Express 3.0, 12G P4 2999 KR" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–18%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-geforce-gtx-titan-x-hydro-copper-12-gb-gddr5-384bit-pci-express-30-12g-p4-2999-kr.html">EVGA GeForce GTX TITAN X Hydro C...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We are living in the epoch of great technical progress and we are sure that new technologies are our future. You know that computers are being applied in all spheres of society. It is a tremendous achievement of mankind. It is totally safe for environment and for the people, it runs with electricity. The most important thing is that the computer...</div>
                                            <div class="product_desc product_desc__short">We are living in the epoch of great technical progress and we are sure that new technologies are our future. You know that computers are being appl...</div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$33.00</span>
                                            <span class="money money_sale">$35.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <a class="btn btn_options" href="products/evga-geforce-gtx-titan-x-hydro-copper-12-gb-gddr5-384bit-pci-express-30-12g-p4-2999-kr.html" title="Add to cart">Add to cart</a>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-geforce-gtx-titan-x-hydro-copper-12-gb-gddr5-384bit-pci-express-30-12g-p4-2999-kr.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-geforce-gtx-titan-x-hydro-copper-12-gb-gddr5-384bit-pci-express-30-12g-p4-2999-kr.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-z87-classified-lga1150-haswell-eatx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-152-hw-e878-kr.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_z87_classified_lga1150_haswell_eatx_4_dimm_dual_channel_ddr3_2666mhz_motherboard_152_hw_e878_kr_01_mediumac87.png?v=1461669768') }}" alt="EVGA Z87 Classified (LGA1150) Haswell, EATX, 4 DIMM Dual Channel DDR3 2666MHz Motherboard (152 HW E878 KR)" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_z87_classified_lga1150_haswell_eatx_4_dimm_dual_channel_ddr3_2666mhz_motherboard_152_hw_e878_kr_02_mediumac87.png?v=1461669768') }}" alt="EVGA Z87 Classified (LGA1150) Haswell, EATX, 4 DIMM Dual Channel DDR3 2666MHz Motherboard (152 HW E878 KR)" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-z87-classified-lga1150-haswell-eatx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-152-hw-e878-kr.html">EVGA Z87 Classified (LGA1150) Ha...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">You know that computers are being applied in all spheres of society
                                            It is totally safe for environment and for the people, it runs with electricity. The most important thing is that the computer technology has great perspectives for further development and it could be called a panacea for humanity. It seems that computer is such a revolutionary ...
                                            </div>
                                            <div class="product_desc product_desc__short">You know that computers are being applied in all spheres of society
                                            It is totally safe for environment and for the people, it runs with electricity...
                                            </div>
                                            <div class="product_price">
                                            <span class="money">$349.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <input type="hidden" name="id" value="19414867651" />
                                                <button class="btn btn-cart" type="submit">Add to cart</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-z87-classified-lga1150-haswell-eatx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-152-hw-e878-kr.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-z87-classified-lga1150-haswell-eatx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-152-hw-e878-kr.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/evga-z97-ftw-lga1150-atx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-142-hr-e977-kr.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_z97_ftw_lga1150_atx_4_dimm_dual_channel_ddr3_2666mhz_motherboard_142_hr_e977_kr_01_mediumf876.png?v=1461669779') }}" alt="EVGA Z97 FTW LGA1150 ATX 4 DIMM Dual Channel DDR3 2666MHz Motherboard 142 HR E977 KR" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/evga_z97_ftw_lga1150_atx_4_dimm_dual_channel_ddr3_2666mhz_motherboard_142_hr_e977_kr_02_mediumf876.png?v=1461669779') }}" alt="EVGA Z97 FTW LGA1150 ATX 4 DIMM Dual Channel DDR3 2666MHz Motherboard 142 HR E977 KR" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–9%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/evga-z97-ftw-lga1150-atx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-142-hr-e977-kr.html">EVGA Z97 FTW LGA1150 ATX 4 DIMM ...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We are providing a great choice of different commodities
                                            Some people are even afraid of such rapid and striking computer expansion; they state that mankind is in danger because of it. Their main argument is the problem of artificial intelligence. But we hope that all these problems will disappear soon. So, it is natural that this sphere is one o...
                                            </div>
                                            <div class="product_desc product_desc__short">We are providing a great choice of different commodities
                                            Some people are even afraid of such rapid and striking computer expansion; they state that...
                                            </div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$60.00</span>
                                            <span class="money money_sale">$66.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <a class="btn btn_options" href="products/evga-z97-ftw-lga1150-atx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-142-hr-e977-kr.html" title="Add to cart">Add to cart</a>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/evga-z97-ftw-lga1150-atx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-142-hr-e977-kr.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/evga-z97-ftw-lga1150-atx-4-dimm-dual-channel-ddr3-2666mhz-motherboard-142-hr-e977-kr.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/gigabyte-lga-2011-3-x99-4-memory-dimms-4-way-sli-support-atx-ddr3-2133-motherboard-ga-x99-ud3p.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/gigabyte_lga_2011_3_x99_4_memory_dimms_4_way_sli_support_atx_ddr3_2133_motherboard_ga_x99_ud3p_01_mediumcf8b.png?v=1461669789') }}" alt="Gigabyte LGA 2011 3 X99 4 Memory DIMMs 4 Way SLI Support ATX DDR3 2133 Motherboard GA X99 UD3P" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/gigabyte_lga_2011_3_x99_4_memory_dimms_4_way_sli_support_atx_ddr3_2133_motherboard_ga_x99_ud3p_02_mediumcf8b.png?v=1461669789') }}" alt="Gigabyte LGA 2011 3 X99 4 Memory DIMMs 4 Way SLI Support ATX DDR3 2133 Motherboard GA X99 UD3P" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–9%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/gigabyte-lga-2011-3-x99-4-memory-dimms-4-way-sli-support-atx-ddr3-2133-motherboard-ga-x99-ud3p.html">Gigabyte LGA 2011 3 X99 4 Memory...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We can satisfy customers with different claims
                                            Nowadays we have a problem of choice because we are living in society of total consumption and this process gives a negative effect. Simple customer has a problem of a lack of information. And we have a superb 24/7 support system where you can get more information about our products, terms, delivery...
                                            </div>
                                            <div class="product_desc product_desc__short">We can satisfy customers with different claims
                                            Nowadays we have a problem of choice because we are living in society of total consumption and this ...
                                            </div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$30.00</span>
                                            <span class="money money_sale">$33.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <input type="hidden" name="id" value="19414874691" />
                                                <button class="btn btn-cart" type="submit">Add to cart</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/gigabyte-lga-2011-3-x99-4-memory-dimms-4-way-sli-support-atx-ddr3-2133-motherboard-ga-x99-ud3p.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/gigabyte-lga-2011-3-x99-4-memory-dimms-4-way-sli-support-atx-ddr3-2133-motherboard-ga-x99-ud3p.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/kingston-digital-120gb-ssdnow-v300-sata-3-25.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/kingston_digital_120gb_ssdnow_v300_sata_3_25_01_medium4a05.png?v=1461669798') }}" alt="Kingston Digital 120GB SSDNow V300 SATA 3 2.5" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/kingston_digital_120gb_ssdnow_v300_sata_3_25_02_medium4a05.png?v=1461669798') }}" alt="Kingston Digital 120GB SSDNow V300 SATA 3 2.5" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/kingston-digital-120gb-ssdnow-v300-sata-3-25.html">Kingston Digital 120GB SSDNow V3...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We have a great number of different but grateful customers and this fact proves that our goods are of high quality and fair price. We’re sure that no one could stay indifferent because everybody wants to get professionally made up product and pay a fair price for that.
                                            We can satisfy customers with different claims
                                            Accessories
                                            Cables
                                            External h...
                                            </div>
                                            <div class="product_desc product_desc__short">We have a great number of different but grateful customers and this fact proves that our goods are of high quality and fair price. We’re sure that ...</div>
                                            <div class="product_price">
                                            <span class="money">$420.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <button class="btn btn-cart btn-disabled" disabled="disabled">Unavailable</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/kingston-digital-120gb-ssdnow-v300-sata-3-25.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/kingston-digital-120gb-ssdnow-v300-sata-3-25.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/msi-atx-ddr3-2600-lga-1150-motherboards-z97-gaming-7.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/msi_atx_ddr3_2600_lga_1150_motherboards_z97_gaming_7_01_medium18fc.png?v=1461669809') }}" alt="MSI ATX DDR3 2600 LGA 1150 Motherboards Z97 GAMING 7" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/msi_atx_ddr3_2600_lga_1150_motherboards_z97_gaming_7_02_medium18fc.png?v=1461669809') }}" alt="MSI ATX DDR3 2600 LGA 1150 Motherboards Z97 GAMING 7" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–5%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/msi-atx-ddr3-2600-lga-1150-motherboards-z97-gaming-7.html">MSI ATX DDR3 2600 LGA 1150 Mothe...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We are living in the epoch of great technical progress and we are sure that new technologies are our future. You know that computers are being applied in all spheres of society. It is a tremendous achievement of mankind. It is totally safe for environment and for the people, it runs with electricity. The most important thing is that the computer...</div>
                                            <div class="product_desc product_desc__short">We are living in the epoch of great technical progress and we are sure that new technologies are our future. You know that computers are being appl...</div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$229.00</span>
                                            <span class="money money_sale">$233.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <a class="btn btn_options" href="products/msi-atx-ddr3-2600-lga-1150-motherboards-z97-gaming-7.html" title="Add to cart">Add to cart</a>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/msi-atx-ddr3-2600-lga-1150-motherboards-z97-gaming-7.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/msi-atx-ddr3-2600-lga-1150-motherboards-z97-gaming-7.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/msi-gtx-980ti-gaming-6g-nvidia-geforce-pci-express-30-6gb-gddr5-graphics-card.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/msi_gtx_980ti_gaming_6g_nvidia_geforce_pci_express_30_6gb_gddr5_graphics_card_01_mediumff44.png?v=1461669819') }}" alt="MSI GTX 980Ti GAMING 6G - NVIDIA GeForce PCI Express 3.0 6GB GDDR5 Graphics Card" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/msi_gtx_980ti_gaming_6g_nvidia_geforce_pci_express_30_6gb_gddr5_graphics_card_02_mediumff44.png?v=1461669819') }}" alt="MSI GTX 980Ti GAMING 6G - NVIDIA GeForce PCI Express 3.0 6GB GDDR5 Graphics Card" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/msi-gtx-980ti-gaming-6g-nvidia-geforce-pci-express-30-6gb-gddr5-graphics-card.html">MSI GTX 980Ti GAMING 6G - NVIDIA...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">You know that computers are being applied in all spheres of society
                                            It is totally safe for environment and for the people, it runs with electricity. The most important thing is that the computer technology has great perspectives for further development and it could be called a panacea for humanity. It seems that computer is such a revolutionary ...
                                            </div>
                                            <div class="product_desc product_desc__short">You know that computers are being applied in all spheres of society
                                            It is totally safe for environment and for the people, it runs with electricity...
                                            </div>
                                            <div class="product_price">
                                            <span class="money">$28.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <input type="hidden" name="id" value="19414881091" />
                                                <button class="btn btn-cart" type="submit">Add to cart</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/msi-gtx-980ti-gaming-6g-nvidia-geforce-pci-express-30-6gb-gddr5-graphics-card.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/msi-gtx-980ti-gaming-6g-nvidia-geforce-pci-express-30-6gb-gddr5-graphics-card.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/samsung-850-evo-500gb-25-inch-sata-iii-internal-ssd.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/samsung_850_evo_500gb_25_inch_sata_iii_internal_ssd_01_medium0a71.png?v=1461669832') }}" alt="Samsung 850 EVO 500GB 2.5 Inch SATA III Internal SSD" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/samsung_850_evo_500gb_25_inch_sata_iii_internal_ssd_02_medium0a71.png?v=1461669832') }}" alt="Samsung 850 EVO 500GB 2.5 Inch SATA III Internal SSD" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–13%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/samsung-850-evo-500gb-25-inch-sata-iii-internal-ssd.html">Samsung 850 EVO 500GB 2.5 Inch S...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We are providing a great choice of different commodities
                                            Some people are even afraid of such rapid and striking computer expansion; they state that mankind is in danger because of it. Their main argument is the problem of artificial intelligence. But we hope that all these problems will disappear soon. So, it is natural that this sphere is one o...
                                            </div>
                                            <div class="product_desc product_desc__short">We are providing a great choice of different commodities
                                            Some people are even afraid of such rapid and striking computer expansion; they state that...
                                            </div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$95.00</span>
                                            <span class="money money_sale">$109.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <a class="btn btn_options" href="products/samsung-850-evo-500gb-25-inch-sata-iii-internal-ssd.html" title="Add to cart">Add to cart</a>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/samsung-850-evo-500gb-25-inch-sata-iii-internal-ssd.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/samsung-850-evo-500gb-25-inch-sata-iii-internal-ssd.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/visiontek-radeon-r9-390-8gb-gddr5-pci-express-graphics-card.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/visiontek_radeon_r9_390_8gb_gddr5_pci_express_graphics_card_01_medium3836.png?v=1461669841') }}" alt="VisionTek Radeon R9 390 8GB GDDR5 PCI Express Graphics Card" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/visiontek_radeon_r9_390_8gb_gddr5_pci_express_graphics_card_02_medium3836.png?v=1461669841') }}" alt="VisionTek Radeon R9 390 8GB GDDR5 PCI Express Graphics Card" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            <span class="product_badge sale">–4%</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/visiontek-radeon-r9-390-8gb-gddr5-pci-express-graphics-card.html">VisionTek Radeon R9 390 8GB GDDR...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We can satisfy customers with different claims
                                            Nowadays we have a problem of choice because we are living in society of total consumption and this process gives a negative effect. Simple customer has a problem of a lack of information. And we have a superb 24/7 support system where you can get more information about our products, terms, delivery...
                                            </div>
                                            <div class="product_desc product_desc__short">We can satisfy customers with different claims
                                            Nowadays we have a problem of choice because we are living in society of total consumption and this ...
                                            </div>
                                            <div class="product_price product_price_compare">
                                            <span class="money">$160.00</span>
                                            <span class="money money_sale">$166.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <input type="hidden" name="id" value="19414884483" />
                                                <button class="btn btn-cart" type="submit">Add to cart</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/visiontek-radeon-r9-390-8gb-gddr5-pci-express-graphics-card.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/visiontek-radeon-r9-390-8gb-gddr5-pci-express-graphics-card.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product_homepage swiper-slide">
                                    <div class="product_wrapper">
                                        <div class="product_img">
                                            <a class="img_change" href="products/wd-black-1tb-performance-desktop-hard-drive-35-inch-sata-6-7200-rpm-64mb-cache.html">
                                            <span class="product_img_wr">
                                            <img src="{{ url('petronasvn/s/files/1/1265/3751/products/wd_black_1tb_performance_desktop_hard_drive_35_inch_sata_6_7200_rpm_64mb_cache_01_medium40af.png?v=1461669852') }}" alt="WD Black 1TB Performance Desktop Hard Drive 3.5 inch, SATA 6, 7200 RPM, 64MB Cache" />
                                            <img class="img__2" src="{{ url('petronasvn/s/files/1/1265/3751/products/wd_black_1tb_performance_desktop_hard_drive_35_inch_sata_6_7200_rpm_64mb_cache_02_medium40af.png?v=1461669852') }}" alt="WD Black 1TB Performance Desktop Hard Drive 3.5 inch, SATA 6, 7200 RPM, 64MB Cache" />
                                            </span>
                                            <span class="product_badge new">New</span>
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <div class="product_name">
                                            <a href="products/wd-black-1tb-performance-desktop-hard-drive-35-inch-sata-6-7200-rpm-64mb-cache.html">WD Black 1TB Performance Desktop...</a>
                                            </div>
                                            <div class="product_desc product_desc__long">We have a great number of different but grateful customers and this fact proves that our goods are of high quality and fair price. We’re sure that no one could stay indifferent because everybody wants to get professionally made up product and pay a fair price for that.
                                            We can satisfy customers with different claims
                                            Accessories
                                            Cables
                                            External h...
                                            </div>
                                            <div class="product_desc product_desc__short">We have a great number of different but grateful customers and this fact proves that our goods are of high quality and fair price. We’re sure that ...</div>
                                            <div class="product_price">
                                            <span class="money">$35.00</span>
                                            </div>
                                            <div class="product_links">
                                            <form method="post" action="https://theme247-computers.myshopify.com/cart/add">
                                                <button class="btn btn-cart btn-disabled" disabled="disabled">Unavailable</button>
                                            </form>
                                            <a class="btn_icon btn_icon material-icons-info_outline" href="products/wd-black-1tb-performance-desktop-hard-drive-35-inch-sata-6-7200-rpm-64mb-cache.html"></a>
                                            <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="products/wd-black-1tb-performance-desktop-hard-drive-35-inch-sata-6-7200-rpm-64mb-cache.html"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="carousel_2__prev"></div>
                        <div id="carousel_2__next"></div>
                        <div class="swiper_btn btn_prev" id="carousel_prev"></div>
                        <div class="swiper_btn btn_next" id="carousel_next"></div> -->
                    </div>
                    </section>
            </section>
            @include('petronasvn.common.sidebar')
        </div>
    </div>
</div>
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
@endsection