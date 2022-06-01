<!-- similar Posts -->
<div class="wgs">
    <div class="section-head">
        <h4 class="label-primary" style="font-weight: 500; font-size: 3vh">{{trans('general.relatedPost')}}</h4>
    </div>
    <div class="row gutter-vr-30px">
        @foreach($similarArticles as $article)
            <div class="col-12">
                <div class="post post-full post-v2 customSimilarPostContainer">
                    @include('component.card.similarArticle',
                           [
                               'time'=>$article['created_at'],
                               'image' => $article['image'],
                               'title' => $article['title'.'_'.app()->getLocale()],
                               'slug' => $article['slug'.'_'.app()->getLocale()],
                               'category' => $article['categories'][0],
                           ])
                </div><!-- .post -->
            </div><!-- .col -->
        @endforeach
    </div><!-- .row -->
</div><!-- .wgs -->
