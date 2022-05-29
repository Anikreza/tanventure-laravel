
{{--<div style="background-image:url({{asset('assets/images/bg-f.png')}});background-size: cover; filter: grayscale(94%); opacity: .4; height: 42vh;"></div>--}}

<div class="wgs comments justify-center">
    <a class="commentFormToggle" id="more" style="cursor: pointer"
       onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'কমেন্ট বক্স দেখতে চাই না!':'আমিও কিছু বলতে চাই!');});"
    >
        আমিও কিছু বলতে চাই <span><i class='fas fa-angle-down'></i></span>
    </a>
    <div class="details" style="display:none">
        <div class="comments-form">
            <form>
                @csrf
                <div class="row">
                    <div class="form-field col-md-9">
                        <input type="text" placeholder="চাইলে আপনার নাম লিখতে পারেন এখানে!" name="name" class="input name" aria-required="true">
                    </div>
                </div>
                <div class="row">
                </div>

                <input type="hidden" value="{{$article}}" class="input article">

                <div class="row">
                    <div class="form-field col-md-9">
                    <textarea placeholder="কমেন্ট..." name="comment" class="input input-msg comment"
                              aria-required="true" style="border-radius: 4%"></textarea>
                        <button style="float: left" type="submit" class="btn btn-md add_comments">পোস্ট কমেন্ট</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<br/>
<br/>
    <div class="row">
        <div class="col-12">
            <ul class="comments-list">
                <h3 class="wgs-heading" style="padding: 1rem">অন্যদের কথা...</h3>
                <li class="comments-row" id="recent" style="display: none">
                    <div class="media">
                        <img src="{{asset('assets/images/author-image-e.jpg')}}" alt="Mark Anthony">
                        <div class="media-body">
                            <div class="comment-content">
                                <p class="media-name"><strong id="name"></strong>
                                    <span
                                        class="post-date" style="float: right; font-size: 11px; font-weight: lighter">
                                        Recently
                                    </span>
                                </p>
                                <p style=" margin-left: 2rem" id="message"></p>
                                <a style="margin-left: 2rem" href="">Reply</a>
                            </div>
                        </div>
                    </div>
                <li/>

                @foreach($comments as $comment)
                    <hr/>
                    <li class="comments-row">
                        <div class="media" style="padding-right: 2rem">
                            <img src="{{asset('assets/images/pp.jpg')}}" alt="Mark Anthony">
                            <div class="media-body">
                                <div class="comment-content">
                                    <p class="media-name"><strong> {{$comment->guest_name}}</strong>
                                        <span class="post-date" style="float: right; font-size: 1.3vh; font-weight: lighter; color: #381313">
                                            {{$comment->created_at}}
                                        </span>
                                    </p>
                                    <p style=" margin-left: 2rem">{{$comment->comment}}</p>
                                    <a style="margin-left: 1.5rem" href="">Reply</a>
                                </div>
                                <!-- .comment -->
                            </div>
                        </div>
                        {{--                    <ul class="comments-list">--}}
                        {{--                        <li class="comments-row">--}}
                        {{--                            <div class="media">--}}
                        {{--                                <img src="{{asset('assets/images/author-image-e.jpg')}}" alt="">--}}
                        {{--                                <div class="media-body">--}}
                        {{--                                    <div class="comment-content">--}}
                        {{--                                        <p class="media-name"><strong>Roger Helder</strong>   <span class="post-date">- 21 March </span> </p>--}}
                        {{--                                        <p>We denounce with righteous indignation and dislike men who are so beguiled.</p>--}}
                        {{--                                        <a href="">Reply</a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                        {{--                    </ul>--}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.add_comments', function (e) {
                e.preventDefault()
                let data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'comment': $('.comment').val(),
                    'article': $('.article').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: `/postComment`,
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        console.log('response', response)
                        $('#message').text(response.comment.comment)
                        $('#recent').css('display','block')
                        $('#name').text(response.comment.guest_name)
                    }
                })
                console.log('data', data)
            })
        })
    </script>
@endsection
