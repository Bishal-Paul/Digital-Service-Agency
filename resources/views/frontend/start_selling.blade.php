@extends('frontend.master')

@section('title')
Start Selling | Digital Service Agency
@endsection

@section('content')
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

    .contact-section .contact-form-area {
        padding: 60px;
    }

    .contact-section .contact-form-area form input {
        padding: 8px;
        margin-bottom: 6px;
    }

    .contact-section .contact-form-area form button {
        margin-left: 0px !important;
    }

    .contact-section .contact-form-area form label {
        font-size: 19px !important;
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

<section class="contact-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="contact-form-area">
                    <div class="title">
                        <h2>Register As a Seller</h2>
                        <p>Register as a User? <a href="{{url('register')}}">Register</a> </p>
                        <br>
                    </div>

                    <x-jet-validation-errors class="mb-4" style="color: red;" />

                    <form method="POST" action="{{ url('post-vendor-info') }}">
                        @csrf
                        <div class="form-group">
                            <label value="{{ __('Name') }}" for="name">Name</label>
                            <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <label value="{{ __('Username') }}" for="username">Username</label>
                            <input type="text" name="username" :value="old('username')" required placeholder="Enter Your Username">
                        </div>
                        <div class="form-group">
                            <label value="{{ __('Email') }}" for="email">Your Email</label>
                            <input type="email" name="email" :value="old('email')" required placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <label for="password" value="{{ __('Password') }}">Password</label>
                            <input type="password" name="password" required autocomplete="new-password">
                        </div>

                        <x-jet-button class="ml-4" style="cursor: pointer;">
                            {{ __('Register') }}
                        </x-jet-button>
                    </form>

                    <br>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>
@endsection