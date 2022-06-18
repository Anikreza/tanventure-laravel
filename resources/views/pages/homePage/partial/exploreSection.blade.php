<br/>
<div style="margin: .1rem 1rem 0 1rem;">
    <h3 class="paddedHeaderTilted">EXPLORE</h3>
    <br/>
    <div class="d-lg-flex">
        @foreach($featuredPosts as $article)
            <div style="width: 100vw">
                <div class="contentHover exploreSection" style="z-index: 3">
                    <a href="{{ route('article-details', ['slug' => $article['slug'.'_'.app()->getLocale()]]) }}">
                        <div class="content-overlay-dense"></div>
                        <img src="{{asset($article['image'])}}"
                             style="min-width: 22vw; height: 350px;  transform: rotate(-2deg); object-fit: cover"
                             alt="title"
                        />
                        <div class="content-details-dense">
                            <p style="font-size: 1.3vw;">{{$article['title'.'_'.app()->getLocale()]}}</p>
                        </div>
                    </a>
                </div>
                <p class="d-sm-block d-lg-none" style="font-size: 2vh; transform: rotate(-2deg); margin: 2%  10%">
                    {{$article['excerpt'.'_'.app()->getLocale()]}}
                </p>
            </div>
        @endforeach
    </div>
</div>
{{--<br/>--}}
{{--<br/>--}}
{{--<br/>--}}
