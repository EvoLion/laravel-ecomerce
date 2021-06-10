<div class="product">
    <div class="product_image"><img src={{ asset('images/' . $product->preview_image) }} alt=""></div>
    @if (isset($product->sale_price))
        @if ($product->price >= $product->sale_price)
            <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
        @endif
    @endif
    @if (\Carbon\Carbon::parse($product->created_at)->diffInDays((\Carbon\Carbon::now())) <= 30)
        <div class="product_extra product_new"><a href="categories.html">New</a></div>
    @endif

    <div class="product_content">
        <div class="product_title"><a href={{ route('products.show', ['product' => $product->id]) }}>{{ $product->name }}</a></div>
        @if (is_null($product->sale_price))
            <div class="product_price">${{ $product->price }}</div>
        @else
            @if ($product->price <= $product->sale_price)
                <div class="product_price">${{ $product->price }}</div>
            @else
                <div class="product_discount">${{ $product->price }}</div>
                <div class="product_price">${{ $product->sale_price }}</div>
            @endif
        @endif
    </div>
</div>