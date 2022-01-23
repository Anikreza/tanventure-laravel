<div class="article-card">

    <a href="{{ route('article-details', ['slug' => $slug]) }}">
        @if(isset($image))
            <div class="card-image @if(isset($image)) default-transform-effect @endif"
                 style="background: @if(isset($image)) url('{{ $image }}'), linear-gradient(to bottom, rgba(41, 48, 77, 0), #29304D), no-repeat; @else none @endif"></div>
        @endif

        <div class="card-header-section">
            @if(isset($category))
                <div class="row">
                    <div class="col button-wrapper">
                        <button class="btn button-general">{{ $category }}</button>
                    </div>
                </div>
            @endif
        </div>
    </a>

</div>

@include('components.cards.partials.meta-info', ['url' => route('article-details', ['slug' => $slug])])
