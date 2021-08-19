@extends('frontend.master')

@section('title')
Contact Us | Digital Service Agency
@endsection

@section('content')
<!-- Inner Banner Area Start -->
<div class="inner-banner">
    <div class="container">
        <div class="inner-text">
            <h1>Contact Us</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><i class="fas fa-arrow-right"></i></li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="inner-image-2">
            <img src="{{url('frontend')}}/assets/image/contact/contact.png" alt="">
        </div>
    </div>
</div>
<!-- Inner Banner Area End -->

<!-- Contact Section Start -->
<section class="contact-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact-form-area">
                    <div class="title">
                        <h2>Get in Touch</h2>
                    </div>
                    <form action="post-contact" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Your Company Name</label>
                            <input type="text" name="company" placeholder="Enter Your Company Name">
                        </div>
                        <div class="form-group">
                            <label>Your Full Name</label>
                            <input type="text" name="name" placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" placeholder="Enter Your Phone Name">
                        </div>
                        <div class="form-group">
                            <label>Your Email</label>
                            <input type="email" name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label>Your Subject</label>
                            <input type="text" name="subject" placeholder="Enter Your Subject">
                        </div>
                        <div class="form-group">
                            <label>Your Message</label>
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Enter Your Massage"></textarea>
                        </div>
                        <button>Submit Now</button>
                    </form>
                    <br>
                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-us">
                    <div class="contact-img text-center">
                        <img src="{{ url('frontend') }}/assets/image/contact/contact-us.png" alt="">
                    </div>
                    <div class="contact-info">
                        <div class="single-info">
                            <i class="fas fa-envelope-open-text"></i>
                            <div class="text">
                                <h5>Email</h5>
                                <a href="">{{$siteinfo->email}}</a>
                            </div>
                        </div>
                        <div class="single-info">
                            <i class="fas fa-phone-volume"></i>
                            <div class="text">
                                <h5>Call Us</h5>
                                <a href="">{{$siteinfo->phone}}</a>
                            </div>
                        </div>
                        <div class="single-info">
                            <i class="fas fa-street-view"></i>
                            <div class="text">
                                <h5>Visit Us</h5>
                                <a href="">{{$siteinfo->address}}, {{$siteinfo->website}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection