{{--<div class="customBlogTop" style="filter: blur(8px); opacity: .4;"></div>--}}
<div class="section section-l section-news ">
{{--    customBlogContainer--}}
    @include('pages.landingPage.partial.banner')
    <div class="customContainer">
        <div class="row gutter-vr-30px justify-content-sm-center">
            @foreach($articles as $key=> $article)
                <div class="custom4Column text-center  w3-animate-zoom" >
                    <a href="{{ route('article-details', ['slug' =>  $article['slug'.'_'.app()->getLocale()]]) }}">
                    <div class="post post-full post-v2 postContainer">
                        @include('component.card.topSectionCard',
                            [
                                'key'=>$key,
                                'time'=>$article['created_at'],
                                'image' => $article['image'],
                                'title' => $article['title'.'_'.app()->getLocale()],
                                'slug' => $article['slug'.'_'.app()->getLocale()],
                                'author' => $article['author']['name'],
                                'description' => $article['excerpt'.'_'.app()->getLocale()],
                                'category' => $category ?? $article['categories'][0],
                            ])
                    </div>
                    </a>
                </div><!-- .col -->
            @endforeach
                <div class="col-md-9 order-md-last">
                    <div class="button-area pagination-area">
                        <ul class="pagination text-center text-md-right">
                            {{ $articles->render("pagination::bootstrap-4") }}
                        </ul>
                    </div>
                </div>
        </div><!-- .row -->
    </div>
</div><!-- .container -->


