@extends('master')

@section('content')
    <article class="article-page-wrapper page-wrapper">
        <div class="row content-row">
            <div class="col col-md-12 col-sm-12 article-content animate__animated animate__fadeIn"
                 style="--animate-duration: 1500ms">
                <div class="article-meta-data">
                    <h1 class="article-title">
                        {{ $page->title }}
                    </h1>
                </div>

                <div class="description contact-content-wrapper">
                    <div class="content-header">
                        <h3>Kontaktmöglichkeiten</h3>
                        <p>Hier finden Sie alles notwendigen Informationen um uns auf schnellsten Wege zu
                            kontaktieren.</p>
                    </div>

                    <div class="content-info">
                        <div class="row">
                            @foreach($infos as $key => $info)
                                <div class="col col-12 col-md-6 item-block">
                                    <span class="block-title">
                                        <div class="holder">
                                            <span class="line"></span>
                                        </div>
                                        <span class="title">
                                            {{ $key }}
                                        </span>
                                        <div class="holder">
                                            <span class="line"></span>
                                        </div>
                                    </span>

                                    @foreach($info as $item)
                                        <div class="item">
                                            <div class="label">{{ $item['label'] }}</div>
                                            <div class="value">
                                                @if(isset($item['is_mail']) && $item['is_mail'])
                                                    <a href="mailto:{{ $item['value'] }}">{{ $item['value'] }}</a>
                                                @else
                                                    {{ $item['value'] }}
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="contact-form">
                        <div class="content-header">
                            <h3>Kontaktmöglichkeiten</h3>
                            <p>Hier finden Sie alles notwendigen Informationen um uns auf schnellsten Wege zu
                                kontaktieren.</p>
                        </div>

                        <div class="form-area col col-12 col-md-4 offset-md-4" id="form-plugin">
                            <contact-form></contact-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@stop

@section('scripts')
    <script src="{{ mix('plugins/contact-form.js') }}"></script>
@stop
