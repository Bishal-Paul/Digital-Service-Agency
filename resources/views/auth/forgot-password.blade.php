<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend') }}/assets/image/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/meanmenu.min.css" media="all">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/default.css'}}">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/all.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/recponcive.css">

    <title>Reset Password</title>
</head>

<body>

    <section class="contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="contact-form-area">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label value="{{ __('Email') }}" for="email">Your Email</label>
                                <input type="email" name="email" :value="old('email')" required placeholder="Enter Your Full Name">
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button>
                                    {{ __('Email Password Reset Link') }}
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="{{ url('frontend') }}/assets/js/jquery.meanmenu.min.js"></script>
    <script type="text/javascript" src="{{ url('frontend') }}/assets/js/slick.js"></script>
    <script src="{{ url('frontend') }}/assets/js/wow.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/jquery.magnific-popup.js"></script>
    <script src="{{ url('frontend') }}/assets/js/main.js"></script>

</body>

</html>