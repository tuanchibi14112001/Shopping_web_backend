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
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i class="ti-close"></i></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cart-pic first-row"><img src="front/img/cart-page/product-1.jpg" alt="">
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>Pure Pineapple</h5>
                                    </td>
                                    <td class="p-price first-row">
                                        $48.00
                                    </td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="1"
                                                    onkeyup="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                    onblur="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                    min="1" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">$48.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr>
                                <tr>
                                    <td class="cart-pic"><img src="front/img/cart-page/product-2.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>Pure Pineapple</h5>
                                    </td>
                                    <td class="p-price">
                                        $48.00
                                    </td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="1"
                                                    onkeyup="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                    onblur="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                    min="1" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$48.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr>
                                <tr>
                                    <td class="cart-pic"><img src="front/img/cart-page/product-3.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>Pure Pineapple</h5>
                                    </td>
                                    <td class="p-price">
                                        $48.00
                                    </td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" value="1"
                                                    onkeyup="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                    onblur="if(this.value<=0)this.value=1; this.value = Math.round(this.value)"
                                                    min="1" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$48.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr>
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
                                    <li class="subtotal">Subtotal <span>$240.00</span></li>
                                    <li class="cart-total">Total <span>$240.00</span></li>
                                </ul>
                                <a href="check-out.html" class="proceed-btn">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->

@endsection
