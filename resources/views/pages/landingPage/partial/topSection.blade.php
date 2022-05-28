<div class="customBlogTop" style="background-image:url({{asset('assets/images/2.png')}});background-size: contain; filter: blur(4px); opacity: .4;"><</div>
<div class="section section-l section-news " style="position: absolute; top: 0;">
    <br/>
    <div class="customContainer">
        <div class="row gutter-vr-30px justify-content-sm-center">
            @foreach($articles as $key=> $article)
                <div class="custom4Column text-center  w3-animate-zoom">
                    <div class="post post-full post-v2">
                        @include('component.card.topSectionCard',
                            [
                                'key'=>$key,
                                'time'=>$article['created_at'],
                                'image' => $article['image'],
                                'title' => $article['title'],
                                'slug' => $article['slug'],
                                'description' => $article['excerpt'],
                                'category' => $category ?? $article['categories'][0],
                            ])
                    </div>
                </div><!-- .col -->
            @endforeach
        </div><!-- .row -->
    </div>
</div><!-- .container -->


