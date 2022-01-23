<a href="{{ route('article-details', ['slug' => $slug]) }}">
    <div class="article-card">

        <div class="card-image @if(isset($image)) default-transform-effect @endif"
             style="background: @if(isset($image)) url('{{ $image }}'), linear-gradient(to bottom, rgba(41, 48, 77, 0), #29304D), no-repeat; @else none @endif"></div>

        <div class="card-header-section">
            @if(isset($category))
                <div class="row">
                    <div class="col">
                        <button class="btn btn-danger button-general danger">{{ $category }}</button>
                    </div>
                </div>
            @endif

            @include('components.cards.partials.meta-info')
        </div>

    </div>
</a>
