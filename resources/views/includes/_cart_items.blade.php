<div class="col">

    <!-- Cart Item -->
    @if (isset($cart_products))
        @foreach ($cart_products as $product)
            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                <!-- Name -->
                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_item_image">
                        <div><img src={{ asset('images/' . $product['product_info']->preview_image) }} alt=""></div>
                    </div>
                    <div class="cart_item_name_container">
                        <div class="cart_item_name"><a href={{ route('products.show', ['product' => $product['product_info']->id]) }}>{{ $product['product_info']->name }}</a></div>
                        <div class="cart_item_edit"><a href="#">Edit Product</a></div>
                    </div>
                </div>
                <!-- Price -->
                <div class="cart_item_price">${{ $product['product_info']->price }}</div>
                <!-- Quantity -->
                <div class="cart_item_quantity">
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Qty</span>
                            <input id="quantity_input" type="text" pattern="[0-9]*" value="{{ $product['count'] }}">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total -->
                <div class="cart_item_total">${{ $product['product_info']->price * $product['count'] }}</div>
            </div>
        @endforeach
    @endif
    

</div>