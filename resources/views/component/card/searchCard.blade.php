<div style="background-image:url({{asset("assets/images/$key.png")}});background-size: contain; filter: blur(3px); opacity: .4; height: 24rem"><</div>

<div class="post-entry d-sm-flex d-block align-items-start"  style="width: 62vw; position: absolute; top: 0">
            <div class="post-content">
                <h3 style="width: 180%; margin-top: -40px; font-weight: 400"><a href="{{ route('article-details', ['slug' => $slug]) }}">{{$title}}</a></h3>

                <a href="{{ route('article-details', ['slug' => $slug]) }}">
                    <img src="{{asset($image)}}" alt="" style="width:100%; object-fit: fill; box-shadow: 3px 3px 3px 3px #000000; border-radius: 5px">
                </a>

                <div style="display: flex" >
                    <div class="post-date" style="margin-top: -30px; margin-left: -10px">
                        <p>Mar <strong>19</strong></p>
                    </div>

                    <div class="post-author d-flex align-items-center" style="padding: 1rem">
                        <a href="{{route('about')}}">
                        <div class="author-thumb">
                            <img src="{{asset('assets/images/pp.jpg')}}" alt="">
                        </div>
                        </a>
                        <div class="author-name" style="width: 150px">
                            <a href="{{route('about')}}">
                            <p style="font-size: .7rem; color: #0a1015">তানভীর রেজা অনিক</p>
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
        <div class="content" style="height: 255px; overflow: hidden;width: 100%; text-align: right; margin-left: 20px; font-size: 0.9rem; font-weight: lighter; color: #09110a">
            {!! $description !!}
        </div>
        <a style="margin-left: 20px; font-weight: 300" href="{{ route('article-details', ['slug' => $slug]) }}" class="btn-primary btn-arrow">Read More</a>
    </div>
</div>
