{{--<div style="background-image:url({{asset("assets/images/$key.png")}});background-size: contain; filter: blur(7px); opacity: .4; height: 24rem"><</div>--}}

<div class="post-entry d-sm-flex d-block align-items-start   w3-animate-zoom customSearchCard">
            <div class="post-content">
                <h3 style="width: 180%; margin-top: -40px; font-weight: 400"><a href="{{ route('article-details', ['slug' => $slug]) }}">{{$title}}</a></h3>

                <a href="{{ route('article-details', ['slug' => $slug]) }}">
                    <img src="{{asset($image)}}" alt="" style="width:90%; object-fit: fill; box-shadow: 3px 3px 3px 3px #000000; border-radius: 5px">
                </a>

                <div style="display: flex" >
                    <div class="post-date" style="margin-top: -30px; margin-left: -10px">
                        <p>Mar <strong>19</strong></p>
                    </div>

                    <div class="post-author d-flex align-items-center" style="padding: 1rem">
                        <a href="{{route('about')}}">
                        <div>
                            <img src="{{asset($article->author->image)}}" alt="" style="width: 5vh; height: 5vh;border-radius: 50%">
                        </div>
                        </a>
                        <div class="author-name" style="width: 150px">
                            <a href="{{route('author',['slug' => 8])}}">
                            <p style="font-size: .7rem;">{{$article->author->name}}</p>
                            </a>
                        </div>
                        <div class="post-tag d-flex" style="margin-left: 10px">
                            <ul class="post-cat">
                                <li><a href="#"><em class="icon ti-bookmark"></em> <span>{{$category}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    <div>
        <div class="content grid-sm-3" style="height: 255px;  color: #8d8d8d; overflow: hidden;width: 100%; text-align: right; margin-left: 20px; font-size: 1.3rem;font-weight: 500">
            {!! $description !!}
        </div>
        <a style="margin-left: 20px; font-weight: 300" href="{{ route('article-details', ['slug' => $slug]) }}" class="btn-primary btn-arrow">Read More</a>
    </div>
</div>
