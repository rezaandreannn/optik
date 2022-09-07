<?php

namespace App\Http\Controllers\Frond;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Cache\RateLimiting\Limit;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view('frondend.shop', compact('products', 'categories'));
    }

    public function product_detail($id)
    {

        $product = Product::find($id);


        return view('frondend.detail', compact('product'));
    }
}
