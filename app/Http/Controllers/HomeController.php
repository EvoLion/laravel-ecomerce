<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $collection = collect([]);
        $categories = Category::with('products')->get();
        foreach ($categories as $category) {
            $newestProduct = $category->products()->orderBy('created_at', 'desc')->first();
            $collection->push($newestProduct);
        }

        return view('home', ['newestProducts' => $collection->all()]);
    }
}
