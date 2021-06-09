<div class="products">
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col">
                
                <div class="product_grid">

                    <!-- Product -->
                    @foreach ($categories as $category)
                    <x-category-card>
                        <x-slot name="id">
                            {{ $category->id }}
                        </x-slot>
                        <x-slot name="name">
                            {{ $category->name }}
                        </x-slot>
                    </x-category-card>
                    @endforeach

                </div>
                <div class="product_pagination">
                    <ul>
                        @for ($i = 1; $i <= $categories->lastPage(); $i++)
                            <li class="{{ ($categories->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $categories->url($i) }}">{{ '0' . $i . '.' }}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
                    
            </div>
        </div>
    </div>
</div>