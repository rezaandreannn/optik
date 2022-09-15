<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $orders =  Order::where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->get();

        return view('frondend.cart', compact('orders'));
    }

    public function store(Request $request, $id)
    {
        if ($request->qty) {
            $qty = $request->qty;
        }


        $product = Product::orderBy('id', 'asc')->get();
        // dd($product);

        $order = Order::where('user_id', Auth::user()->id)
            ->where('product_id', $id)
            ->where('status', 'pending')
            ->first();



        if (!$order) {
            Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'qty' => $qty ?? 1
            ]);
        } else {
            return redirect()->back()->with('failed', 'Produk sudah ada di keranjang');
        }

        return redirect()->back()->with('message', 'Berhasil menambahkan produk ke keranjang');
    }

    public function update(Request $request, Order $order)
    {
        if ($request->qty) {
            $qty = $request->qty;
        }

        Order::where('id', $order->id)->update([
            'qty' => $qty
        ]);

        return redirect()->back()->with('message', 'Berhasil mengubah jumlah produk');
    }

    public function destroy(Order $order)
    {
        Order::where('id', $order->id)
            ->delete();

        return redirect()->back()->with('message', 'berhasil menghapus keranjang belanja');
    }
}
