@extends('frontend.master')

@section('title')
Our Blogs | Digital Service Agency
@endsection

@section('content')

<style>
    .blog-section .blog-area .single-blog {
        margin-bottom: 170px !important;
    }
</style>

<!-- Inner Banner Area Start -->
<div class="inner-banner">
    <div class="container">
        <div class="inner-text">
            <h1>Our Blogs</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><i class="fas fa-arrow-right"></i></li>
                <li>Our Blogs</li>
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
            <div class="col-md-12 col-lg-8">
                <div class="blog-area">
                    @forelse($blog as $item)
                    <div class="single-blog mt-0">
                        <a href="{{ url('single-blog', $item->title) }}"><img src="{{asset('thumbnail/'.$item->image)}}" alt=""></a>
                        <div class="overly">
                            <a href="{{ url('single-blog', $item->title) }}">{{$item->title}}</a>
                            <p>{{$item->summary}}</p>
                            <ul>
                                <li><i class="far fa-clock"></i>{{$item->created_at->format('d-M-Y')}}</li>
                            </ul>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">No result found for <strong>{{request()->query('search')}}</strong></p>
                    @endforelse
                </div>
                {{$blog->links()}}
            </div>
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
                            <h3>Recent Blogs</h3>
                        </div>
                        @foreach($blog as $item)
                        <div class="single-recent">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="recent-img">
                                        <img src="{{asset('thumbnail/'.$item->image)}}" alt="{{$item->title}}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="recent-title">
                                        <a href="{{ url('single-blog', $item->title) }}">{{$item->title}}</a>
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
                            @foreach($blog as $item)
                            <li><a href="">{{$item->category}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection