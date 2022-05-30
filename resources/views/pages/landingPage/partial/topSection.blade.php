{{--<div class="customBlogTop" style="filter: blur(8px); opacity: .4;"></div>--}}
<div class="section section-l section-news ">
{{--    customBlogContainer--}}
    @include('pages.landingPage.partial.banner')
    <br/>
    <div class="customContainer">
        <div class="row gutter-vr-30px justify-content-sm-center">
            @foreach($articles as $key=> $article)
                <div class="custom4Column text-center  w3-animate-zoom" >
                    <a href="{{ route('article-details', ['slug' =>  $article['slug']]) }}">
                    <div class="post post-full post-v2 postContainer">
                        @include('component.card.topSectionCard',
                            [
                                'key'=>$key,
                                'time'=>$article['created_at'],
                                'image' => $article['image'],
                                'title' => $article['title'],
                                'slug' => $article['slug'],
                                'author' => $article['author']['name'],
                                'description' => $article['excerpt'],
                                'category' => $category ?? $article['categories'][0],
                            ])
                    </div>
                    </a>
                </div><!-- .col -->
            @endforeach
        </div><!-- .row -->
    </div>
</div><!-- .container -->


