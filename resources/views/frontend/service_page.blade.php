@extends('frontend.master')

@section('title')
    Our Service | Digital Service Agency
@endsection

@section('content')

<!-- Inner Banner Area Start -->
<div class="inner-banner">
    <div class="container">
        <div class="inner-text">
            @foreach($service as $items)
            <h1>{{$items->category->title}}</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><i class="fas fa-arrow-right"></i></li>
                <li>{{$items->category->title}}</li>
            </ul>
            @endforeach
        </div>
        <div class="inner-image">
            <img src="{{ url('frontend') }}/assets/image/inner-page/web-inner.png" alt="">
        </div>
    </div>
</div>
<!-- Inner Banner Area End -->

<!-- Product List Area Start -->
<section class="product-list-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="category-list-area">
                    <h2>Category</h2>
                    <ul>
                        @foreach($cat as $cats)
                        <li>
                            <label>
                                <input type="radio" name="category" value="{{$cats->title}}" data-link="{{$cats->title}}">
                                <a href="{{url('service', $cats->title)}}">{{$cats->title}}</a>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="product-area">
                    <div class="row">
                        @forelse($service as $item)
                        <div class="col-md-12 col-lg-6 col-sm-12 col-12">
                            <div class="single-product">
                                <div class="pro-demo-area">
                                    <img src="{{url('frontend')}}/assets/image/inner-page/web-1.png" alt="">
                                    <div class="product-img demo-1">
                                        <style>
                                            .product-list-section .product-area .single-product .demo-1 {
                                                background-image: url("{{asset('thumbnail/'.$item->image)}}");
                                            }
                                        </style>
                                    </div>
                                </div>
                                <div class="prodect-details">
                                    <h3>{{Str::limit($item->title, 25, $end='...')}}</h3>
                                    <!--span class="heptagon">$45.12</!--span-->
                                    <p>{{Str::limit($item->description, 90, $end='...')}}</p>
                                    <a href="{{url('single-service', $item->id)}}">More info</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5 style="padding: 75PX 60PX;"><strong>No post available in this Service</strong></h5>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product List Area End -->
@endsection