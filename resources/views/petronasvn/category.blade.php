@extends('layouts.petronasvn')
@section('content')
@php
    $products = $data->getProductInCategory('', true, 6);
    $lastId = $products[(count($products) - 1)]->id;
@endphp
<div id="main" role="main">
    <div class="container">
        <div class="row">
        <section class="main_content  col-sm-9 col-sm-push-3">
            <!-- BREADCRUMBS -->
            <div class="breadcrumb_wrap">
                <ul class="breadcrumb">
                    <li><a href="/" class="homepage-link" title="Back to the frontpage">Trang chủ</a></li>
                    <li><span class="page-title">{{ $data->name }}</span></li>
                </ul>
            </div>
            <!-- products sorting -->
            <div class="product_listing_controls">
                <ul class="product_listing_toggle">
                    <li id="toggle_grid" class="active"><i class="fa fa-th"></i></li>
                </ul>
                <div class="sort_by">
                    <label>Sort by</label>
                    <select id="sort_by_select" class="form-control">
                        <option value="manual" selected="selected">Featured</option>
                        <option value="best-selling">Best selling</option>
                        <option value="title-ascending">Name: A to Z</option>
                        <option value="title-descending">Name: Z to A</option>
                        <option value="price-ascending">Price: low to high</option>
                        <option value="price-descending">Price: high to low</option>
                        <option value="created-ascending">Oldest to newest</option>
                        <option value="created-descending">Newest to oldest</option>
                    </select>
                </div>
                <div class="show_products">
                    <label>Show</label>
                    <select id="show_products_select" class="form-control">
                        <option value="6" selected="selected">6</option>
                        <option value="9">9</option>
                        <option value="15">15</option>
                        <option value="all">All</option>
                    </select>
                </div>
            </div>
            <div id="product_listing_preloader" class="loader_off">
                <div class="global_loader"></div>
            </div>
            <div id="collection_sorted" style="opacity: 1;">
                <div class="product_listing_main row">
                    @php
                        $count = 1;
                    @endphp
                    @foreach($products as $product)
                    <div class="product col-xs-6 col-sm-6 col-md-4 product_collection item3_{{ $count }} item2_1">
                    @include('petronasvn.common.product_list', ['product' => $product])
                    </div>
                    @php
                        $count++;
                        if($count > 3) {
                            $count = 1;
                        }
                    @endphp
                    @endforeach
                </div>
                <div class="product_listing_controls">
                    <p class="products_count">
                        1&nbsp;–&nbsp;5&nbsp;products of 5
                    </p>
                </div>
            </div>
            </section>
            @include('petronasvn.common.sidebar')
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function($) {
        $('#show_products_select').change(function(e) {
            let limit = e.target.value;
            alert(limit);
            $.ajax({
                url: '{{ route('loadData') }}',
                type: 'post',
                async : true,
                data: {
                    id: '{{ $data->id }}',
                    lastId: '{{ $lastId }}',
                    limit: limit,
                    page_name: 'category-page'
                },
                beforeSend: function() {
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    console.log(res);
                }
            })
            
        })
        
    });
</script>
@endsection