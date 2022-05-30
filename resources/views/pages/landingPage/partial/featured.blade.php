<div class="customContainer">
    <div class="row justify-content-center">
        <h5 class="heading-xs dash dash-both">Featured Articles</h5>
    </div>
    <br/>
    <br/>
    <div class="row gutter-vr-10px justify-content-sm-center">
        @foreach($featuredArticles as $article)
            <div class="custom3Column text-center">
                <a href="{{ route('article-details', ['slug' =>  $article['slug']]) }}">
                    <div class="post post-alt postContainer">
                        @include('component.card.featuredCard',
                            [
                                'image' => $article['image'],
                                'title'=>$article['title'],
                                'slug' => $article['slug'],
                                'author' => $article['author']['name'],
                                'description' => $article['excerpt'],
                                'category' => $category ?? $article['categories'][0],
                            ])
                    </div><!-- .post -->
                </a>
            </div><!-- .col -->
        @endforeach

    </div><!-- .row -->
</div><!-- .container -->

