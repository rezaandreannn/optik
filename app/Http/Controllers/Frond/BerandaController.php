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

        // ubah jika qty = 0 status out
        $pro = Product::where('qty', '0')->get();

        foreach ($pro as  $value) {
            $value->update([
                'status' => 'out'
            ]);
        }


        return view('frondend.collection', compact('products', 'categories'));
    }
}
