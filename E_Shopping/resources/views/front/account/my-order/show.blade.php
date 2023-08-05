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
                        <a href="shop.html">My Order</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Check Out Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
                <form action="" class="checkout-form">
                    <div class="row">
                        <div class=" col-lg-6">
                            <div class="checkout-content">
                                <a href="#" class="content-btn">Time: <b>{{date('H:i:s - d/m/Y', strtotime($order->updated_at))}}</b></a>
                            </div>
                            <h4>Billing Detail</h4>
                            <div class="row">
                                <input type="hidden" name="user_id"  readonly value="{{$order->user_id ?? ''}}">
                                <div class="col-lg-12">
                                    <label for="fir">Name <span>*</span></label>
                                    <input type="text" name="name" id="fir" readonly value="{{$order->name}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="com-name">Company Name</label>
                                    <input type="text" name="company_name" id="com-name" value="{{$order->company_name ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="coun">Country <span>*</span></label>
                                    <input type="text" name="country" id="coun" value="{{$order->country ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Street Address <span>*</span></label>
                                    <input type="text" name="street_address" id="street" class="street-first"
                                        readonly value="{{$order->street_address ?? ''}}">
                                    <!-- <input type="text" name="" id=""> -->
                                </div>
                                <div class="col-lg-12">
                                    <label for="zip">Postcode / ZIP (optional) </label>
                                    <input type="text" name="postcode_zip" id="zip" value="{{$order->postcode_zip ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Town / City </label>
                                    <input type="text" name="town_city" id="town" value="{{$order->town_city ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email Address <span>*</span> </label>
                                    <input type="text" name="email" id="email" readonly value="{{$order->email ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Phone <span>*</span> </label>
                                    <input type="text" name="phone" id="phone" readonly value="{{$order->phone ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a class="content-btn">Status: <b>{{\App\Utilities\Constant::$order_status[$order->status]}}</b></a>
                            </div>
                            <div class="place-order">
                                <h4>Your Order</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Product <span>Total</span></li>
                                        @foreach ($order->order_details as $order_detail)
                                            <li class="fw-normal">{{ $order_detail->product->name }} x {{ $order_detail->qty }}
                                                <span>${{ number_format($order_detail->total, 2) }}</span></li>
                                        @endforeach
                                        <li class="fw-normal">Subtotal <span>{{ 0 }}</span></li>
                                        <li class="total-price">Total <span>${{ number_format(array_sum(array_column($order->order_details->toArray(),'total')), 2)}}</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Pay later
                                                <input type="radio" name="payment_type" value="pay_later" id="pc-check" 
                                                    {{ $order->payment_type == 'pay_latter' ? 'checked' : '' }} checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Online payment
                                                <input type="radio" name="payment_type" value="online_payment" 
                                                    id="pc-paypal" {{$order->payment_type == 'online_payment' ? 'checked' : ''}}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
            
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
