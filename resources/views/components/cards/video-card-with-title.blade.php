<video
    class="video-js vjs-theme-forest"
    controls
    preload="auto"
    width="{{ $width }}"
    height="{{ $height }}"
    poster="{{ $poster }}"
    data-setup='{"fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $videoSrc }}"}], "youtube": { "iv_load_policy": 1 } }'
>
</video>

@if(!isset($fromHome))
    <h1 class="video-title">
        <a href="{{ route('article-details', ['slug' => $slug]) }}">
            {{ $title }}
        </a>
    </h1>
@else
    <h2 class="video-title">
        <a href="{{ route('article-details', ['slug' => $slug]) }}">
            {{ $title }}
        </a>
    </h2>
@endif
