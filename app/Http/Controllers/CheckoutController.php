<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Courier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index()
    {

        // $hitung = RajaOngkir::ongkosKirim([
        //     'origin' => 283,
        //     'destination' => Auth::user()->city,
        //     'weight' => 1000,
        //     'courier' => 'pos'
        // ])->get();

        // $cost = $hitung[0]['costs'][0]['cost'][0]['value'];

        // dd($cost);

        $orders =  Order::where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->get();


        return view('frondend.checkout', compact('orders'));
    }

    public function prosesBayar(Request $request)
    {
        $orders =  Order::where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->get();

        foreach ($orders as $order) {
            $data = $request->validate([
                'bank' => 'required',
                'kurir' => 'required',
            ]);
            $data['status'] = 'bayar';

            $order->update($data);

            // update product
            $product = Product::where('id', $order->product_id)->get();

            foreach ($product as $value) {
                $value->update([
                    'qty' => $value->qty - $order->qty
                ]);
            }
        }

        return redirect("/")->with('message', 'berhasil melakukan pembayaran');
    }

    public function hitungOngkir($code)
    {
        $hitung = RajaOngkir::ongkosKirim([
            'origin' => 283,
            'destination' => Auth::user()->city,
            'weight' => 1000,
            'courier' => $code
        ])->get();

        if ($code == 'jne') {
            $cost =  $hitung[0]['costs'][1]['cost'][0]['value'];
        } else {
            $cost =  $hitung[0]['costs'][0]['cost'][0]['value'];
        }

        return json_encode($cost);
    }
}
