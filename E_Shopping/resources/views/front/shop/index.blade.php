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
                    <div class="filter-widget">
                        <h4 class="fw-title">Catagories</h4>
                        <ul class="filter-catagories">
                            @foreach ($categories as $category)
                                <li><a href="/shop/category/{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" name="" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" name="" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-poto">
                                    Poto
                                    <input type="checkbox" name="" id="bc-poto">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>

                            </div>
                        </div>
                        <a href="#" class="filter-btn">FILTER</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                        </div>

                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" name="" id="s-size">
                                <label for="s-size">S</label>
                                <input type="radio" name="" id="m-size">
                                <label for="m-size">M</label>
                                <input type="radio" name="" id="l-size">
                                <label for="l-size">L</label>
                                <input type="radio" name="" id="xl-size">
                                <label for="xl-size">XL</label>
                                <input type="radio" name="" id="xxl-size">
                                <label for="xxl-size">XXL</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Man's Hats</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" onchange="this.form.submit();" id=""
                                            class="sorting">
                                            <option {{ request('sort_by') == 'lastest' ? 'selected' : '' }} value="latest">
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
                                            <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Show: 3
                                            </option>
                                            <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Show: 9
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
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="front/img/products/{{ $product->productImages[0]->path }}"
                                                alt="">
                                            @if ($product->discount != null && $product->discount > 0)
                                                <div class="sale pp-sale">Sale</div>
                                            @endif
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href=""><i
                                                            class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="shop/product/{{ $product->id }}">+ Quick
                                                        View</a></li>
                                                <li class="w-icon"><a href=""><i class="fa fa-random"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">{{ $product->productCategory->name }}</div>
                                            <a href="">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">

                                                @if ($product->discount != null && $product->discount > 0)
                                                    ${{ $product->discount }} <span> ${{ $product->price }}</span>
                                                @else
                                                    ${{ $product->price }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
