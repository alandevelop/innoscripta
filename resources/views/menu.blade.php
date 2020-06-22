@extends('layouts.mainLayout')

@section('title', 'Menu')


@section('content')
    <div class="row mt-5">
        <div class="col-12">

            @if(session()->has('order_success'))
                <div class="alert alert-success mb-5" role="alert">
                    Your order has been received!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

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
@endsection

@section('bodyEnd')
    <script src="/js/menu.js"></script>
@endsection


