<div class="customContainer">
        @foreach($featuredArticles as $article)
                <div >
                    @include('component.card.sliderCard',
                        [
                            'image' => $article['image'],
                            'title'=>$article['title'],
                            'slug' => $article['slug'],
                            'description' => $article['excerpt'],
                            'category' => $category ?? $article['categories'][0],
                        ])
                </div>
        @endforeach
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
</div>

