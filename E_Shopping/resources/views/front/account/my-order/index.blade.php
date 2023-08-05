@extends('front.layout.master')
@section('title', 'My Order')
@section('body')
    <!-- Code here -->
    <!-- Breadcrumb Section Begin --dieu huong dinh vi vi tri-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <span>My Order</span>
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
                                <th>ID</th>
                                <th>Proudcts</th>
                                <th>Total</th>
                                <th>Detail</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td class="cart-pic first-row"><img style="height: 170px;width: 170px;"
                                                src="front/img/products/{{ $order->order_details[0]->product->productImages[0]->path }}"
                                                alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5 style="text-align: center;">#{{ $key + 1 }}</h5>
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5 style="text-align: center;">{{ $order->order_details[0]->product->name }}
                                                @if (count($order->order_details) > 1)
                                                    and {{ count($order->order_details) - 1 }} other products
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="total-price first-row">${{ number_format(array_sum(array_column($order->order_details->toArray(),'total')), 2)}}</td>
                                        <td class="first-row view-detail"><a href="./account/my-order/{{$order->id}}">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection
