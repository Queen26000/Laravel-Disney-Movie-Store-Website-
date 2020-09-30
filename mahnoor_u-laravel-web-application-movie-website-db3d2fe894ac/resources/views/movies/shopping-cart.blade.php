@extends('layouts.shop')

@section('title')
    Disney Movie Website
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($movies as $movie)
                            <li class="list-group-item">
                                <span class="badge badge-secondary">{{ $movie['qty'] }}</span>
                                <strong>{{ $movie['item']['name'] }}</strong>
                                <span class="label label-success">£{{ $movie['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Remove <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('cart-reduce', ['id' => $movie['item']['id']]) }}">Remove 1 item</a></li>
                                        <li><a href="{{ route('cart-remove', ['id' => $movie['item']['id']]) }}">Remove all items</a></li>
                                    </ul>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: £{{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2 class="text-white">No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection
