<br/>
<br/>
<br/>
<div class="sectionBanner d-sm-none d-lg-block"
     style="z-index: 2; position: relative; margin-bottom: -4vh">
    <h3 style="color: white; font-family: 'Berlin Sans FB'">EXPLORE</h3>
</div>
<div style="margin: 1rem 1rem 0 1rem; z-index: -2">
    <div class="d-lg-flex d-sm-none">
        @foreach($featuredPosts as $article)
            <div style="width: 100vw">
                <div class="contentHover ">
                    <a href="{{ route('article-details', ['slug' => $article['slug'.'_'.app()->getLocale()]]) }}">
                        <div class="content-overlay-dense"></div>
                        <img src="{{asset($article['image'])}}"
                             style="min-width: 24vw; height: 350px; object-fit: cover" alt="title"/>
                        <div class="content-details-dense">
                            <p style="font-size: 1.3vw;">{{$article['title']}}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br/>
<br/>
<br/>
