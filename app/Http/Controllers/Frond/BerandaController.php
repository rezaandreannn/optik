<?php

namespace App\Http\Controllers\Frond;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->get();

        return view('frondend.index', compact('products', 'categories'));
    }
}
