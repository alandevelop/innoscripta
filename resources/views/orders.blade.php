@extends('layouts.mainLayout')

@section('title', 'Cart')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center">Orders</h2>

            @if(!$orders->count())
                <p class="h2 text-center text-success empty-cart">There is no any orders yet</p>
            @endif

            @if($orders->count())
                @foreach($orders as $order)
                    <div class="card mb-2 p-2 product-cart-item">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-md-10 pl-2">
                                <p class="card-text"><strong>Address:</strong> {{$order->address}};</p>
                                <p class="card-text"><strong>Name:</strong> {{$order->name}}; <strong>Surname:</strong> {{$order->surname}}</p>
                                <p class="card-text"><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}</p>
                            </div>
                            <div class="col-md-2 pl-2">
                                <p class="card-text h2">{{$order->total_price}}€</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection


@section('bodyEnd')
    <script src="/js/cart.js"></script>
@endsection


