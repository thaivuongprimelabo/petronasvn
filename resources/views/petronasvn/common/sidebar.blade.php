<aside class="sidebar col-sm-3 sidebar_left col-sm-pull-9">
    <div class="sidebar_widget sidebar_widget__collections">
        <h3 class="widget_header">{{ trans('petronasvn.category_txt') }}</h3>
        <div class="widget_content">
            <ul class="list_links">
                @foreach($categories as $category)
                <li class="accessories">
                    <a href="{{ $category->getLink() }}" title="{{ $category->getName() }}">{{ $category->getName() }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <section class="sidebar_widget sidebar_widget__products">
        <h3 class="widget_header">{{ trans('petronasvn.new_product_txt') }}</h3>
        <div class="widget_content">
            <ul class="list_products products_specials">
                @foreach($newProducts as $product)
                <li class="product">
                    <div class="product_img">  
                        <a href="{{ $product->getLink() }}">
                            <img src="{{ $product->getFirstImage() }}" alt="{{ $product->getName() }}" />
                        </a>
                        @if($product->getDiscount())
                        <span class="product_badge sale">{{ $product->getDiscount() }}</span>
                        @endif
                    </div>
                    <div class="product_info">
                        <div class="product_name">
                            <a href="{{ $product->getLink() }}">{{ $product->getName() }}</a>
                        </div>
                        @if($product->getDiscount())
                        <div class="product_price product_price_compare">
                            <span class="money">{{ $product->getPriceDiscount() }}</span>
                            <span class="money compare-at-price">{{ $product->getPrice() }}</span>
                        </div>
                        @else if
                        <div class="product_price">
                            <span class="money">{{ $product->getPrice() }}</span>
                        </div>
                        @endif
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section class="sidebar_widget sidebar_widget__products">
        <h3 class="widget_header">{{ trans('petronasvn.best_selling_txt') }}</h3>
        <div class="widget_content">
            <ul class="list_products">
                @foreach($bestSellerProducts as $product)
                <li class="product">
                    <div class="product_img">  
                        <a href="{{ $product->getLink() }}">
                            <img src="{{ $product->getFirstImage() }}" alt="{{ $product->getName() }}" />
                        </a>
                    </div>
                    <div class="product_info">
                        <div class="product_name">
                            <a href="{{ $product->getLink() }}">{{ $product->getName() }}</a>
                        </div>
                        <div class="product_price">
                            <span class="money">{{ $product->getPrice() }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
</aside>