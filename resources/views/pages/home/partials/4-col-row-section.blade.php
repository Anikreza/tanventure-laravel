<section class="four-col-section animate__animated animate__fadeInDown"
         style="--animate-duration: {{ $animationDuration ?? '600ms' }}">
    <div class="row row-wrapper">
        @foreach($articles as $article)
            <div class="col col-12 @if(count($articles) == 4) col-md-3 col-sm-6 @else col-md-4 col-sm-12 @endif">
                @include('components/cards/thumbnail-card-with-outline-info',
                    [
                        'image' => $article['thumb_image_url'],
                        'title' => $article['title'],
                        'slug' => $article['slug'],
                        'category' => $category ?? $article['categories'][0]['name'],
                        'readTime' => $article['read_time']
                    ])
            </div>
        @endforeach
    </div>
</section>
