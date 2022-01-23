@if(isset($segments))
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Startseite</a>
            </li>
            @for($i = 0; $i < count($segments); $i++)
                <li class="breadcrumb-item @if($i == (count($segments) - 1)) active @endif" aria-current="page">
                    @if($i == (count($segments) - 1))
                        {{$segments[$i]['name']}}
                    @else
                        <a href="{{ $i != (count($segments) - 1) ? $segments[$i]['url'] : '#' }}">
                            {{$segments[$i]['name']}}
                        </a>
                    @endif
                </li>
            @endfor
        </ol>
    </nav>
@endif
