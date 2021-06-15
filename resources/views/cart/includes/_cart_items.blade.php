<div class="row">
    <div class="col">
        <!-- Column Titles -->
        <div class="cart_info_columns clearfix">
            <div class="cart_info_col cart_info_col_product">Product</div>
            <div class="cart_info_col cart_info_col_price">Price</div>
            <div class="cart_info_col cart_info_col_quantity">Quantity</div>
            <div class="cart_info_col cart_info_col_total">Total</div>
        </div>
    </div>
</div>
<div class="row cart_items_row">
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
                                <input type="text" readonly pattern="[0-9]*" value="{{ $product['count'] }}">
                                <div id="{{ $product['product_info']->id }}" class="quantity_buttons">
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
</div>
<div class="row row_cart_buttons">
    <div class="col">
        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
            <div class="button continue_shopping_button"><a href={{ route('categories.index') }}>Continue shopping</a></div>
            <div class="cart_buttons_right ml-lg-auto">
                <div class="button clear_cart_button"><a href={{ route('cart.clear') }}>Clear cart</a></div>
                {{-- <div class="button update_cart_button"><a href="#">Update cart</a></div> --}}
            </div>
        </div>
    </div>
</div>
<div class="row row_extra">
    <div class="col-lg-4">
        
        <!-- Delivery -->
        <div class="delivery">
            <div class="section_title">Shipping method</div>
            <div class="section_subtitle">Select the one you want</div>
            <div class="delivery_options">
                @foreach ($ship_methods as $ship)
                    <label class="delivery_option clearfix">{{ $ship->method }}
                        <input type="radio" id="{{ $ship->id }}" name="radio">
                        <span class="checkmark"></span>
                        <span class="delivery_price">${{ $ship->price }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Coupon Code -->
        <div class="coupon">
            <div class="section_title">Coupon code</div>
            <div class="section_subtitle">Enter your coupon code</div>
            <div class="coupon_form_container">
                <form action={{ route('cart.edit-product-value')}} method="POST" id="coupon_form" class="coupon_form">
                    @if (isset($coupon))
                    <input type="text" disabled value="{{ $coupon->code }}" style="color: green" class="coupon_input" name="coupon_input" required="required">
                    @else
                        <input type="text" class="coupon_input" name="coupon_input" required="required">
                        <button type="submit" class="button coupon_button"><span>Apply</span></button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6 offset-lg-2">
        <div class="cart_total">
            <div class="section_title">Cart total</div>
            <div class="section_subtitle">Final info</div>
            <div class="cart_total_container">
                <ul>
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_total_title">Subtotal</div>
                        <div class="cart_total_value ml-auto">${{ $total_price }}</div>
                    </li>
                    @if (isset($coupon))
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Coupon</div>
                            <div class="cart_total_value ml-auto">{{ $coupon->discount }}%</div>
                        </li>
                    @endif
                    @if (isset($select_ship_method))
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Shipping</div>
                            <div class="cart_total_value ml-auto">${{ $select_ship_method->price }}</div>
                        </li>
                    @endif
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_total_title">Total</div>
                        <div class="cart_total_value ml-auto">${{ ($total_price * ($coupon->discount ?? 100) / 100) + ($select_ship_method->price ?? 0) }}</div>
                    </li>
                </ul>
            </div>
            <div class="button checkout_button"><a href={{ route('checkout') }}>Proceed to checkout</a></div>
        </div>
    </div>
</div>