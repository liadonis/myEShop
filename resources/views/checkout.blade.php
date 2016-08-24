@extends("layouts.main")

@section("title","Checkout")

@section("content")

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">Step1</h2>
            </div>
            <div class="checkout-options">
                <h3>New User</h3>
                <p>Checkout options</p>
                <ul class="nav">
                    <li>
                        <label><input type="checkbox"> Register Account</label>
                    </li>
                    <li>
                        <label><input type="checkbox"> Guest Checkout</label>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div><!--/checkout-options-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <form>
                                <input type="text" placeholder="Display Name">
                                <input type="text" placeholder="User Name">
                                <input type="password" placeholder="Password">
                                <input type="password" placeholder="Confirm password">
                            </form>
                            <a class="btn btn-primary" href="">Get Quotes</a>
                            <a class="btn btn-primary" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form>
                                    <input type="text" placeholder="Company Name">
                                    <input type="text" placeholder="Email*">
                                    <input type="text" placeholder="Title">
                                    <input type="text" placeholder="First Name *">
                                    <input type="text" placeholder="Middle Name">
                                    <input type="text" placeholder="Last Name *">
                                    <input type="text" placeholder="Address 1 *">
                                    <input type="text" placeholder="Address 2">
                                </form>
                            </div>
                            <div class="form-two">
                                <form>
                                    <input type="text" placeholder="Zip / Postal Code *">
                                    <select>
                                        <option>-- Country --</option>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>
                                    <select>
                                        <option>-- State / Province / Region --</option>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>
                                    <input type="password" placeholder="Confirm password">
                                    <input type="text" placeholder="Phone *">
                                    <input type="text" placeholder="Mobile Phone">
                                    <input type="text" placeholder="Fax">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Shipping Order</p>
                            <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                            <label><input type="checkbox"> Shipping to bill address</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{url("images/cart/one.png")}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$item->name}}</a></h4>
                                <p>{{$item->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$item->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{url("checkout?product_id=$item->id&add=1")}}"> + </a>
                                    <form method="get" action="{{url("checkout")}}">
                                        <input class="cart_quantity_input" type="qty" name="qty" value="{{$item->qty}}" autocomplete="off" size="2">
                                        <input class="cart_quantity_input" type="hidden" name="product_id" value="{{$item->id}}" >
                                    </form>
                                    <a class="cart_quantity_down" href="{{url("checkout?product_id=$item->id&minus=1")}}"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$item->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url("checkout?product_id=$item->id&clear=1")}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            {{--<div class="col-sm-6">--}}
                                <div class="total_area">
                                    <ul>
                                        <li>Cart Sub Total <span>${{Cart::total()}}</span></li>
                                        <li>Eco Tax <span>"{{Cart::tax()}}"</span></li>
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Total <span>${{Cart::total()}}</span></li>
                                    </ul>
                                    <a class="btn btn-default update" href="{{url('cart/cart_clear')}}">Cart Clear</a>
                                    <a class="btn btn-default check_out" href="">Check Out</a>
                                </div>
                            {{--</div>--}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {{--<div class="payment-options">--}}
					{{--<span>--}}
						{{--<label><input type="checkbox"> Direct Bank Transfer</label>--}}
					{{--</span>--}}
					{{--<span>--}}
						{{--<label><input type="checkbox"> Check Payment</label>--}}
					{{--</span>--}}
					{{--<span>--}}
						{{--<label><input type="checkbox"> Paypal</label>--}}
					{{--</span>--}}
            {{--</div>--}}

            <div class="col-sm-5 "></div>
            <div class="col-sm-6 ">
                <form action="allpay/checkoutAllpay">
                    <h2>ChoosePayment</h2>
                    <select class="col-sm-2 clearfix" name="payway"  >
                        <option value="ALL" selected>ALL</option>
                        <option value="Credit">Credit</option>
                        <option value="CVS">CVS</option>
                    </select>
                    <input type="submit" value="CheckOut" />
                </form>
            </div>
            <div class="col-sm-1"></div>
            <br>
            <br>
        </div>
        <br>
    </section> <!--/#cart_items-->

@endsection