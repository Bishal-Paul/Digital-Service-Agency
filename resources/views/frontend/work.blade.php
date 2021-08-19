@extends('frontend.master')

@section('title')
  Recent Works | Digital Service Agency
@endsection

@section('content')

<!-- Inner Banner Area Start -->
<div class="inner-banner">
  <div class="container">
    <div class="inner-text">
      <h1>Recent Work</h1>
      <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><i class="fas fa-arrow-right"></i></li>
        <li>Recent Work</li>
      </ul>
    </div>
    <div class="inner-image">
      <img src="{{url('frontend')}}/assets/image/inner-page/web-inner.png" alt="">
    </div>
  </div>
</div>
<!-- Inner Banner Area End -->

<!-- Recent Work Start -->
<section class="recent-work section-padding-two">
  <div class="container">
    <div class="row">
      @foreach($work as $item)
      <div class="col-md-12 col-lg-4">
        <div class="single-work">
          <img src="{{ asset('thumbnail/'.$item->image)}}" alt="{{ $item->title }}">
          <div class="overlay"><a href="{{url('work-details/'.$item->title)}}">{{ $item->title }}</a></div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Recent Work End -->
@endsection