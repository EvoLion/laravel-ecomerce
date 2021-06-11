<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $collection = new \Illuminate\Support\Collection;
        if(session()->has('products')) { 
            $products = session('products');

            foreach ($products as $key => $product) {
                $cart_product = Product::where('id', $key)->first();
    
                $collection->push(['product_info' => $cart_product, 'count' => $product]);
            }
        }
        
        return view('cart.index', ['cart_products' => $collection->all()]);

        // $collection = new \Illuminate\Support\Collection;

        // if(session()->has('products')) {

        //     foreach (session('products') as $product) {
        //         $cart_product = Product::where('id', key($product))->first();
                
        //         $collection->push(['product_info' => $cart_product, 'count' => current($product)]);
        //     }
        //     return view('cart.index', ['cart_products' => $collection->all()]);
        // }
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



        // if (session()->has('products')) {
        //     foreach ($products as $key => $product) {
        //         if (array_key_exists($request->id, $product)) {
        //             session(["products.{$key}" => [$request->id => current($product) + $request->value]]); // рабочий вариант #3
        //             session()->increment('cart_counter', $request->value);
        //             return view('includes._cart_counter')->render();
        //         }
        //     }
        // }
        // session()->push('products', [$request->id => $request->value]);
        // session()->increment('cart_counter', $request->value);
        
        return view('includes._cart_counter')->render();
    }

    public function clearCart(Request $request)
    {
        if(session()->has('products')) {
            session()->forget('products');
        }
        
        return view('includes._cart_items')->render();
    }

    public function clearCartCounter(Request $request)
    {
        if(session()->has('cart_counter')) {
            session()->forget('cart_counter');
        }
        
        return view('includes._cart_counter')->render();
    }
}
