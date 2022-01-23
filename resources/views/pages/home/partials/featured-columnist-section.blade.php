<div class="category-block pb-0">
    <div class="section-title animate__animated animate__fadeInDown"
         style="--animate-duration: {{ 1000 . 'ms' }}">
        <a href="{{ route('tag', ['slug' => \Str::slug($featuredColumnist['tagInfo']['title'])]) }}">
            <span>
                {{ $featuredColumnist['tagInfo']['title'] }}
            </span>
        </a>
    </div>
    @include('pages.home.partials.4-col-row-section', ['articles' => $featuredColumnist['articles'], 'animationDuration' => 1500 . 'ms'])
</div>
