@extends('layouts.frontend_master')

@section('frontend_content')
@section('title')
    @if(session()->get('language') == 'bangla') চেকআউট @else Checkout @endif
@endsection
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Checkout Page</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<style>
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
        background-color: #fefde5 !important;}
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
        width: 100%;
    }
</style>
<!-- checkout area start -->
<div class="checkout-area mt-60px mb-40px">
    <div class="container">
            @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    @foreach ($carts as $item)
                                    <li><span class="order-middle-left">Product Image</span> <span class="order-price"><img src="{{ asset($item->options->image) }}" width="50" alt=""></span></li>
                                    @if($item->options->color_en == NULL)
                                    @else
                                        <li><span class="order-middle-left">Product Color</span> <span class="order-price">{{ $item->options->color_en }}</span></li>
                                    @endif
                                    @if($item->options->size_en == NULL)
                                    @else
                                        <li><span class="order-middle-left">Product Size</span> <span class="order-price">{{ $item->options->size_en }}</span></li>
                                    @endif
                                    <li><span class="order-middle-left">Price / Quantity :</span> <span class="order-price">{{ $item->price }} * {{ $item->qty }}</span></li>

                                    <li><span class="order-middle-left">subtotal :</span> <span class="order-price">= {{ $item->price * $item->qty }}</span></li>

                                    <hr>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                @if(Session::has('coupon'))
                                <ul>
                                    <li class="order-total">Subtotal</li>
                                    <li>{{ $cartTotal }} ৳</li>
                                </ul>
                                <ul>
                                    <li class="order-total">Coupon Discount :</li>
                                    <li>({{ Session::get('coupon')['coupon_discount'] }}%) - {{ Session::get('coupon')['coupon_amount'] }} ৳ </li>
                                </ul>
                                <ul>
                                    <li class="order-total">Grand Total :</li>
                                    <li>= {{ Session::get('coupon')['total_amount'] }} ৳</li>
                                </ul>
                                @else
                                <ul>
                                    <li class="order-total">Subtotal</li>
                                    <li>{{ $cartTotal }} ৳</li>
                                </ul>
                                <ul>
                                    <li class="order-total">Grand Total</li>
                                    <li>{{ $cartTotal }} ৳</li>
                                </ul>
                                @endif
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <form action="{{ route('payment.order') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <br>
                            <button class="btn btn-primary">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
 // Create a Stripe client.
 var stripe = Stripe('pk_test_51I7dqILVjUl3jfbmNL9gvDbSuUsizBSVEdLVydU6hpWYlQvwDtPj84SYWhaPVv5Vx6oySIso36zBcaLUqKqcXo0W00xsiRqV6g');

// Create an instance of Elements.
var elements = stripe.elements();

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
var card = elements.create('card', {style: style});

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
@endsection
