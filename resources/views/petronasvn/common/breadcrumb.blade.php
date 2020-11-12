<div class="breadcrumb_wrap">
    <ul class="breadcrumb">
        <li><a href="/" class="homepage-link" title="Back to the frontpage">Trang chủ</a></li>
        @if(isset($page1))
        <li><a href="{{ $page1['link'] }}" title="">{{ $page1['name'] }}</a> </li>
        @endif
        @if(isset($page2))
        <li><span class="page-title">{{ $page2['name'] }}</span></li>
        @endif
    </ul>
</div>