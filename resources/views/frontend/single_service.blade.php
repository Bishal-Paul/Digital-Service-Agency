@extends('frontend.master')

@section('title')
{{$single_service->category->title}} | Digital Service Agency
@endsection

@section('content')

<!-- Inner Banner Area Start -->
<div class="inner-banner">
  <div class="container">
    <div class="inner-text">

      <h1>{{$single_service->category->title}}</h1>
      <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><i class="fas fa-arrow-right"></i></li>
        <li>{{$single_service->category->title}}</li>
      </ul>

    </div>
    <div class="inner-image">
      <img src="{{ url('frontend') }}/assets/image/inner-page/web-inner.png" alt="">
    </div>
  </div>
</div>
<!-- Inner Banner Area End -->

<!-- Single Web Section Start -->
<section class="single-web-section section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6">
        <div class="pro-demo-area">
          <img src="{{url('frontend')}}/assets/image/inner-page/web-1.png" alt="">
          <div class="product-img demo-1">
            <style>
              .single-web-section .demo-1 {
                background-image: url("{{asset('thumbnail/'.$single_service->image)}}");
              }
            </style>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="web-text">
          <h2>{{$single_service->title}}</h2>
          <ul>
            <li><i class="far fa-clock"></i>{{$single_service->created_at}}</li>
            <li><i class="far fa-calendar-alt"></i>0 Comments</li>
            <li><i class="far fa-eye"></i>0 View</li>
          </ul>
          <p>{{$single_service->description}}</p>
          <a href="">Download Now</a>
        </div>
      </div>
      <div class="col-md-12">
        <div class="all-pages-area">
          <div class="section-title">
            <h2>What’s <span>included</span> in this set? </h2>
          </div>
          <div class="recent-work">
            <div class="row">
              @foreach($recent_work as $item)
              <div class="col-md-12 col-lg-4">
                <div class="single-work">
                  <img src="{{asset('thumbnail/'.$item->image)}}" alt="">
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Single Web Section End -->

<!-- Download Area Start -->
<section class="download-area section-padding">
  <div class="container">
    <h2>Download Now</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque optio animi<br> dolore soluta
      nulla dolorum Earum fugiat modi ipsa est</p>
    <a class="paide" href="">Buy this set for $31.84</a>
    <a class="free" href="">Save with our credit plans</a>
  </div>
</section>
<!-- Download Area End -->
@endsection