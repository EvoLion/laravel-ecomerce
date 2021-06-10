@extends('layout')

@section('title')
    <title>Products</title>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection

@section('content')
<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/categories.jpg)"></div>
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

<!-- Products -->
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Showing <span>{{ $products->count() }}</span> results</div>
                    <div class="sorting_container ml-md-auto">
                        <div class="sorting">
                            <ul class="item_sorting">
                                <li>
                                    <span class="sorting_text">Sort by</span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <ul>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                
                <div class="product_grid">

                    <!-- Product -->
                    @foreach ($products as $product)
                        @include('includes._card')
                    @endforeach

                </div>
                <div class="product_pagination">
                    <ul>
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $products->url($i) }}">{{ '0' . $i . '.' }}</a>
                            </li>
                        @endfor
                    </ul>
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
    <script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="/js/categories.js"></script>
@endsection