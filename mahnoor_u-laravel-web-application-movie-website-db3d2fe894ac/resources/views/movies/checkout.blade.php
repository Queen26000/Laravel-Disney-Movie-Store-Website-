@extends('layouts.movie')

@section('content')
<h1 class="text-white text-center">Checkout</h1>
<h4 class="text-white text-center">Your Total: £{{ $total }}</h4>
<br>
    <div class="row justify-content-center" col-md-6>
        <form method="post" action="{{ route('checkout') }}" id="checkout-form">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control-lg" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" id="address" name="address" placeholder="Address" required></textarea>
            </div>
            <div class="form-group">
                <input type="number" class="form-control-lg" name="card-name" id="card-name" placeholder="Card Holder Name" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control-lg" name="card-number" id="card-number" placeholder="Credit Card Number" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control-lg" name="card-expiry-month" id="card-expiry-month" placeholder="Expiration Month" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control-lg" name="card-expiry-year" id="card-expiry-year" placeholder="Expiration Year" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control-lg" name="card-cvc" id="card-cvc" placeholder="CVC" required>
            </div>

            </div>
            <br>
        <center><button class="btn btn-primary btn-lg " type="submit">Buy</button></center>
        </form>
    </div>
    <br>


@endsection
