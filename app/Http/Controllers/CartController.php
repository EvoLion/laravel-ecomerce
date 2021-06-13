<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $collection = collect([]);
        if(session()->has('products')) { 
            $products = session('products');

            foreach ($products as $key => $product) {
                $cart_product = Product::where('id', $key)->first();
    
                $collection->push(['product_info' => $cart_product, 'count' => $product]);
            }
        } else {
            return back();
        }
        
        return view('cart.index', ['cart_products' => $collection->all()]);
    }

    public function editProductValue(Request $request)
    {
        $collection = collect([]);
        $products = session('products');
        $products[$request->id] = $request->value;
        session(['products' => $products]); // перезапись сессии
        
        foreach ($products as $key => $product) {
            $cart_product = Product::where('id', $key)->first();

            $collection->push(['product_info' => $cart_product, 'count' => $product]);
            // dd($product);
        }
        return view('includes._cart_items', ['cart_products' => $collection->all()])->render();
    }

    public function addToCart(Request $request)
    {
        if (!session()->has('products')) { // если сессия не существует
            session(['products' => []]); // то создаем сессию с пустым массивом
        }
        $products = session('products'); // в переменную записываются данные с сессии
        if (array_key_exists($request->id, $products)) { // проверка наличия ключа в переменной
            $products[$request->id] += $request->value; // прибавление количества к существующему товару
        } else {
            $products[$request->id] = $request->value; // добавление нового товара
        }
        session(['products' => $products]); // перезапись сессии
        session()->increment('cart_counter', $request->value);
        
        return view('includes._cart_counter')->render();
    }

    // public function clearCart()
    // {
    //     if(session()->has('products')) {
    //         session()->forget('products');
    //     }
        
    //     return redirect()->route('home');
    // }

    public function clearCart()
    {
        session()->forget('products');
        session()->forget('cart_counter');

        return redirect()->route('home');
        
        // return view('includes._cart_counter')->render();
    }
}
