@extends('frontend.master')

@section('title')
Login | Digital Service Agency
@endsection

<?php

use App\Models\ServiceCategory;

$cat = ServiceCategory::all();
?>
<style>
    @media (min-width: 577px) and (max-width: 767px) {

        .main-menu-area {
            width: 100% !important;
            padding-left: -28px !important;
            z-index: 999999;
            padding-right: 91px !important;
        }

        .start-btn-area {
            display: inherit !important;
            top: -32px !important;
            left: 50px !important;
            padding-top: 15px;
        }

        .main-menu-area .logo-area {
            margin-left: -43px !important;
            top: 12px !important;
        }
    }

    .main-menu-area {
        padding: 15px 0 !important;
        background-color: #30398d !important;
    }

    .contact-section .contact-form-area {
        padding-top: 60px !important;
    }

    .contact-section .contact-form-area form button {
        cursor: pointer;
    }

    .footer-area .footer-header ul i {
        padding-top: 10px;
    }
</style>

@section('content')
<section class="contact-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="contact-form-area">
                    <div class="title">
                        <h2>Login Here</h2>
                        <br>
                    </div>
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label value="{{ __('Email') }}" for="email">Your Email</label>
                            <input type="email" name="email" :value="old('email')" required placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <label for="password" value="{{ __('Password') }}">Password</label>
                            <input type="password" name="password" required autocomplete="new-password">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif

                            <x-jet-button class="ml-4">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </form>

                    <br><br>

                    <div class="form-group">
                        <a href="{{ route('login/facebook') }}" class="btn btn-primary btn-block">Login with Facebook</a>
                        <a href="{{ route('login/google') }}" class="btn btn-danger btn-block">Login with Google</a>
                        <a href="{{ route('login/linkedin') }}" class="btn btn-info btn-block">Login with Linkedin</a>
                        <a href="{{ route('login/github') }}" class="btn btn-dark btn-block">Login with Github</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>
@endsection