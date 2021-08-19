@extends('frontend.master')

@section('title')
Register | Digital Service Agency
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
            left: 60px !important;
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
                        <h2>Register Here</h2>
                        <br>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label value="{{ __('Name') }}" for="name">Name</label>
                            <input type="text" name="name" :value="old('name')" class="@error('name') is-invalid @enderror" required autofocus autocomplete="name" placeholder="Enter Your Full Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label value="{{ __('Email') }}" for="email">Your Email</label>
                            <input type="email" name="email" :value="old('email')" class="@error('email') is-invalid @enderror" required placeholder="Enter Your Full Name">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" value="{{ __('Password') }}">Password</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>



                            <x-jet-button class="ml-4" style="cursor: pointer;">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </form>

                    <br>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>
@endsection