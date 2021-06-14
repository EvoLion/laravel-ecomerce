<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $collection = collect([]);
        if(session()->has('products')) { 
            $products = session('products');
            $total_price = null;

            foreach ($products as $key => $product) {
                $cart_product = Product::where('id', $key)->first();
                $total_price += $cart_product->price * $product;
    
                $collection->push(['product_info' => $cart_product, 'count' => $product]);
            }
        } else {
            return back();
        }
        return view('checkout', ['cart_products' => $collection->all(), 'total_price' => $total_price]);
    }

    public function create() {

    }
}
