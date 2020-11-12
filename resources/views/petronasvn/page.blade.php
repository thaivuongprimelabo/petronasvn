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
						<time class="article_date" datetime="2016-05-04">04 May 2016</time>
						<span class="article_author">David Braun</span>
						<span class="article_comments">1 Comments</span>
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