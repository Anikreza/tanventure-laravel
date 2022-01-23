@extends('master')

@section('scripts-above-contents')
    @if($article['is_video'])
        @include('scripts.video-plugin')
    @endif
@stop

@section('content')
    <article class="article-page-wrapper">
        <div class="row content-row">
            <div class="col col-12 col-md-8 col-sm-12 article-content animate__animated animate__fadeIn"
                 style="--animate-duration: 1500ms">
                <div class="article-meta-data">
                    <h1 class="article-title">
                        {{ $article['title'] }}
                    </h1>

                    @include('components.cards.partials.meta-info', ['readTime' => $article['read_time'],
'viewed' => $article['viewed'], 'category' => $article['categories'][0]['name'], 'categorySlug' => $article['categories'][0]['slug'], 'includeCategory' => true])
                </div>

                @if(!$article['is_video'])
                    <div class="cover-image">
                        <figure>
                            <img src="{{ $article['image_url'] }}" class="img-fluid d-block"
                                 alt="{{ $article['cover_caption'] }}">
                            @if($article['cover_caption'] && $article['cover_caption'] !== 'null')
                                <figcaption class="figure-caption highlight">
                                    {{ $article['cover_caption'] }}
                                </figcaption>
                            @endif
                        </figure>
                    </div>

                    <div class="description">
                        {!! insert_ad_into_content(5, $inArticleAd, $article['description']) !!}
                    </div>
                @else

                    <div class="description" style="margin-top: 20px">
                        <video
                            class="video-js vjs-theme-forest"
                            controls
                            preload="auto"
                            width="100%"
                            height="auto"
                            poster="{{ $article['image_url'] }}"
                            data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $article['description'] }}"}], "youtube": { "iv_load_policy": 1 } }'
                        >
                        </video>
                    </div>

                @endif

                <div class="tags">
                    <span class="label">
                        Tags:
                    </span>

                    @foreach($article->keywords as $keyword)
                        @if(!empty($keyword->title))
                            <div class="item-link">
                                <a href="{{ route('tag', ['slug' => \Str::slug($keyword->title)]) }}">
                                    <span class="badge badge-theme">{{ $keyword->title }}</span>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="social-links">
                    <span class="label">
                        Share:
                    </span>
                    @foreach($shareLinks as $key=>$link)
                        <div class="item-link">
                            <a href="{{ $link }}" target="_blank">
                                <img src="{{ asset('images/icons/'.$key.'.svg') }}" alt="{{ $key }}">
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="similar-articles">
                    <div class="section-title">
                        Ähnliche Beiträge
                    </div>

                    <div class="row">
                        @foreach($similarArticles as $article)
                            <div class="col col-12 col-md-4 col-sm-12 ">
                                <div class="col item">
                                    @include('components/cards/thumbnail-card-with-outline-info',
                                        [
                                            'image' => $article['thumb_image_url'],
                                            'title' => $article['title'],
                                            'slug' => $article['slug'],
                                            'category' => $article['categories'][0]['name'],
                                            'readTime' => $article['read_time']
                                        ])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-4 col-sm-12 sidebar-articles animate__animated animate__fadeIn"
                 style="--animate-duration: 1500ms">
                @include('components.side-bar-articles', ['articles' => $latestArticles, 'sectionTitle' => 'Aktuelles', 'adInfo' => $sidebarAd])
            </div>
        </div>
    </article>
@stop

@section('scripts')
    {{--    @include('scripts.video-plugin')--}}
@stop
