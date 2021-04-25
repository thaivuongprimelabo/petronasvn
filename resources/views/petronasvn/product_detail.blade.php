@extends('layouts.petronasvn')
@section('content')
@php
@endphp
<div id="main" role="main">
   <div class="container">
      <div class="row">
         <section class="main_content  col-sm-12">
            <!-- BREADCRUMBS -->
            <div class="breadcrumb_wrap">
               <ul class="breadcrumb">
                  <li><a href="/" class="homepage-link" title="Back to the frontpage">{{ trans('petronasvn.main_nav.home') }}</a></li>
                  <li><a href="{{ $data->category->getLink() }}" title="Accessories">{{ $data->category->getName() }}</a> </li>
                  <li><span class="page-title">{{ $data->getName() }}</span></li>
               </ul>
            </div>
            <div itemscope="" itemtype="http://schema.org/Product" class="product-scope">
               <meta itemprop="url" content="{{ $data->getLink() }}">
               @if($data->imageProducts->first() !== null)
               <meta itemprop="image" content="{{ $data->imageProducts->first()->getImageLink() }}">
               @endif
               <div class="product_wrap">
                  <div class="row">
                     <div class="col-sm-5 col-md-4 product_images product_left">
                        <div class="elevatezoom_big_wrapper">
                           @if($data->imageProducts->first() !== null)
                              <img id="elevatezoom_big" src="{{ $data->imageProducts->first()->getImageLink('medium') }}" alt="{{ $data->getName() }}" data-zoom-image="{{ $data->imageProducts->first()->getImageLink() }}" />
                              <div class="elevatezoom_big_clicker"></div>
                           @endif
                        </div>
                        <div id="elevatezoom_gallery" class="swiper-container">
                           <div class="swiper-wrapper">
                              @foreach($data->imageProducts as $img)
                              <a class="swiper-slide" href="#" data-image="{{ $img->getImageLink('medium') }}" data-zoom-image="{{ $img->getImageLink() }}">
                                 <img src="{{ $img->getImageLink('small') }}" alt="{{ $data->getName() }}" />
                              </a>
                              @endforeach
                           
                           </div>
                           <div id="elevatezoom_gallery__prev" class="swiper_btn btn_prev"></div>
                           <div id="elevatezoom_gallery__next" class="swiper_btn btn_next"></div>
                        </div>
                     </div>
                     <div class="col-sm-7 col-md-8">
                        <form action="/cart/add" method="post" enctype="multipart/form-data" id="product-actions">
                           <div class="product_info__wrapper">
                              <div class="product_info__left">
                                 <h1 class="product_name">{{ $data->getName() }}</h1>
                                 <!-- <div class="options clearfix">
                                    <div class="variants-wrapper ">
                                       <div class="selector-wrapper">
                                          <label for="product-select-option-0">Màu sắc</label>
                                          <select class="single-option-selector" data-option="option1" id="product-select-option-0">
                                             <option value="Black">Black</option>
                                             <option value="Blue">Blue</option>
                                             <option value="Red">Red</option>
                                             <option value="Green">Green</option>
                                          </select>
                                       </div>
                                       <div class="selector-wrapper">
                                          <label for="product-select-option-1">Dung tích</label>
                                          <select class="single-option-selector" data-option="option2" id="product-select-option-1">
                                             <option value="XL">1 lít</option>
                                             <option value="XXL">2 lít</option>
                                          </select>
                                       </div>
                                       <select id="product-select" name="id" style="display: none;">
                                          <option value="19414839107">Black / XL / Plastic - $140.00</option>
                                          <option value="19414839171">Blue / XXL / Wood - $139.00</option>
                                          <option value="19414839235">Red / XL / Plastic - $144.00</option>
                                          <option value="19414839299">Green / XXL / Rubber - $140.00</option>
                                       </select>
                                    </div>
                                 </div> -->
                                 <div class="product_details">
                                    @if($data->category !== null)
                                    <p class="product_details__item product_collections"><b>Danh mục:</b> <a href="{{ $data->category->getLink() }}">{{ $data->category->getName() }}</a></p>
                                    @endif

                                    @if($data->vendor !== null)
                                    <p class="product_details__item product_vendor"><b>Nhà cung cấp:</b> <a href="{{ $data->vendor->getLink() }}" title="Computers">{{ $data->vendor->getName() }}</a></p>
                                    @endif
                                 </div>
                                 <div class="product_details">
                                    
                                 </div>
                              </div>
                              <div class="product_info__right">
                                 <div id="product_price">
                                    @if($data->discount > 0)
                                    <p class="price product-price"><span class="money">{{ $data->getPriceDiscount() }}</span><span class="money compare-at-price money_sale">{{ $data->getPrice() }}</span><span class="money_sale_percent">– {{ $data->discount }}%</span></p>
                                    @else
                                    <p class="price product-price"><span class="money">{{ $data->getPrice() }}</span></p>
                                    @endif
                                 </div>
                                 @if($data->avail_flg == ProductStatus::AVAILABLE) 
                                 <p class="product_details__item" id="product_quantity"><b class="aval_label">{{ trans('petronasvn.status_txt') }}:</b> <span class="notify_success">{{ trans('petronasvn.product_status.available') }}</p>
                                 @else
                                 <p class="product_details__item" id="product_quantity"><b class="aval_label">{{ trans('petronasvn.status_txt') }}:</b> <span class="notify_danger">{{ trans('petronasvn.product_status.out_of_stock') }}</p>
                                 @endif
                                 @if($data->getPrice())
                                 <div id="purchase">
                                    <label for="quantity_form">{{ trans('petronasvn.cart.qty_txt') }}:</label>
                                    <div class="quantity_box">
                                       <input id="quantity_form" type="text" name="quantity" value="1" class="quantity_input">
                                       <span class="quantity_modifier quantity_down"><i class="fa fa-minus"></i></span>
                                       <span class="quantity_modifier quantity_up"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <button class="btn btn-cart add_to_cart" type="button" data-pid="{{ $data->id }}" data-image="{{ $data->getFirstImage() }}" data-qty="1">{{ trans('petronasvn.cart.add_to_cart_txt') }}</button>
                                 </div>
                                 @endif
                                 <div class="addthis_sharing_toolbox" data-url="https://theme247-computers.myshopify.com/products/arctic-freezer-7-pro-rev-2-150-watt-multicompatible-low-noise-cpu-cooler-for-amd-and-intel-sockets" data-title="ARCTIC Freezer 7 Pro Rev 2 - 150 Watt Multicompatible Low Noise CPU Co | Computers" style="clear: both;">
                                    <div id="atstbx" class="at-share-tbx-element addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-0f453c64-3d96-4ff4-9a56-87053f6cc7fa" role="region">
                                       <span class="at4-visually-hidden">{{ trans('petronasvn.share_url') }}:</span>
                                       <div class="at-share-btn-elements">
                                          <a target="_blank" href="//www.facebook.com/sharer.php?u={{ $data->getLink() }}">
                                             <img src="{{ url('petronasvn/facebook_icon.png') }}" alt="Share to Facebook" style="width:32px; height:32px;"/>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- /.row -->
                  <div class="product_description">
                     <h3 class="product_description__title">{{ trans('petronasvn.info_txt') }}</h3>
                     <div class="rte" itemprop="description">
                        {!! $data->description !!}
                        {!! $data->summary !!}
                     </div>
                  </div>
               </div>
               <!-- /.product_wrap -->
            </div>
            <!-- See this: http://wiki.shopify.com/Related_Products -->
         </section>
      </div>
   </div>
</div>
<script src="{{ url('petronasvn/s/files/1/1265/3751/t/2/assets/jquery.elevatezoomcb43.js') }}" type="text/javascript"></script>

<script>
   jQuery(function($) {
      // THUMBS SLIDER
      var quickViewGallery = new Swiper('#elevatezoom_gallery', {
         // width: 302,
         loop: true,
         speed: 500,
         slidesPerView: 4,
         spaceBetween: 10,
         prevButton: '#elevatezoom_gallery__prev',
         nextButton: '#elevatezoom_gallery__next',
         breakpoints: {
            1199: {
               slidesPerView: 3
            }
         }
      });


      $(window).load(function(){
         
            // PRODUCT IMAGE ZOOM
            $("#elevatezoom_big").elevateZoom({
               gallery : "elevatezoom_gallery",
               zoomActivation: "hover",
               zoomType : "window",
               scrollZoom : true,
               zoomWindowFadeIn : 500,
               zoomLensFadeIn: 500,
               imageCrossfade: true,
               zoomWindowWidth : 370,
               zoomWindowHeight : 370,
               zoomWindowOffetx : 15,
               zoomWindowOffety : 0,
               borderSize : 1,
               borderColour : "#e7e8ea"
            });


            $(document).on('click', '.elevatezoom_big_clicker', function() {
               $('.zoomLens').trigger('click');
            });


            // BIG IMAGE FANCYBOX
            $("#elevatezoom_big").bind("click", function() {
               $.fancybox( $('#elevatezoom_big').data('elevateZoom').getGalleryList() );
               return false;
            });

            $('.quantity_down').click(function(e) {
                  let qty = Number($('.quantity_input').val());
                  if(qty === 1) return false;
                  qty -= 1;
                  $('.quantity_input').val(qty);
                  $('.add_to_cart').attr('data-qty', qty);
            })

            $('.quantity_up').click(function(e) {
                  let qty = Number($('.quantity_input').val());
                  if(qty === 99) e.preventDefault();
                  qty += 1;
                  $('.quantity_input').val(qty);
                  $('.add_to_cart').attr('data-qty', qty);
            })
         
      });
   });
</script>
@endsection