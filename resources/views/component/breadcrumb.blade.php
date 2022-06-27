@if(isset($segments))
    <nav>
        <ol class="breadcrumb customBreadcrumb" style="background-color: inherit">
            <li class="breadcrumb-item">
                <a style="color: #19b275; font-size: 1.9vh" href="{{route('blog')}}">Home</a>
            </li>
            @for($i = 0; $i < count($segments); $i++)
                <li style="font-size: 1.9vh" class="breadcrumb-item customFont @if($i == (count($segments) - 1)) active @endif" aria-current="page">
                    @if($i == (count($segments) - 1))
                        {{$segments[$i]['name']}}
                    @else
                        <a class="customFont" style="font-size: 1.9vh" href="{{ $i != (count($segments) - 1) ? $segments[$i]['url'] : '#' }}">
                            {{$segments[$i]['name']}}
                        </a>
                    @endif
                </li>
            @endfor
        </ol>
    </nav>
@endif
