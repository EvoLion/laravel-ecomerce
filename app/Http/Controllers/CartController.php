<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('cart.index');
    }

    public function addToCart(Request $request)
    {
        session()->push('products', $request->id);
        // session(["product" => $request->id]);
        // $products_in_cart = session('products');

        // dd($request->session()->get('products'));
        $products = session('products');
        
        return view('includes._cart_counter')->render();
    }
}
