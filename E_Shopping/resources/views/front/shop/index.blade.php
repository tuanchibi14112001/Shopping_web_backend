@extends('front.layout.master')
@section('title', 'Shop')
@section('body')
    <!-- Header section end -->

    <!-- Code here -->
    <!-- Breadcrumb Section Begin --dieu huong dinh vi vi tri-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section End -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    @include('front.shop.components.product-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    @if (request('brand'))
                                        @foreach ( request('brand') as $key=>$brand)
                                            <input type="hidden" name="brand[{{ $key }}]" value="on">
                                        @endforeach
                                    @endif
                                    @if (request('price_min'))
                                            <input type="hidden" name="price_min" value="{{request('price_min') }}">
                                    @endif
                                    @if (request('price_max'))
                                            <input type="hidden" name="price_max" value="{{request('price_max')}}">
                                    @endif
                                    @if (request('color'))
                                            <input type="hidden" name="color" value="{{request('color')}}">
                                    @endif
                                    @if (request('size'))
                                            <input type="hidden" name="size" value="{{request('size')}}">
                                    @endif
                                    <div class="select-option">
                                        <select name="sort_by" onchange="this.form.submit();" id=""
                                            class="sorting">
                                            <option {{ request('sort_by') == 'lastest' ? 'selected' : '' }}
                                                value="latest">
                                                Sorting: Latest</option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">
                                                Sorting: Oldest</option>
                                            <option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }}
                                                value="name-ascending">
                                                Sorting: Name A-Z</option>
                                            {{-- <option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }} value="price-ascending">
                                                Sorting: Price Ascending</option>
                                            <option {{ request('sort_by') == 'price-descrease' ? 'selected' : '' }} value="price-descrease">
                                                Sorting: Price Decrease</option> --}}
                                        </select>
                                        <select name="show" onchange="this.form.submit();" id=""
                                            class="p-show">
                                            <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Show: 9
                                            </option>
                                            <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Show: 3
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('front.shop.components.product-item')
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>

            </div>
    </section>

    <!-- Product Shop Section End -->

@endsection
