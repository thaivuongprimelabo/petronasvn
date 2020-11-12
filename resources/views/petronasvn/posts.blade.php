@extends('layouts.petronasvn')
@section('content')
<div id="main" role="main">
	<div class="container">
		<div class="row">
			<section class="main_content  col-sm-8 col-sm-push-4">
				<!-- BREADCRUMBS -->
				@include('petronasvn.common.breadcrumb', ['page2' => ['name' => 'Bài viết'] ])
				<h2 class="page_heading"><a href="/blogs/news">Blog</a> <a href="/blogs/news.atom" target="_blank"></a></h2>
				<div id="post_list"></div>
			</section>
			<aside class="sidebar col-sm-4 sidebar_left col-sm-pull-8">
				<div class="sidebar_widget sidebar_blog sidebar_widget__search" style="display:none">
					
				</div>
				<div class="sidebar_widget sidebar_blog sidebar_widget__articles">
					<h3 class="widget_header">Recent articles</h3>
					<div class="widget_content">
						<ul id="list_articles" class="list_articles">
							
						</ul>
					</div>
				</div>
			</aside>
		</div>
	</div>
    <input type="hidden" id="last_id" value="0" />
</div>
<script type="text/javascript">
    jQuery(function($) {

        $.fn.loadData = function (limit, pageName) {
            let _this = this;
            let lastId = $('#last_id').val();
            
            $.ajax({
                url: '{{ route('loadData') }}',
                type: 'post',
                async : true,
                data: {
                    lastId: lastId,
                    limit: limit,
                    page_name: pageName
                },
                beforeSend: function() {
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    _this.append(res.html);
                }
            })
        };

        $('#post_list').loadData(3, 'posts');
        $('#list_articles').loadData(3, 'recent_articles');

        $('#load_more').click(function(e) {
            $('.post_list').loadData();
        })
    });
</script>
@endsection