@if(env('APP_ENV') == 'production' && $adInfo)
    <section class="full-width-ad-space animate__animated animate__fadeInDown" style="--animate-duration: 400ms">
        <div class="row">
            <div class="col col-12 banner-ad-section">
                @if($adInfo->is_google)
                    <div style="width: 100%; background: #F3F5F7; margin: 0 2px;">
                        {!! $adInfo->formatted_content !!}
                    </div>
                @else
                    <div style="width: 100%; background: #F3F5F7; margin: 0 2px;">
                        <a href="{{ $adInfo->location }}" target="_blank">
                            {!! $adInfo->formatted_content !!}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
