<div style="height: 15vh; text-align: right">
    <h2 class="paddedHeader">আমার লেখাগুলো...</h2>
</div>
<div style="margin: 1rem 1rem 0 1rem; z-index: -2">
    <div class="d-lg-flex flex-wrap d-sm-block" style="width: 97vw;margin-left: -3vw">
        @foreach($authorArticles as $article)
            <div class="contentHover exploreSection">
                <a href="{{ route('article-details', ['slug' => $article['slug']]) }}">
                    <div class="content-overlay-dense"></div>
                    <img src="{{asset($article['image'])}}" alt="title"/>
                    <div class="content-details-dense">
                        <p style="font-size: 2.8vh;">{{$article['title']}}</p>
                    </div>
                    <div class="d-lg-none d-sm-block exploreSectionText">
                        <p>
                            {{$article['title']}}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="col-md-12 order-md-last">
            <div class="button-area pagination-area">
                <ul class="pagination text-center text-md-right">
                    {{ $authorArticles->render("pagination::bootstrap-4") }}
                </ul>
            </div>
        </div>
    </div>
</div>
