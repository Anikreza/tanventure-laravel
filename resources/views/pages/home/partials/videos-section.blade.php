@if(count($latestVideos))
    <section class="videos-section animate__animated animate__fadeInDown" style="--animate-duration: 1200ms">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    Videos
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-12 col-md-9 col-sm-12 first-column">
                <div class="video-wrapper title-lg">
                    @include('components.cards.video-card-with-title',[
                        'width' => 774,
                        'height' => 435,
                        'slug' => $latestVideos[0]['slug'],
                        'title' => $latestVideos[0]['title'],
                        'poster' => $latestVideos[0]['image_url'],
                        'videoSrc' => $latestVideos[0]['description'],
                        "fromHome" => true,
                    ])
                </div>
            </div>

            <div class="col col-12 col-md-3 col-sm-12 second-column">
                @if(isset($latestVideos[1]))
                    <div class="video-wrapper mb-20 title-md">
                        @include('components.cards.video-card-with-title',[
                                        'width' => 306,
                                        'height' => 173,
                                        'slug' => $latestVideos[1]['slug'],
                                        'title' => $latestVideos[1]['title'],
                                        'poster' => $latestVideos[1]['image_url'],
                                        'videoSrc' => $latestVideos[1]['description'],
                                        "fromHome" => true,
                                    ])
                    </div>
                @endif

                @if(isset($latestVideos[2]))
                    <div class="video-wrapper title-md">
                        @include('components.cards.video-card-with-title',[
                            'width' => 306,
                            'height' => 173,
                            'slug' => $latestVideos[2]['slug'],
                            'title' => $latestVideos[2]['title'],
                            'poster' => $latestVideos[2]['image_url'],
                            'videoSrc' => $latestVideos[2]['description'],
                            "fromHome" => true,
                        ])
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <a href="{{ route('category', ['slug' => 'video']) }}">
                <div class="col text-center all-videos">
                    <button class="btn btn-danger button-general shakespear">Alle Videos</button>
                </div>
            </a>
        </div>
    </section>
@endif
