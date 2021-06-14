@extends('layout')

@section('title')
    <title>Cart</title>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
@endsection

@section('cart')
    <div class="cart">
        @include('cart.includes._cart_counter')
    </div>
@endsection

@section('content')
<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="categories.html">Categories</a></li>
										<li>Shopping Cart</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container cart_container">
			@include('cart.includes._cart_items')
		</div>		
	</div> 
@endsection

@section('javascript')
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/cart.js"></script>


	<script>

		let id;
		let value;

        $( document ).ready(function() {
			initQuantity();
		});

		function initQuantity()
		{
			// Handle product quantity input
			if($('.product_quantity').length)
			{
				var originalVal;
				var endVal;

				$('.quantity_inc').on('click', function()
				{
					originalVal = $(this).parent().prev().val();
					endVal = parseFloat(originalVal) + 1;
					$(this).parent().prev().val(endVal);
					
					id = $(this).parent().attr("id");
					value = $(this).parent().prev().val();
					editProductValue();
				});

				$('.quantity_dec').on('click', function()
				{
					originalVal = $(this).parent().prev().val();
					if(originalVal > 1)
					{
						endVal = parseFloat(originalVal) - 1;
						$(this).parent().prev().val(endVal);

						id = $(this).parent().attr("id");
						value = $(this).parent().prev().val();
						editProductValue();
					}
				});
			}
		}


		function editProductValue() {
            $.ajax({
                url: "{{ route('cart.edit-product-value') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: { 'id' : id, 'value' : value },
                success: function(data) {
                    $('.cart_container').html(data);
					initQuantity();
					refreshCartCounter();
                },
                error: function(data){
                    alert("ERROR - " + data.responseText);
                }
            });
        }

		function refreshCartCounter() {
            $.ajax({
                url: "{{ route('cart.refresh-cart-counter') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                success: function(data) {
                    $('.cart').html(data);
                },
                error: function(data){
                    alert("ERROR - " + data.responseText);
                }
            });
        }

	</script>
@endsection