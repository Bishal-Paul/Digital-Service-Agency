@extends('frontend.master')

@section('title')
    Complete Checkout
@endsection

@section('content')
<?php

use App\Models\ServiceCategory;

$cat = ServiceCategory::latest()->take(1)->get();
?>
<style>
    .main-menu-area {
        background-color: #30398d !important;
    }

    .main-part {
        padding: 200px 385px;
    }
</style>
<div class="main-part">
    <div class="container">
        <h1>Thank You For Your Order.</h1>
        <h6 style="padding-left: 5px;">we've sent an invoice in your email address.</h6>
        <a href="{{url('/')}}" style="padding-left: 5px;">Go to Home</a>
    </div>
</div>
@endsection