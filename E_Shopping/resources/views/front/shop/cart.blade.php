@extends('front.layout.master')
@section('title', 'Cart')
@section('body')
    <!-- Code here -->
    <!-- Breadcrumb Section Begin --dieu huong dinh vi vi tri-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.html"> Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                @if (Cart::count() > 0)
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>
                                        <i class="ti-close"
                                            onclick="confirm('Are you sure to delete all carts?')=== true ? destroyCart():''"
                                            style="cursor: pointer"></i>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr data-rowid="{{ $cart->rowId }}">
                                            <td class="cart-pic first-row"><img style="height: 170px;width: 170px;"
                                                    src="front/img/products/{{ $cart->options->images[0]->path }}"
                                                    alt="">
                                            </td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $cart->name }}</h5>
                                            </td>
                                            <td class="p-price first-row">
                                                ${{ number_format($cart->price, 2) }}
                                            </td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" value="{{ $cart->qty }}" data-rowid="{{$cart->rowId}}" data-max_qty = "{{$cart->options->max_qty}}"
                                                            onkeyup="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                            onblur="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                            min="1" max="{{$cart->options->max_qty}}" required>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">
                                                ${{ number_format($cart->price * $cart->qty, 2) }}
                                            </td>
                                            <td class="close-td">
                                                <i class="ti-close" onclick="removeCart('{{ $cart->rowId }}')"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="#" class="primary-btn continue-shop">Continue Shopping</a>
                                    <a href="#" class="primary-btn up-cart">Update Cart</a>
                                </div>
                                <div class="discount-coupon">
                                    <h6>Discount Code</h6>
                                    <form action="#" class="coupon-form">
                                        <input type="text" name="" id="" placeholder="Enter your code">
                                        <button type="submit" class="site-btn coupon-btn">Apply</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Subtotal <span>${{ $subtotal }}</span></li>
                                        <li class="cart-total">Total <span>${{ $total }}</span></li>
                                    </ul>
                                    <a href="check-out.html" class="proceed-btn">PROCEED TO CHECKOUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <h4>Your cart is empty.</h4>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->

@endsection
