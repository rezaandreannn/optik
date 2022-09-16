<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id != 1) {
            return redirect()->route('beranda');
        }

        $orders = DB::table('orders')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->select([
                DB::raw('sum(price) as jumlah'),
                DB::raw('MONTH(orders.updated_at) month'),
                DB::raw('YEAR(orders.updated_at) year')
            ])
            ->groupBy('year', 'month')
            ->where('orders.status', '=', 'bayar')
            ->get();

        // dd($orders);
        return view('dashboard', compact('orders'));
    }
}
