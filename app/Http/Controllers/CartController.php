<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShipMethod;
use Illuminate\Http\Request;

class CartController extends Controller
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
        
        return view('cart.index', ['cart_products' => $collection->all(), 'total_price' => $total_price, 'ship_methods' => ShipMethod::all()]);
    }

    public function editProductValue(Request $request)
    {
        $collection = collect([]);
        $total_price = null;
        
        $products = session('products');
        $cart_counter = session('cart_counter');

        $old_product_value = $products[$request->id];
        $products[$request->id] = $request->value;
        session(['products' => $products]); // перезапись сессии
        session(['cart_counter' => $cart_counter + ($request->value - $old_product_value)]);
        
        foreach ($products as $key => $product) {
            $cart_product = Product::where('id', $key)->first();
            $total_price += $cart_product->price * $product;

            $collection->push(['product_info' => $cart_product, 'count' => $product]);
            // dd($product);
        }
        return view('cart.includes._cart_items', ['cart_products' => $collection->all(), 'total_price' => $total_price])->render();
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
        
        return view('cart.includes._cart_counter')->render();
    }

    public function refreshCartCounter()
    {
        return view('cart.includes._cart_counter')->render();
    }

    public function clearCart()
    {
        session()->forget('products');
        session()->forget('cart_counter');

        return redirect()->route('home');
    }
}
