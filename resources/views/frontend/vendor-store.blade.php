@extends('frontend.master')
@section('title')
Your Store | Digital Service Agency
@endsection
@section('content')

<?php

use App\Models\ServiceCategory;

$cat = ServiceCategory::latest()->take(1)->get();
?>
<style>
    @media (min-width: 577px) and (max-width: 767px) {

        .main-menu-area {
            width: 100% !important;
            padding-left: -28px !important;
            z-index: 999999;
            padding-top: 22px ​ !important;
            padding-right: 91px !important;
        }

    }

    .footer-area {
        margin-top: 100px !important;
    }

    .single-web-section .web-img2 img {
        width: 80%;
    }

    .main-menu-area {
        background-color: #30398d !important;
    }

    .main-menu-area .start-btn-area a.project-btn {
        padding: 10px 20px !important;
    }

    h1 span {
        color: #30398d !important;
    }

    #full-body #form-container form fieldset h6 {
        color: #30398d !important;
    }

    #full-body #form-container form button {
        background-color: #30398d !important;
    }

    #full-body #form-container form button:hover {
        background-color: #ffb545 !important;
    }
</style>

<section class="single-web-section section-padding" style="padding: 150px 0px 0px 0px;">
    <div class="container">
        <div class="node_modules--redbubble-design-system-react-Alert-styles__container--3Jz9a" style="background-color: #fff4eb;padding: 25px 20px;">
            <div class="node_modules--redbubble-design-system-react-Alert-styles__title--2T1ge"><span class="node_modules--redbubble-design-system-react-Box-styles__box--2Ufmy node_modules--redbubble-design-system-react-Text-styles__text--23E5U node_modules--redbubble-design-system-react-Text-styles__display5--2KoKo node_modules--redbubble-design-system-react-Box-styles__display-block--3kWC4" data-testid="ds-box">Congratulations! You're almost ready to sell.</span></div>
            <div class="node_modules--redbubble-design-system-react-Box-styles__box--2Ufmy node_modules--redbubble-design-system-react-Box-styles__display-flex--2Ww2j node_modules--redbubble-design-system-react-Box-styles__flexDirection-row--3zrhq" data-testid="ds-box">
                <div class="node_modules--redbubble-design-system-react-Box-styles__box--2Ufmy" data-testid="ds-box"><span class="node_modules--redbubble-design-system-react-Box-styles__box--2Ufmy node_modules--redbubble-design-system-react-Text-styles__text--23E5U node_modules--redbubble-design-system-react-Text-styles__body--3StRc" data-testid="ds-box">Only you can view and purchase this design. </span><a class="node_modules--redbubble-design-system-react-TextLink-styles__link--3yVlX" data-react-ds-adoption="true" href="/account/payment"><span class="node_modules--redbubble-design-system-react-TextLink-styles__children--2hA_Y">Complete your payment details to open your shop.</span></a></div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="web-img2">
                    <img src="{{asset('thumbnail/'.$work->image)}}" alt="{{$work->title}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="web-text">
                    <h2>{{$work->title}}</h2>
                    <ul>
                        <li><i class="far fa-clock"></i>{{$work->created_at->format('d-m-Y')}}</li>
                        <li><i class="far fa-calendar-alt"></i>0 Comments</li>
                    </ul>
                    <p>
                        {{$work->description}}
                    </p>
                    <a href="">Download Now</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="all-pages-area">
                    <div class="section-title">
                        <h2>Other <span>Services</span> </h2>
                    </div>
                    <div class="recent-work">
                        <div class="row">
                            @foreach($recent_work as $item)
                            <div class="col-md-12 col-lg-4 col-sm-12">
                                <div class="single-work">
                                    <img src="{{asset('thumbnail/'.$item->image)}}" alt="Web Design">

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

@endsection