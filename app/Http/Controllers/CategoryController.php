<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::orderBy('id', 'desc')->get();

        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'description' => 'required',
            'photo' => 'required|image|file'
        ]);

        // simpan gambar ke storage 
        $data['photo'] = $request->file('photo')->store('category/images');
        $data['added_by'] = Auth::user()->name;

        Category::create($data);

        // kembali ke page index with alert
        return redirect('category')->with('success', 'berhasil menambah data kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file'
        ]);

        if ($request->file('photo')) {
            // hapus gambar lama
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('category/images');
        }

        $data['added_by'] = Auth::user()->name;

        Category::where('id', $category->id)
            ->update($data);

        // kembali ke page index with alert
        return redirect('category')->with('success', 'berhasil mengubah data kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::where('id', $category->id)
            ->delete();


        // kembali ke page index with alert
        return redirect('category')->with('success', 'berhasil menghapus data kategori');
    }
}
