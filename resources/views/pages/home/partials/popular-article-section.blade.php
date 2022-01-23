<section class="latest-article-section animate__animated animate__fadeInDown" style="--animate-duration: 800ms">
    <div class="row">
        <div class="col col-12 col-md-4 col-sm-12 ad-wrapper">
            @if(env('APP_ENV') == 'production' && $popularArticleAd)
                @if($popularArticleAd->is_google)
                    <div class="mb-20">
                        {!! $popularArticleAd->formatted_content !!}
                    </div>
                @else
                    <a href="{{ $popularArticleAd->location }}" target="_blank">
                        <figure class="figure w-100">
                            {!! $popularArticleAd->formatted_content !!}
                        </figure>
                    </a>
                @endif
            @endif

            @php $fArticle = $articleCollection[count($articleCollection) - 1] @endphp

            @if(isset($fArticle['title']))
                <div class="thumbnail-card-with-description">
                    @include('components/cards/thumbnail-card-with-description',
                       [
                           'title' => $fArticle['title'],
                           'slug' => $fArticle['slug'],
                           'image' => $fArticle['thumb_image_url'],
                           'category' => $fArticle['categories'][0]['name'],
                           'description' => $fArticle['excerpt']
                       ])
                </div>
            @endif
        </div>

        <div class="col col-12 col-md-8 col-sm-12 list-wrapper">
            <h1 class="section-title">
                Meistgelesene Artikel
            </h1>

            <div class="popular-articles">
                @foreach($articleCollection->slice(0, -1) as $i => $article)
                    <div class="items">
                        <span class="index"> {{ $i+1 }}</span>
                        <div class="article">
                            @include('components/cards/thumbnail-card-with-outline-info',[
                           'title' => $article['title'],
                           'slug' => $article['slug'],
                           'category' => $article['categories'][0]['name'],
                           'viewed' => $article['viewed'] . ' Aufrufe',
                       ])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

