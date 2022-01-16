<div class="post-thumb ">
    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        <img src={{$image}} alt="">
    </a>
</div>
<div class="post-entry  d-sm-flex d-block align-items-start">
    <div class="post-date">
        <p>Mar <strong>19</strong></p>
    </div>
    <div class="post-content post-content-s2">
        <h4 style="margin-bottom: 20px; font-weight: 400">{{ $title}}</h4>
        <div class="post-tag">
            <ul class="post-cat">
                <li>
                    <a href="{{ route('category', ['slug' =>  $category->slug]) }}"><em class="icon ti-bookmark"></em>
                        <span>{{$category->name}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
