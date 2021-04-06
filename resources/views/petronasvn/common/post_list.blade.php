@foreach($data as $post)
<div class="blog_listing__article">
    <h2 class="article_title">
        <a href="{{ $post->getLink() }}">{{ $post->getTitle() }}</a>
    </h2>
    <div class="article_info">
        <time class="article_date" datetime="2016-05-04">{{ Utils::formatDate($post->created_at) }}</time>
        <span class="article_author">Administrator</span>
    </div>
    <div class="article_body">
        <div class="article_img small_width"><img src="{{ $post->getPhoto() }}" alt="{{ $post->getTitle() }}"></div>
        <div class="article_content rte">
            {!! $post->getShortSummary(300) !!}
        </div>
    </div>
    <div class="article_footer">
        <a class="btn" href="{{ $post->getLink() }}">Chi tiết</a>
    </div>
</div>
@endforeach