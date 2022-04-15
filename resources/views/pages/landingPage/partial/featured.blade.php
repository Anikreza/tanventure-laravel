<div class="customContainer">
    <div class="row justify-content-center">
        <h5 class="heading-xs dash dash-both">Featured Articles</h5>
    </div>
    <br/>
    <br/>
    <div class="row gutter-vr-10px justify-content-sm-center">
        @foreach($featuredArticles as $article)
            <div class="custom3Column text-center">
                <div class="post post-alt" style="background-color: {{$color}}; {{$color!=='inherit'?'-webkit-box-shadow: 5px 5px 15px rgba(0,0,0,0.4);
                       -moz-box-shadow: 5px 5px 15px rgba(0,0,0,0.4);':''}} ">
                    @include('component.card.featuredCard',
                        [
                            'image' => $article['image'],
                            'title'=>$article['title'],
                            'slug' => $article['slug'],
                            'description' => $article['excerpt'],
                            'category' => $category ?? $article['categories'][0],
                        ])
                </div><!-- .post -->
            </div><!-- .col -->
        @endforeach

    </div><!-- .row -->
</div><!-- .container -->

