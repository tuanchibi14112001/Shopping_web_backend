<div class="product-item item  {{$product->tag}}">
    <div class="pi-pic">
        <img src="front/img/products/{{ $product->productImages[0]->path }}" alt="">
        @if ($product->discount != null && $product->discount > 0)
            <div class="sale">Sale</div>
        @endif
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li class="w-icon active"><a href="javascript:addCart({{$product->id}})"><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="shop/product/{{ $product->id }}">+ Quick View</a>
            </li>
            <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="category-name">{{ $product->productCategory->name }}</div>
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