@extends('frontend.master')

@section('title')
Our Pricing Plans | Digital Service Agency
@endsection

@section('content')

<!-- Inner Banner Area Start -->
<div class="inner-banner">
  <div class="container">
    <div class="inner-text">
      <h1>Priceing</h1>
      <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><i class="fas fa-arrow-right"></i></li>
        <li>Priceing</li>
      </ul>
    </div>
    <div class="inner-image">
      <img src="{{ url('frontend') }}/assets/image/inner-page/web-inner.png" alt="">
    </div>
  </div>
</div>
<!-- Inner Banner Area End -->

<!-- Priceing Section Start -->
<section class="priceing-section section-padding-two">
  <div class="container">
    <div class="row">
      @foreach($pricing as $item)
      <div class="col-md-12 col-lg-4">
        <div class="single-price">
          <div class="pricing-header">
            <h2>${{$item->price}}</h2>
            <p>{{$item->time}}</p>
          </div>
          <div class="pricing-body">
            <div class="title">
              <h3>{{$item->title}}</h3>
            </div>
            <ul>
              <li>{{$item->users}} Users</li>
              <li>{{$item->storage}} Storage</li>
              <li>{{$item->other1}}</li>
              <li>{{$item->support}} Support</li>
            </ul>
          </div>
          <div class="primary-footer">
            <a href="{{ url('start-plan/'.$item->title) }}">Start Plan</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
<!-- Priceing Section End -->
@endsection