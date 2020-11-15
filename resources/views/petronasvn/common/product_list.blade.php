@php
    if(!isset($route)) {
        $route = Route::currentRouteName();
    }
    $minHeight = 157;
    if($route !== 'home') {
        $minHeight = '188';
    }
    $count = 1;

    
@endphp
@foreach($data as $product)
    @if($route == 'home')
    <div class="product product_homepage swiper-slide">
    @endif

    @if($route == 'category' || $route === 'products')
    <div class="product col-xs-6 col-sm-6 col-md-4 product_collection item3_{{ $count }} item2_1">
    @endif
        <div class="product_wrapper">
            <div class="product_img"  >
                <a class="img_change" href="{{ $product->getLink() }}">
                    <span class="product_img_wr" style="min-height: {{ $minHeight }}px">
                        <img src="{{ $product->getFirstImage() }}" alt="{{ $product->getName() }}" title="{{ $product->getName() }}" style="max-width: 100%; height:auto" />
                    </span>
                <span class="product_badge new">New</span>
                @if($product->getDiscount())
                <span class="product_badge sale">–{{ $product->getDiscount() }}%</span>
                @endif
                </a>
            </div>
            <div class="product_info">
                <div class="product_name">
                    <a href="{{ $product->getLink() }}" title="{{ $product->getName() }}">{{ $product->getShortName() }}</a>
                </div>
                @if($product->getDiscount())
                <div class="product_price product_price_compare">
                    <span class="money">{{ $product->getPriceDiscount() }}</span>
                    <span class="money money_sale">{{ $product->getPrice() }}</span>
                </div>
                @else
                <div class="product_price">
                    <span class="money">{{ $product->getPrice() }}</span>
                </div>
                @endif
                <div class="product_links">
                    <form method="post" action="#">
                        <a class="btn btn_options add_to_cart" data-image="{{ $product->getFirstImage() }}" data-pid="{{ $product->id }}" href="javascript:void(0)" title="Add to cart">{{ trans('petronasvn.cart.add_to_cart_txt') }}</a>
                    </form>
                    <a class="btn_icon btn_icon material-icons-info_outline" href="{{ $product->getLink() }}"></a>
                    <a class="btn_icon quick_view_btn material-icons-remove_red_eye" href="{{ $product->getLink() }}"></a>
                </div>
            </div>
        </div>
    </div>
    @php
        $count++;
        if($count > 3) {
            $count = 1;
        }
    @endphp
@endforeach