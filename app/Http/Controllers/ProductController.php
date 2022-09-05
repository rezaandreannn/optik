<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required|not_in:0',
            'description' => 'required',
            'photo' => 'required|image|file',
            'qty' => 'required',
            'price' => 'required'
        ]);

        $data['photo'] = $request->file('photo')->store('product/images');

        Product::create($data);

        // kembali ke page index with alert
        return redirect('product')->with('success', 'berhasil mengubah data produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required|not_in:0',
            'description' => 'required',
            'photo' => 'image|file',
            'qty' => 'required',
            'price' => 'required'
        ]);

        if ($request->file('photo')) {
            // hapus gambar lama
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('product/images');
        }



        Product::where('id', $product->id)
            ->update($data);

        // kembali ke page index with alert
        return redirect('product')->with('success', 'berhasil mengubah data product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::where('id', $product->id)
            ->delete();

        // kembali ke page index with alert
        return redirect('product')->with('success', 'berhasil menghapus data produk');
    }
}
