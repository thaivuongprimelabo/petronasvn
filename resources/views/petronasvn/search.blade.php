@extends('layouts.petronasvn')
@section('content')
<!-- MAIN CONTENT -->
<div id="main" role="main">
    <div id="product_listing_preloader" class="loader_off">
        <div class="global_loader"></div>
    </div>
    <div class="container">
        <div class="row">
            <section class="main_content  col-sm-9 col-sm-push-3">
                @include('petronasvn.common.breadcrumb', [
                    'page2' => ['name' => 'Kết quả tìm kiếm']
                ])

                <div id="searchresults" class="search-scope">
                    <h1 class="page_heading">Search results for &amp;quot;{{ $keyword }}&amp;quot;</h1>
                    <form action="{{ route('search') }}" method="get" class="search_form clearfix" role="search">
                        <input class="form-control" type="text" name="q" value="{{ $keyword }}" placeholder="Search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    @if(isset($products) && count($products))
                    <ol class="search-results">
                        @foreach($products as $product)
                        <li class="search-result">     
                            <div class="product_name">
                                <a href="{{ $product->getLink() }}" title="">{{ $product->getName() }}</a>
                            </div>
                            <div class="search-result_container">
                                
                                <div class="search-result_image pull-left">
                                    <a href="{{ $product->getLink() }}" title="{{ $product->getName() }}">
                                        <img src="{{ $product->getFirstImage('small') }}">
                                    </a>
                                </div>
                                
                                <div class="product_desc">{!! $product->getDescription(200) !!}</div>        
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    @else
                        <p class="alert alert-error">Your search for "{{ $keyword }}" did not yield any results.</p>
                    @endif
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                </div>

                
            </section>
            @include('petronasvn.common.sidebar')
        </div>
    </div>
</div>
@endsection