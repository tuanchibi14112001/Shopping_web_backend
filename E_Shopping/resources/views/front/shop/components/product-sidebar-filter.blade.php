<form action="{{request()->segment(2) == 'product' ? 'shop':''}}">
    <div class="filter-widget">
        <h4 class="fw-title">Catagories</h4>
        <ul class="filter-catagories">
            @foreach ($categories as $category)
                <li><a href="/shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">
            @foreach ($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{ $brand->id }}">
                        {{ $brand->name }}
                        <input type="checkbox"
                            {{ (request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
                            name="brand[{{ $brand->id }}]" id="bc-{{ $brand->id }}"
                            onchange="this.form.submit();">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                data-min="10" data-max="999"
                data-min-value="{{ str_replace('$', '', request('price_min')) }}"
                data-max-value="{{ str_replace('$', '', request('price_max')) }}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0"
                    class="ui-slider-handle ui-corner-all ui-state-default bg-danger"></span>
                <span tabindex="0"
                    class="ui-slider-handle ui-corner-all ui-state-default bg-danger"></span>
            </div>
        </div>
        <button type="submit" class="filter-btn">FILTER</button>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" name="color" value="black" onchange="this.form.submit();"
                    id="cs-black" {{ request('color') == 'black' ? 'checked' : '' }}>
                <label class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}"
                    for="cs-black">Black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue" name="color" value="blue"
                    onchange="this.form.submit();" {{ request('color') == 'blue' ? 'checked' : '' }}>
                <label class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}"
                    for="cs-blue">Blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red"name="color" value="red"
                    onchange="this.form.submit();" {{ request('color') == 'red' ? 'checked' : '' }}>
                <label class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}"
                    for="cs-red">Red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet"name="color" value="violet"
                    onchange="this.form.submit();" {{ request('color') == 'violet' ? 'checked' : '' }}>
                <label class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}"
                    for="cs-violet">Violet</label>
            </div>
        </div>

    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size" name="size" value="s"
                    onchange="this.form.submit();">
                <label class="{{ request('size') == 's' ? 'active' : '' }}" for="s-size">S</label>
                <input type="radio" id="m-size" name="size" value="m"
                    onchange="this.form.submit();">
                <label class="{{ request('size') == 'm' ? 'active' : '' }}" for="m-size">M</label>
                <input type="radio" id="l-size" name="size" value="l"
                    onchange="this.form.submit();">
                <label class="{{ request('size') == 'l' ? 'active' : '' }}" for="l-size">L</label>
                <input type="radio" id="xl-size" name="size" value="xl"
                    onchange="this.form.submit();">
                <label class="{{ request('size') == 'xl' ? 'active' : '' }}" for="xl-size">XL</label>
            </div>
        </div>
    </div>
    {{-- <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Man's Hats</a>
        </div>
    </div> --}}
</form>