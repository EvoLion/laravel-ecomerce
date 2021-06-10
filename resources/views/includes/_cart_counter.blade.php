@if (session()->has('products'))
    <div>Cart <span>({{ count(session('products')) }})</span></div>    
@else
    <div>Cart <span>(0)</span></div>
@endif