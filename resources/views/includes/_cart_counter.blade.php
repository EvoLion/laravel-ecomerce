@if (session()->has('cart_counter'))
Cart <span>({{ session('cart_counter') }})</span>
@else
Cart <span>(0)</span>
@endif