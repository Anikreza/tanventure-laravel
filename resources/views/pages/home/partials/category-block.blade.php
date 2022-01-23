@foreach($latestArticlesByCategoriesInOrder as $i => $category)
    <div class="category-block">
        <div class="section-title animate__animated animate__fadeInDown"
             style="--animate-duration: {{ 1200 + ($i+1) * 200 . 'ms' }}">
            <a href="{{ route('category', ['slug' => $category['slug']]) }}">
                <span>
                    {{ $category['name'] }}
                </span>
            </a>
        </div>
        @include('pages.home.partials.4-col-row-section', ['articles' => $category['articles'], 'animationDuration' => 1200 + ($i+1) * 200 . 'ms', 'category' => $category['name']])

        @if(env('APP_ENV') == 'production' && $categorySectionAd && ($i < count($latestArticlesByCategoriesInOrder) - 1))
            <div class="row">
                <div class="col col-12 category-ad-section">
                    @if($categorySectionAd->is_google)
                        <div style="width: 100%;">
                            {!! $categorySectionAd->formatted_content !!}
                        </div>
                    @else
                        <a href="{{ $categorySectionAd->location }}" target="_blank">
                            {!! $categorySectionAd->formatted_content !!}
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endforeach
