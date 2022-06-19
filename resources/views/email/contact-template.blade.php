<h2>{{$hello}}</h2>

<p style="font-size: 16px; font-weight: 500; color: #3d040b"> {!! nl2br($body) !!}
    <span><a style="font-size: 14px; color: #18099d" href="{{$link}}">{{$link}}</a></span>
</p>
<p style="font-size: 13px; font-weight: 500; color: #042c06">{{$contact}} {{ $email }}</p>

{{--<br/><br/><br/>--}}
{{--<p style="font-size: 16px; font-weight: 500; color: #3d040b"> {!! nl2br($body_bn) !!}--}}
{{--    <span><a style="font-size: 14px; color: #18099d" href="{{$link_bn}}">{{$link_bn}}</a></span>--}}
{{--</p>--}}

{{--<p style="font-size: 13px; font-weight: 500; color: #042c06">আমার সাথে যোগাযোগ করতে পারেন এই ইমেইলে: {{ $email }} </p>  <br>--}}

<br/>
-  {{$thanks}}, {{ env('APP_NAME') }}
