<div style="background-image:url({{asset('assets/images/2.png')}});background-size: contain; filter: blur(4px); opacity: .4; height: 1150px"><</div>
<div class="section section-l section-news " style="position: absolute; top: 0;">
    <br/>
    <div class="customContainer">
        <div class="row gutter-vr-30px">
            @foreach($articles as $key=> $article)
                <div class="col-md-6"
                >
                    <div class="post post-full post-v2">
                        @include('component.card.topSectionCard',
                            [
                                'key'=>$key,
                                'time'=>$article['created_at'],
                                'image' => $article['image'],
                                'title' => $article['title'],
                                'slug' => $article['slug'],
                                'category' => $category ?? $article['categories'][0],
                            ])
                    </div>
                </div><!-- .col -->
            @endforeach
        </div><!-- .row -->
    </div>
</div><!-- .container -->


