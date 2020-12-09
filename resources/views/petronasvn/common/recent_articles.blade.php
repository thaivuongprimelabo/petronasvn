@foreach($data as $post)
<li>
    <div class="item_img"><img src="{{ $post->getPhoto() }}" alt="{{ $post->getTitle() }}"></div>
    <div class="article_content article_content__img">
        <time class="article_date" datetime="2016-05-04">{{ Utils::formatDate($post->created_at) }}</time>
        <h4 class="article_title">
            <a href="{{ $post->getLink() }}">{{ $post->getShortSummary() }}</a>
        </h4>
        <div class="clearfix"></div>
    </div>
</li>
@endforeach