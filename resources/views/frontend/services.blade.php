@extends('frontend.master')

@section('title')
    Our Services | Digital Service Agency
@endsection

@section('content')
<style>
    .product-list-section .product-area .single-product .pro-demo-area {
        margin: 15px 85px;
        width: 50%;
    }
</style>
<!-- Inner Banner Area Start -->
<div class="inner-banner">
    <div class="container">
        <div class="inner-text">
            <h1>Our Services</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><i class="fas fa-arrow-right"></i></li>
                <li>Our Services</li>
            </ul>
        </div>
        <div class="inner-image">
            <img src="{{url('frontend')}}/assets/image/inner-page/web-inner.png" alt="">
        </div>
    </div>
</div>
<!-- Inner Banner Area End -->

<!-- Product List Area Start -->
<section class="product-list-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="product-area">
                    <div class="row">
                        @foreach($cat as $item)
                        <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                            <div class="single-product">
                                <div class="pro-demo-area">
                                    <img src="{{asset('thumbnail/'.$item->cat_image)}}" alt="">

                                </div>
                                <div class="prodect-details">
                                    <h3>{{$item->title}}</h3>
                                    <p>{{$item->summary}}</p>
                                    <a href="{{url('service', $item->title)}}">More info</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product List Area End -->

@endsection