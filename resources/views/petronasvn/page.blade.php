@extends('layouts.petronasvn')
@section('content')
<div id="main" role="main">
	<div class="container">
		<div class="row">
			<section class="main_content  col-sm-12">
				<!-- BREADCRUMBS -->
                @include('petronasvn.common.breadcrumb', ['page2' => ['name' => $page->name]]);
				<h2 class="page_heading">{{ $page->name }}</h2>
				<div class="blog_article">
					<div class="article_info">
						<span class="article_author">Administrator</span>
					</div>
					<div class="article_content">
                        {!! $page->content !!}
					</div>
					
				</div>
			</section>
		</div>
	</div>
</div>
@endsection