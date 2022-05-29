<div class="post-thumb">
    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <img src={{asset($image)}} alt="" style="box-shadow: 4px 4px 4px 4px #414141; border-radius: 8px">
    </a>
</div>
<div class="post-entry d-sm-flex d-block align-items-start">
    <div class="post-date" >
        <p style="font-size: 2vh">{{$time->translatedFormat('M')}} <strong style="font-weight: lighter; font-size: 2vh">'{{$time->translatedFormat('y')}}</strong></p>
    </div>
    <div class="post-content post-content-s2">
        <h4 style="margin-bottom: 20px; font-weight: 400; font-size: 2.5vh">{{ $title}}</h4>
        <div class="post-tag">
            <ul class="post-cat">
                <li style="font-size: 1.5vh">
                    <a href="{{ route('category', ['slug' =>  $category->slug]) }}"><em class="icon ti-bookmark"></em>
                        <span>{{$category->name}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
