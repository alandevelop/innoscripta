@extends('layouts.mainLayout')

@section('title', 'Cart')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center">Cart</h2>

            <p class="h2 text-center text-success empty-cart" @if($productsModels) style="display: none;" @endif>Cart is empty</p>

            @if($productsModels)
                <form class="cart-form" method="POST" action="{{route('createOrder')}}">
                    @csrf
                    <input class="total-price-hidden" type="hidden" name="total_price" value="{{$totalCartPrice + 30}}">

                    @foreach($productsModels as $product)
                        <div class="card mb-2 p-2 product-cart-item">
                            <div class="row no-gutters d-flex align-items-center">

                                <div class="col-md-1">
                                    <img src="/img/{{$product->img}}" class="card-img-top" alt="..." style="width: 100%;">
                                </div>

                                <div class="col-md-9 pl-2">
                                    <h5 class="card-title" style="margin-bottom: 0;">{{$product->name}}</h5>
                                    <p class="card-text mb-0">{{$product->price}}€ a piece</p>
                                </div>

                                <div class="col-md-2">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary decrease_in_cart"
                                                    type="button"
                                                    data-product-id="{{$product->id}}"
                                                    data-price="{{$product->price}}"
                                            >-</button>
                                        </div>
                                        <input readonly="readonly"
                                               name="products[{{$product->id}}]"
                                               data-price="{{$product->price}}"
                                               type="number"
                                               value="{{$product->quantity}}"
                                               class="form-control product-cart-input text-center"
                                               style="border-color: #6c757d; border-right: none;">
                                        <div class="input-group-prepend">

                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary add_to_cart"
                                                    type="button"
                                                    data-product-id="{{$product->id}}"
                                                    data-price="{{$product->price}}"
                                            >+</button>
                                            <button class="btn btn-outline-danger remove_from_cart"
                                                    type="button"
                                                    data-price="{{$product->price}}"
                                                    data-product-id="{{$product->id}}"
                                            >Delete</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <hr class="mt-5 mb-5">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="inputName">Surname</label>
                                <input type="text" class="form-control" id="inputName" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="surname" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address</label>
                                <input type="text" class="form-control" id="inputName" name="address" required>
                            </div>
                        </div>
                        <div class="col-md-5 text-right">
                            <p><span class="total_btm">{{$totalCartPrice}}</span>€ + <span>30€ (Delivery)</span> </p>
                            <p>
                                <span class="h2 font-weight-bold">Total: <span class="total_btmDel">{{$totalCartPrice + 30}}</span>€</span>
                                <span class="h2 font-weight-bold text-secondary">
                                    (<span class="usd-total" data-rate="{{$usdRate}}">{{$totalInUsd + 30}}</span>$)
                                </span>
                            </p>
                            <button type="submit" class="btn btn-success" style="width: 150px;">Order</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

@endsection


@section('bodyEnd')
    <script src="/js/cart.js"></script>
@endsection


