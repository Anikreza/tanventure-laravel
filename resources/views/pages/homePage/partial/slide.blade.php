<div class="customContainer">
        @foreach($featuredArticles as $article)
                    @include('component.card.sliderCard',
                        [
                            'image' => $article['image'],
                            'title'=>$article['title'.'_'.app()->getLocale()],
                            'slug' => $article['slug'.'_'.app()->getLocale()],
                            'description' => $article['excerpt'.'_'.app()->getLocale()],
                            'category' => $category ?? $article['categories'][0],
                        ])
        @endforeach
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
</div>

