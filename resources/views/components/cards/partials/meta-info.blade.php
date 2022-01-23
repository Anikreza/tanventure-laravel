@if(isset($title))
    @if(isset($url))
        <a href="{{ $url }}">
            <div class="row article-title">
                <div class="col">
                    {{ $title }}
                </div>
            </div>
        </a>
    @else
        <div class="row article-title">
            <div class="col">
                {{ $title }}
            </div>
        </div>
    @endif
@endif

@if(isset($readTime) || isset($viewed))
    <div class="row info-section">
        @if(isset($includeCategory) && isset($category))
            <div class="col col-12 col-md-auto read-time-section">
                @if(isset($categorySlug))
                    <a href="{{ route('category', ['slug' => $categorySlug]) }}">
                        <button class="btn btn-danger button-general danger">{{ $category }}</button>
                    </a>
                @else
                    <button class="btn btn-danger button-general danger">{{ $category }}</button>
                @endif
            </div>
        @endif

        @if(isset($readTime))
            <div class="col col-12 col-md-auto read-time-section">
                <i class="material-icons material-icons-outlined">access_time</i>
                <span>{{ $readTime }}</span>
            </div>
        @endif

        @if(isset($viewed))
            <div class="col col-12 col-md-auto viewed-section">
                <i class="material-icons material-icons-outlined">visibility</i>
                <span>{{ $viewed }}</span>
            </div>
        @endif
    </div>
@endif

@if(isset($description))
    <div class="row description">
        <div class="col">
            {{ $description }}
        </div>
    </div>
@endif
