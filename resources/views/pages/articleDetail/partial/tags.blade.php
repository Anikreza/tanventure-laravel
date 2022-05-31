<!-- tags -->
<div style=" font-size:2vh;">
    <br/>
    <span class="label-primary">
                       TAGS:
                    </span>
    @foreach($article->keywords as $keyword)
        <a class="post-tag" href="{{ route('tag', ['slug' => \Str::slug($keyword->title)]) }}">
                                <span
                                    class="customTags">{{ $keyword->title }}</span>
        </a>
    @endforeach
</div>
<br/>
<br/>
<hr/>
<!-- tags -->
