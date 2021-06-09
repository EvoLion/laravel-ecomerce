<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Showing <span>{{ $category->products->count() }}</span> results</div>
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
                    @foreach ($category->products as $product)
                        <x-card>
                            <x-slot name="id">
                                {{ $product->id }}
                            </x-slot>
                            <x-slot name="name">
                                {{ $product->name }}
                            </x-slot>
                            <x-slot name="price">
                                {{ $product->price }}
                            </x-slot>
                        </x-card>
                    @endforeach

                </div>
                <div class="product_pagination">
                    <ul>
                        {{-- @for ($i = 1; $i <= $category->products->lastPage(); $i++)
                            <li class="{{ ($category->products->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $category->products->url($i) }}">{{ '0' . $i . '.' }}</a>
                            </li>
                        @endfor --}}
                    </ul>
                </div>
                    
            </div>
        </div>
    </div>
</div>