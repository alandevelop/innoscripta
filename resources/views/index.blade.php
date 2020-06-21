<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Pizza</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand">Pizza Shop</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Orders</a>
                        </li>
                    </ul>
                    <span class="navbar-text">test@mail.ru</span>
                    <button class="btn btn-outline-success ml-2" type="button"
                    >Cart
                        @if($totalCartPrice)
                            <span class="cart_value"><span class="cart_total">{{$totalCartPrice}}</span>€</span>
                        @else
                            <span class="cart_value" style="display: none"><span class="cart_total"></span>€</span>
                        @endif
                    </button>
                </div>
            </nav>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center">Menu</h2>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link @if($loop->first) active @endif"
                           id="{{$category->name}}-tab"
                           data-toggle="tab"
                           href="#{{$category->name}}"
                           role="tab"
                           aria-controls="{{$category->name}}"
                           aria-selected="true">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">

                @foreach($categories as $category)
                    <div class="tab-pane fade @if($loop->first) show active @endif " id="{{$category->name}}" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row d-flex flex-row justify-content-start flex-wrap pt-3">
                        @foreach($category->products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                                <div class="card h-100">
                                    <img src="img/{{$product->img}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        <p class="card-text">{{$product->description}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush" style="border-bottom: none;">
                                        <li class="list-group-item text-right"><strong>{{$product->price}}€</strong></li>
                                    </ul>
                                    <div class="card-footer text-muted text-right card-btns-container">
                                        <button type="button"
                                                class="btn btn-outline-primary add_to_cart"
                                                data-id="{{$product->id}}"
                                                data-price="{{$product->price}}"
                                                @if($product->inCart) style="display: none" @endif
                                        >Add to cart</button>

                                        <button type="button"
                                                class="btn btn-outline-danger remove_from_cart"
                                                data-id="{{$product->id}}"
                                                data-price="{{$product->price}}"
                                                @if(!$product->inCart) style="display: none" @endif
                                        >Remove from cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="/js/menu.js"></script>

</body>
</html>
