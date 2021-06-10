@extends('layout')

@section('title')
    <title>Categories</title>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/categories.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
@endsection

@section('content')
<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url(images/categories.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title">Smart Phones<span>.</span></div>
                            <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories -->
<div class="products">
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col">
                
                <div class="product_grid">

                    @foreach ($categories as $category)
                        <div class="product">
                            <div class="product_image"><img src="{{ asset('images/' . $category->preview_image) }}" alt=""></div>
                            <div class="product_content">
                                <div class="product_title"><a href={{ route('categories.products.index', ['category' => $category->id]) }}>{{ $category->name }}</a></div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>



<!-- Icon Boxes -->
@include('includes._iconboxes')
<!-- Newsletter -->
@include('includes._newsletter')
@endsection

@section('javascript')
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/categories.js"></script>
@endsection