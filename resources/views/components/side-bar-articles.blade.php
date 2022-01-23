<div class="sidebar sticky-top">
    <div class="section-title">
        <span>
            {{ $sectionTitle }}
        </span>
    </div>

    <div id="sidebar-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($articles as $i=>$article)
                <div class="carousel-item @if($i == 0) active @endif">
                    <a href="{{ route('article-details', ['slug' =>  $article['slug']]) }}">
                        <img src="{{ $article['thumb_image_url'] }}"
                             class="d-block"
                             alt="{{ $article['title'] }}">
                    </a>

                    <div class="item-meta-info">
                        <div class="carousel-caption text-start">
                            <h3>
                                <a href="{{ route('article-details', ['slug' =>  $article['slug']]) }}">{{ $article['title'] }}</a>
                            </h3>

                            @if(isset($article['excerpt']))
                                <p>{{ Str::limit($article['excerpt'], 150, '...') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="direction-wrapper">

            <button class="carousel-control-prev" type="button" data-bs-target="#sidebar-carousel" data-bs-slide="prev">
                <i class="material-icons material-icons-outlined">chevron_left</i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sidebar-carousel" data-bs-slide="next">
                <i class="material-icons material-icons-outlined">chevron_right</i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    @if(env('APP_ENV') == 'production' && isset($adInfo))
        <div class="ad-section mt-4">
            @if($adInfo->is_google)
                {!! $adInfo->formatted_content !!}
            @else
                <a href="{{ $adInfo->location }}" target="_blank">
                    <figure class="figure w-100">
                        {!! $adInfo->formatted_content !!}
                    </figure>
                </a>
            @endif
        </div>
    @endif
</div>
