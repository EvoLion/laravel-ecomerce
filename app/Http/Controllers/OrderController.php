<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShipMethod;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $collection = collect([]);
        if(session()->has('products')) { 
            $products = session('products');
            $total_price = null;
            $ship_method = session('ship_method');
            $coupon = session('coupon');

            if(is_null($ship_method)) {
                $ship_method = ShipMethod::where('id', 3)->first();
                session(['ship_method' => $ship_method]);
            }

            foreach ($products as $key => $product) {
                $cart_product = Product::where('id', $key)->first();
                $total_price += $cart_product->price * $product;
    
                $collection->push(['product_info' => $cart_product, 'count' => $product]);
            }
        } else {
            return back();
        }
        return view('checkout', ['cart_products' => $collection->all(), 'total_price' => $total_price, 'ship_method' => $ship_method, 'coupon' => $coupon]);
    }

    public function create(Request $request) {
            $products = session('products');
            $ship_method = session('ship_method');
            $coupon = session('coupon');

            

            // TODO: Validation
            $order = new Order;
            $order->firstname = $request->checkout_name;
            $order->lastname = $request->checkout_last_name;
            $order->company = $request->checkout_company;
            $order->ship_country = $request->checkout_country;
            $order->ship_address = $request->checkout_address . $request->checkout_address_2;
            $order->zipcode = $request->checkout_zipcode;
            $order->ship_city = $request->checkout_city;
            $order->ship_region = $request->checkout_province;
            $order->ship_method_id = $ship_method->id;
            if(isset($coupon)) {
                $order->coupon_id = $coupon->id;
            }
            $order->phone = $request->checkout_phone;
            $order->email = $request->checkout_email;
            $order->save();

            foreach ($products as $key => $product) {
                $cart_product = Product::where('id', $key)->first();
                // $cart_product->stock = $cart_product->stock - $product;
                // $cart_product->save();
                $order->products()->attach($cart_product->id, ['quantity' => $product]);
            }
            
            $order->save();
            
            return redirect()->route('home');
    }
}
