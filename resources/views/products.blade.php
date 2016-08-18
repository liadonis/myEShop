@extends("layouts.main")

@section("title","Product")

@section("content")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include("parts.leftSidebar")
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset("images/shop/product11.jpg")}}" alt="" />
                                        <h2>{{$product->pro_price}}</h2>
                                        <p>{{$product->pro_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{$product->pro_price}}</h2>
                                            <p>{{$product->pro_name}}</p>
                                            {{--<form method="POST" action="{{url("cart/add")}}">--}}
                                            <form method="POST" action="{{url("cart")}}">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="btn-default add-to-cart"><i class="fa fa-shopping-cart">Add to cart</i></button>
                                            </form>
                                            <a href="{{url("products/detail/$product->id")}}" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-info"></i>Product Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection