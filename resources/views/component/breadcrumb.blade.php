@if(isset($segments))
    <nav>
        <ol class="breadcrumb" style="background-color: inherit">
            <li class="breadcrumb-item">
                <a style="color: #19b275" href="{{route('blog')}}">Home</a>
            </li>
            @for($i = 0; $i < count($segments); $i++)
                <li class="breadcrumb-item customFont @if($i == (count($segments) - 1)) active @endif" aria-current="page">
                    @if($i == (count($segments) - 1))
                        {{$segments[$i]['name']}}
                    @else
                        <a class="customFont" href="{{ $i != (count($segments) - 1) ? $segments[$i]['url'] : '#' }}">
                            {{$segments[$i]['name']}}
                        </a>
                    @endif
                </li>
            @endfor
        </ol>
    </nav>
@endif
