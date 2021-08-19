@extends('frontend.master')

@section('title')
  Testimonial | Digital Service Agency
@endsection

@section('content')

<!-- Inner Banner Area Start -->
<div class="inner-banner">
  <div class="container">
    <div class="inner-text">
      <h1>Client Reviews</h1>
      <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><i class="fas fa-arrow-right"></i></li>
        <li>Client Reviews</li>
      </ul>
    </div>
    <div class="inner-image">
      <img src="{{url('frontend')}}/assets/image/inner-page/web-inner.png" alt="">
    </div>
  </div>
</div>
<!-- Inner Banner Area End -->

<!-- Testimonial Section Start -->
<section class="testimonial-section section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="testimonial-container">
          <div class="dk-container">
            <div class="cd-testimonials-wrapper cd-container">
              <ul class="cd-testimonials">
                @foreach($test as $item)
                <li>
                  <div class="testimonial-content">
                    <p>{{$item->text}}</p>
                    <div class="cd-author">
                      <img src="{{asset('thumbnail/'.$item->image)}}" alt="Author image">
                      <ul class="cd-author-info">
                        <li><strong>{{$item->name}}</strong><br><span><i class="fab fa-twitter"></i>{{$item->username}}</span></li>
                        <li></li>
                      </ul>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- cd-testimonials -->
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="client-logo">
          <ul>
            @foreach($brands as $brand)
            <li><a href=""><img src="{{asset('thumbnail/'.$brand->image)}}" alt="{{$item->name}}" style="width: 50%;"></a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Testimonial Section End -->

@endsection