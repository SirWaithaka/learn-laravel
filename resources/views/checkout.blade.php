@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

  <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

  <div class="container">

    @if (session()->has('success_message'))
      <div class="alert alert-success">
        {{ session()->get('success_message') }}
      </div>
    @endif

    @if (count($errors) > 0)
      <div class="alert alert-error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif


    <h1 class="checkout-heading stylish-heading">Checkout</h1>
    <div class="checkout-section">
      <div>
        <form id="payment-form" action="{{ route('checkout.store') }}" method="POST">
          {{ csrf_field() }}
          <h2>Billing Details</h2>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input required type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input required type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input required type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
          </div>

          <div class="half-form">
            <div class="form-group">
              <label for="city">City</label>
              <input required type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>
            <div class="form-group">
              <label for="province">Province</label>
              <input required type="text" class="form-control" id="province" name="province" value="{{ old('province') }}">
            </div>
          </div> <!-- end half-form -->

          <div class="half-form">
            <div class="form-group">
              <label for="postalcode">Postal Code</label>
              <input required type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input required type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
          </div> <!-- end half-form -->

          <div class="spacer"></div>

          <h2>Payment Details</h2>

          <div class="form-group">
            <label for="name_on_card">Name on Card</label>
            <input required type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
          </div>
          <div class="form-group">
            <label for="card-element">
              Credit or debit card
            </label>
            <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>
        
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
          </div>

          <div class="spacer"></div>

          <button id="complete-order" type="submit" class="button-primary full-width">Complete Order</button>
        </form>
      </div>


      <div class="checkout-table-container">
        <h2>Your Order</h2>

        <div class="checkout-table">

          @foreach(Cart::content() as $item)
            <div class="checkout-table-row">
              <div class="checkout-table-row-left">
                <img src="/img/macbook-pro.png" alt="item" class="checkout-table-img">
                <div class="checkout-item-details">
                  <div class="checkout-table-item">{{ $item->model->name }}</div>
                  <div class="checkout-table-description">{{ $item->model->details }}</div>
                  <div class="checkout-table-price">{{ $item->model->presetPrice() }}</div>
                </div>
              </div> <!-- end checkout-table -->

              <div class="checkout-table-row-right">
                <div class="checkout-table-quantity">{{ $item->qty }}</div>
              </div>
            </div> <!-- end checkout-table-row -->
          @endforeach

        </div> <!-- end checkout-table -->

        <div class="checkout-totals">
            <div class="checkout-totals-left">
                SubTotal <br>
                {{-- Discount (10OFF - 10%) <br> --}}
                <br>
                <span class="checkout-totals-total">Total</span>

            </div>

            <div class="checkout-totals-right">
                {{ presetPrice(Cart::subtotal()) }} <br>
                {{-- -$750.00 <br> --}}
                {{ presetPrice(Cart::tax()) }} <br>
                <span class="checkout-totals-total">{{ presetPrice(Cart::total()) }}</span>

            </div>
        </div> <!-- end checkout-totals -->

      </div>

    </div> <!-- end checkout-section -->
  </div>

@endsection

@section('extra-js')
  <script>
    (function () {
      // Create a Stripe client.
      var stripe = Stripe('pk_test_Jk6D1GOVc5r2h2mkplrjy25T');

      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
        base: {
          color: '#32325d',
          lineHeight: '18px',
          fontFamily: '"Roboto", "Helvetica Neue", Helvetica, sans-serif',
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
        hidePostalCode: true,
        style: style
      });

      // Add an instance of the card Element into the `card-element` <div>.
      card.mount('#card-element');

      // Handle real-time validation errors from the card Element.
      card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      });

      // Handle form submission.
      var form = document.getElementById('payment-form');
      
      // set default values
      // for dev only
      document.querySelector('#email').value = 'blah@email.com';
      document.querySelector('#name').value = 'Blah Blah';
      document.querySelector('#address').value = 'Street Address';
      document.querySelector('#city').value = 'Nrb';
      document.querySelector('#province').value = 'Nai';
      document.querySelector('#postalcode').value = '00100';
      document.querySelector('#phone').value = '0700000000';
      document.querySelector('#name_on_card').value = 'Blaaah';

      form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Disable the submit button to prevent repeated clicks
        document.querySelector('#complete-order').disabled = true;

        var options = {
          name: document.querySelector('#name_on_card').value,
          address_line1: document.querySelector('#address').value,
          address_city: document.querySelector('#city').value,
          address_state: document.querySelector('#province').value,
          address_zip: document.querySelector('#postalcode').value,
        };

        stripe.createToken(card, options).then(function(result) {
          if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;

            // Enable the submit button
            document.querySelector('#complete-order').disabled = false;
          } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
          }
        });
      });

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

    })();
  </script>
@endsection