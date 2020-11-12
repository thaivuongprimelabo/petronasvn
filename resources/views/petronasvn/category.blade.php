@extends('layouts.petronasvn')
@section('content')
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
                        <option value="is_new" selected="selected">Sản phẩm mới</option>
                        <option value="is_best_selling">Bán chạy nhất</option>
                        <option value="is_discount">Đang giảm giá</option>
                        <option value="price_ascending">Giá từ thấp -> cao</option>
                        <option value="price_descending">Giá từ cao -> thấp</option>
                    </select>
                </div>
                <div class="show_products">
                    <label>Show</label>
                    <select id="show_products_select" class="form-control">
                        <option value="6" selected="selected">6</option>
                        <option value="9">9</option>
                        <option value="15">15</option>
                        <option value="50">50</option>
                        <option value="50">100</option>
                        <option value="all">All</option>
                    </select>
                </div>
            </div>
            <div id="product_listing_preloader" class="loader_off">
                <div class="global_loader"></div>
            </div>
            <div id="collection_sorted" style="opacity: 1;">
                <div class="product_listing_main row">
                </div>
                <div class="product_listing_controls">
                    <p id="products_count" class="products_count">
                        
                    </p>
                </div>
            </div>
            </section>
            @include('petronasvn.common.sidebar')
        </div>
        <input type="hidden" id="before_limit" value="0" />
        <input type="hidden" id="last_id" value="0" />
    </div>
</div>
<script type="text/javascript">
    jQuery(function($) {

        $.fn.loadData = function () {
            let _this = this;
            let current_limit = $('#show_products_select').val();
            let sort = $('#sort_by_select').val();
            let before_limit = $('#before_limit').val();
            let limit = current_limit - before_limit;
            let lastId = $('#last_id').val();
            
            $.ajax({
                url: '{{ route('loadData') }}',
                type: 'post',
                async : true,
                data: {
                    id: '{{ $data->id }}',
                    lastId: lastId,
                    limit: limit,
                    sort: sort,
                    page_name: 'category'
                },
                beforeSend: function() {
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    _this.append(res.html);
                    $('#last_id').val(res.last_id);
                    $('#before_limit').val(current_limit);
                    $('#products_count').html((res.total ? 1 : 0) + ' - ' + ((current_limit > res.total) ? res.total : current_limit) + ' products of ' + res.total);
                }
            })
        };

        $('.product_listing_main').loadData();

        $('#show_products_select').change(function(e) {
            $('.product_listing_main').loadData();
        })

        $('#sort_by_select').change(function(e) {
            $('#before_limit').val(0);
            $('#last_id').val(0);
            $('.product_listing_main').html('');
            $('.product_listing_main').loadData();
        })
    });
</script>
@endsection