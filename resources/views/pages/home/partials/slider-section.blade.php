<section class="featured-post-section animate__animated animate__fadeInDown" style="--animate-duration: 200ms">
    <div class="row">
        @if(isset($slidersArticles[0]))
            <div class="col col-md-6 col-sm-12 col-12  feature-col-left">
                @include('components/cards/thumbnail-card',
                    [
                        'image' => $slidersArticles[0]['image_url'],
                        'title' => $slidersArticles[0]['title'],
                        'slug' => $slidersArticles[0]['slug'],
                        'category' => $slidersArticles[0]['categories'][0]['name'],
                        'readTime' => $slidersArticles[0]['read_time']
                    ])
            </div>
        @endif

        <div class="col">
            <div class="row">
                @if(isset($slidersArticles[1]))
                    <div class="col col-12 col-sm-6 feature-col-right top">
                        @include('components/cards/thumbnail-card',
                            [
                                'image' => $slidersArticles[1]['image_url'],
                                'title' => $slidersArticles[1]['title'],
                                'slug' => $slidersArticles[1]['slug'],
                                'category' => $slidersArticles[1]['categories'][0]['name'],
                                'readTime' => $slidersArticles[1]['read_time']
                            ])
                    </div>
                @endif

                @if(isset($slidersArticles[2]))
                    <div class="col col-12 col-sm-6  feature-col-right top">
                        @include('components/cards/thumbnail-card',
                           [
                                'image' => $slidersArticles[2]['image_url'],
                                'title' => $slidersArticles[2]['title'],
                                'slug' => $slidersArticles[2]['slug'],
                                'category' => $slidersArticles[2]['categories'][0]['name'],
                                'readTime' => $slidersArticles[2]['read_time']
                           ])
                    </div>
                @endif
            </div>

            <div class="row">
                @if(isset($slidersArticles[3]))
                    <div class="col col-12 col-sm-12  feature-col-right bottom">
                        @include('components/cards/thumbnail-card',
                           [
                                'image' => $slidersArticles[3]['image_url'],
                                'title' => $slidersArticles[3]['title'],
                                'slug' => $slidersArticles[3]['slug'],
                                'category' => $slidersArticles[3]['categories'][0]['name'],
                                'readTime' => $slidersArticles[3]['read_time']
                           ])
                    </div>
                @endif
            </div>
        </div>
    </div>

</section>
