<?php

namespace App\Http\Controllers\Frond;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            $cekProduct = Order::where('product_id', $id)
                ->where('user_id', Auth::user()->id)
                ->where('status', 'pending')
                ->first();
        } else {
            $cekProduct = '';
        }

        return view('frondend.detail', compact('product', 'cekProduct'));
    }
}
