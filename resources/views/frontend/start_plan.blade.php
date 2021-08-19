@extends('frontend.master')

@section('title')
    Start Plan | Digital Service Agency
@endsection

@section('content')
<style>
    .main-menu-area {
        background-color: #30398d !important;
    }
</style>

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    #card-element {
        width: 100%;
    }

    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<div class="order-page" style="padding: 200px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Cart</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($service as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$item->title}}</h6>

                        </div>
                        <span class="text-muted">${{$item->price}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">Users : {{$item->users}}</li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">Storage : {{$item->storage}}</li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">Support : {{$item->support}}</li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">Validity : {{$item->time}}</li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">Others : {{$item->other}}</li>


                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{$item->price}}</strong>

                    </li>

                </ul>

                <form action="{{url('check-coupon')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="my_id" value="{{$item->id}}">
                        <input type="text" name="coupon_code" class="form-control" placeholder="Coupon code">
                        <div class="input-group-append">
                            <button type="submit" class="btn mybtn">Apply Coupon</button>
                        </div>
                    </div>
                </form><br>
                @endforeach
                @if(session('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('success')}}.
                </div>
                @endif
                @if(session('failed'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('failed')}}.
                </div>
                @endif
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Give Us Few More Information</h4>
                <form class="needs-validation" action="{{url('checkout')}}" method="post" id="payment-form">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" name="first_name" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" name="last_name" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-150" id="country_id" name="country" required="">
                                <option value="">Choose One</option>
                                @foreach($countries as $item)
                                <option value="{{$item->id}}"> {{$item->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-150" id="state_id" name="state" required="">


                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="state">City</label>
                            <select class="custom-select d-block w-100" id="city_id" name="city" required="">

                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">


                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="payment" type="radio" class="custom-control-input" value="stripe" checked="" required="">
                            <label class="custom-control-label" for="credit">Stripe</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="payment" type="radio" class="custom-control-input" value="paypal" required="">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('success')}}.
                    </div>
                    @endif

                    <hr class="mb-4">
                    <style>
                        .mybtn {
                            color: #ffffff;
                            background-color: #30398d;
                        }

                        .mybtn:hover {
                            color: #ffffff;
                            background-color: #ffb545;
                        }
                    </style>
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div> <br />
                    <button class="btn mybtn btn-lg btn-block" type="submit">Checkout</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51H8SIlGBULCb8KcFuT14kP8OPdafm8TMAfmmdjLW1OQcJ1vYZ9lgvhQAItpqZ5TnZl4utKrIRZZfckhqK4qTDeRz00ayiL6wKt');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>

<script>
    $('#country_id').change(function() {
        var country_id = $(this).val();

        if (country_id) {
            $.ajax({
                type: "GET",
                url: "{{ url('api/get-state-list')}}/" + country_id,
                success: function(res) {
                    if (res) {
                        $('#state_id').empty();
                        $('#state_id').append('<option> Select One </option>');
                        $.each(res, function(key, value) {
                            $('#state_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#state_id').empty();
                        $('#city_id').empty();
                    }
                }
            });
        } else {
            $('#state_id').empty();
        }
    });

    $('#state_id').change(function() {
        var city_id = $(this).val();

        if (city_id) {
            $.ajax({
                type: "GET",
                url: "{{ url('api/get-city-list')}}/" + city_id,
                success: function(res) {
                    if (res) {
                        $('#city_id').empty();
                        $('#city_id').append('<option> Select One </option>');
                        $.each(res, function(key, value) {
                            $('#city_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#city_id').empty();
                    }
                }
            });
        } else {
            $('#city_id').empty();
        }
    });
</script>
@endsection