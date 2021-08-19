@extends('frontend.master')

@section('title')
Single Blog | Digital Service Agency
@endsection

@section('content')
<!-- Inner Banner Area Start -->
<div class="inner-banner">
    <div class="container">
        <div class="inner-text">
            <h1>Single Blog</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><i class="fas fa-arrow-right"></i></li>
                <li>Single Blog</li>
            </ul>
        </div>
        <div class="inner-image">
            <img src="{{ url('frontend') }}/assets/image/inner-page/web-inner.png" alt="">
        </div>
    </div>
</div>
<!-- Inner Banner Area End -->

<!-- Blog Section Start -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="blog-side-bar">
                    <div class="single-side search-area">
                        <form action="{{url('blog')}}" method="get">
                            <div class="title">
                                <h3>Search</h3>
                            </div>
                            <input type="text" name="search" value="{{request()->query('search')}}" placeholder="Search..">
                            <button style="cursor: pointer;">Send</button>
                        </form>
                    </div>
                    <div class="single-side resent-blog">
                        <div class="title">
                            <h3>Search</h3>
                        </div>
                        @foreach($recent as $item)
                        <div class="single-recent">
                            <div class="row">
                                <div class="col-md-3 col-lg-4">
                                    <div class="recent-img">
                                        <img src="{{asset('thumbnail/'.$item->image)}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-9 col-lg-8">
                                    <div class="recent-title">
                                        <a href="{{ url('single-blog', $item->title) }}">{{$item->title}}</a><br>
                                        <h6><i class="far fa-calendar-alt"></i>{{$item->created_at->format('d-M-Y')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="single-side category">
                        <div class="title">
                            <h3>Categories</h3>
                        </div>
                        <ul>
                            @foreach($blog_cat as $item)
                            <li><a href="">{{$item->category}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single-side tags">
                        <div class="title">
                            <h3>Featured Tags</h3>
                        </div>
                        <ul>
                            @foreach($blog as $item)
                            <li><a href="">{{$item->tags['tags'] ?? "No Tags Available for this Blog"}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="blog-area">
                    @foreach($blog as $item)
                    <div class="single-blog mt-0">
                        <a href="{{ url('single-blog', $item->title) }}"><img src="{{asset('thumbnail/'.$item->image)}}" alt=""></a>
                        <div class="overly">
                            <a href="{{ url('single-blog', $item->title) }}">{{$item->title}}</a>
                            <p>{{$item->summary}}</p>
                            <ul>
                                <li><i class="far fa-clock"></i>{{$item->created_at->format('d-M-Y')}}</li>
                                <li><i class="far fa-calendar-alt"></i>{{$blog_comment->count()}} Comments</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-details">
                        <style>
                            .blog-details p {
                                font-family: system-ui !important;
                                text-align: justify;
                            }

                            #toolbar_hupso_toolbar_0 img {
                                width: 30px !important;
                                height: 30px !important;
                                padding-right: 0px !important;
                                padding-top: 0px !important;
                                margin: 5px !important;
                            }
                        </style>
                        <p>{!! $item->description !!}</p>
                        @endforeach
                        <br>
                        <div class="social-icons">

                            <!-- Hupso Share Buttons - http://www.hupso.com/share/ -->
                            <div class="hupso-share-buttons"><a class="hupso_toolbar" href="http://www.hupso.com/share/"><img src="//static.hupso.com/share/buttons/share-medium.png" style="border:0px; padding-top:5px; float:left;" /></a>
                                <script type="text/javascript">
                                    var hupso_services_t = new Array("Facebook", "Twitter", "Pinterest", "Email", "Linkedin", "Reddit", "Tumblr", "StumbleUpon");
                                    var hupso_toolbar_size_t = "medium";
                                </script>
                                <script type="text/javascript" src="//static.hupso.com/share/js/share_toolbar.js"></script>
                            </div><!-- Hupso Share Buttons -->

                        </div><br>

                        <div class="comment-area">
                            <div class="title">
                                <h3>Comments</h3>
                            </div>
                            <style>
                                .blog-section .blog-area .blog-details .comment-area .single-comment .text {
                                    margin-left: 0px !important;
                                }
                            </style>
                            @forelse($blog_comment as $item)
                            <div class="single-comment">
                                <div class="text">
                                    <p>{{$item->user_message}}</p>
                                    <h6>{{$item->user_name}}</h6>
                                    <span>{{$item->created_at->format('d-M-Y')}}</span>
                                </div>
                            </div>
                            @empty
                            <strong>No Comments Yet</strong>
                            <p>Be the first to comment</p>
                            @endforelse
                        </div><br>

                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success')}}.
                        </div>
                        @endif
                        <div class="leave-comment">
                            <div class="title">
                                <h3>Leave Comment</h3>
                            </div>
                            <form action="{{url('blog-comment')}}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blog_id->id}}">
                                <input type="text" name="user_name" required placeholder="Enter Your Full name">
                                <input type="email" name="user_email" required placeholder="Enter Your Email Address">
                                <textarea name="user_message" cols="30" rows="10" required spellcheck="false" placeholder="Write A Message"></textarea>
                                <button style="cursor: pointer;">Submit Now</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection

@section('footer_js')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-609c295a449b07db"></script>

@endsection