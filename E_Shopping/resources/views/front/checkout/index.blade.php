@extends('front.layout.master')
@section('title', 'Checkout')

@section('body')


    <!-- Code here -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.html"> Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Check Out Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="POST" class="checkout-form">
                @csrf
                <div class="row">
                    <div class=" col-lg-6">
                        <div class="checkout-content">
                            <a href="login.html" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Billing Detail</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name <span>*</span></label>
                                <input type="text" name="first_name" id="fir" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name <span>*</span></label>
                                <input type="text" name="last_name" id="last" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="com-name">Company Name</label>
                                <input type="text" name="company_name" id="com-name">
                            </div>
                            <div class="col-lg-12">
                                <label for="coun">Country <span>*</span></label>
                                <input type="text" name="country" id="coun">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span>*</span></label>
                                <input type="text" name="street_address" id="street" class="street-first" required>
                                <!-- <input type="text" name="" id=""> -->
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional) </label>
                                <input type="text" name="postcode_zip" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City </label>
                                <input type="text" name="town_city" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address <span>*</span> </label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone <span>*</span> </label>
                                <input type="text" name="phone" id="phone" required>
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create An Account
                                        <input type="checkbox" name="" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" name="" id="" placeholder="Enter Your Copon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach ($carts as $cart)
                                        <li class="fw-normal">{{$cart->name}} x {{$cart->qty}} <span>${{ number_format($cart->price * $cart->qty, 2) }}</span></li>
                                    @endforeach
                                    <li class="fw-normal">Subtotal <span>{{$subtotal}}</span></li>
                                    <li class="total-price">Total <span>{{$total}}</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Online payment
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Check Out Section End -->


    <!-- Code here -->


@endsection
