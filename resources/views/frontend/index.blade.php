@extends('frontend.master')

@section('title')
Digital Service Agency
@endsection

@section('content')
<!-- Banner Area Start -->
<div class="banner-area">
  <div class="mockup">
    <div class="screen">
      <div class="slider">
        @foreach($bannar as $item)

        <div class="slide" style="background-image: url('{{asset('thumbnail/'.$item->image)}}');"></div>
        @endforeach
      </div>
    </div>
    <img src="{{url('frontend')}}/assets/image/home-page/pn-mockup.png" alt="" />
  </div>

  <div class="banner-text-area">
    <h1 class="wow flipInX">Take your business in next level <br> with us</h1>
    <p class=" wow fadeInRight">Buy top services with reasonable prices.</p>
    <div id="inline-popups">
      <a class="main-btn" href="#test-popup" data-effect="mfp-3d-unfold">Start Using for Free</a>
    </div>
    <!-- Popup itself -->
    <div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
      <form action="{{ route('register') }}" method="post" class="from-area">
        @csrf
        <span>Use For Free</span>
        <h2>Register</h2>
        <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Your Full Name">
        <input type="email" name="email" :value="old('email')" required placeholder="Enter Your Email">
        <input type="password" name="password" required autocomplete="new-password" placeholder="Password">
        <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

        <div class="submit-btn">
          <button style="cursor: pointer;" type="submit">{{ __('Register') }}</button>
        </div>
      </form>
    </div>


    <a class="sec-btn" href="{{url('services')}}">Explore Features</a>
  </div>
  <div class="shape-area">
    <img class="shape-1" src="{{url('frontend')}}/assets/image/home-page/shape-1.png" alt="">
    <img class="shape-2" src="{{url('frontend')}}/assets/image/home-page/shape-2.png" alt="">
    <img class="shape-3" src="{{url('frontend')}}/assets/image/home-page/shape-3.png" alt="">
  </div>
</div>
<!-- Banner Area End -->

<!-- Service Area Start -->
<section class="service-area section-padding-two">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-sm-6">
        <div class="section-title">
          <h2>Our <span>Services</span> </h2>
          <p>If you have a project or are looking for an organization that makes your website look catchy Design and Develop completely or Promote your product on a digital platform. Ok, good news for you! You're in the right place, man. Please feel free to contact us at the right time.</p>
        </div>
      </div>
      @foreach($cat as $item)
      <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="single-services">
          <div class="services-img">
            <img src="{{asset('thumbnail/'.$item->cat_image)}}" alt="{{$item->title}}" style="width: 50%;">
          </div>
          <div class="services-text">
            <a href="{{url('service', $item->title)}}" class="wow flipInX">{{$item->title}}</a>
            <p>{{$item->summary}}</p>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Service Area End -->

<!-- Recent Work Start -->
<section class="recent-work section-padding-two">
  <div class="container">
    <div class="section-title">
      <h2>Our Recent <span>Work</span> </h2>
      <p>In past few days we have completed some of our service related Projects. Such as_ Responsive Web Design,
        Woo-Commerce Creation, Logo Design, Search Engine Optimization,
        etc. Our latest projects given in bellow. Hopefully you will love it_</p>
    </div>
    <div class="row">
      @foreach($work as $item)
      <div class="col-md-12 col-lg-4">
        <div class="single-work">
          <img src="{{asset('thumbnail/'.$item->image)}}" alt="">
          <div class="overlay"><a href="{{url('work-details/'.$item->title)}}">{{$item->title}}</a></div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Recent Work End -->

<!-- Video Section Start -->
<section class="video-section section-padding">
  <div class="container">
    <div class="section-title">
      <h2>Our <span>Video</span> </h2>
      <p>We a Agency of Digital Service Provider. We will offer Web Design and Development, Graphics Design, App Deveopment and many more. To learn more about us please watch the following video.</p>
    </div>
    <div class="video-area">
      @foreach($video as $item)
      <video width="800px" height="470px" controls data-full="{{ asset('thumbnail/video/'.$item->video) }}">
        <source src="{{ asset('thumbnail/video/'.$item->video) }}" type="video/mp4">
      </video>
      @endforeach
    </div>
  </div>
  <div class="shape">
    <img class="shape-1" src="{{url('frontend')}}/assets/image/home-page/shape-3.png" alt="">
    <img class="shape-2" src="{{url('frontend')}}/assets/image/home-page/shape-4.png" alt="">
    <img class="shape-3" src="{{url('frontend')}}/assets/image/home-page/shape-4.png" alt="">
  </div>
  </div>
</section>
<!-- Video Section End -->

<!-- Priceing Section Start -->
<section class="priceing-section section-padding">
  <div class="container">
    <div class="section-title">
      <h2>Our <span>Packages</span> </h2>
      <p>We have three packages to convenience of our Client. Feel free to check out our all Packages which in given bellow_</p>
    </div>
    <div class="row">
      @foreach($pricing as $item)
      <div class="col-md-6 col-lg-4 col-sm-12">
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

<!-- Testimonial Section Start -->
<section class="testimonial-section section-padding">
  <div class="container">
    <div class="section-title">
      <h2>Our <span>Testimonial</span> </h2>
      <p>Feel free to check out our Customers feedback!</p>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="testimonial-container">
          <div class="dk-container">
            <div class="cd-testimonials-wrapper cd-container">
              <ul class="cd-testimonials">
                @foreach($test as $item)
                <li>
                  <div class="testimonial-content">
                    <p>{{ $item->text }}</p>
                    <div class="cd-author">
                      <img src="{{asset('thumbnail/'.$item->image)}}" alt="Author image">
                      <ul class="cd-author-info">
                        <li><strong>{{ $item->name }}</strong><br><span><i class="fab fa-twitter"></i>{{ $item->username }}</span></li>
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
            @foreach($brand as $item)
            <li><a href=""><img src="{{asset('thumbnail/'.$item->image)}}" alt="{{$item->name}}" style="width: 50%;"></a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>


  </div>
</section>
<!-- Testimonial Section End -->
@endsection

@section('footer_js')
<script>
  var botmanWidget = {
    aboutText: 'Write Something',
    introMessage: "✋ Hi! Welcome to Digital Service Agency"
  };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection