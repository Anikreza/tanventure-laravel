{{--<div class="newsSection" style="background-color:{{$key%2!==0?'rgba(12, 117, 14, 0.1)':'rgba(88, 6, 6, 0.1)'}}">--}}
<div class="newsSection">
    <h2 style="color:{{$key%2==0?'#19b275':'#ff5151'}};">{{$title}}</h2>
    {!! $description !!}
{{--    <p>{{$description}}</p>--}}
</div>
