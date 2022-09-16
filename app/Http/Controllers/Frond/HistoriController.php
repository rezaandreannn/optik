<?php

namespace App\Http\Controllers\Frond;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{
    public function index()
    {
        $orders =  Order::where('user_id', Auth::user()->id)
            ->where('status', 'bayar')
            ->get();

        return view('frondend.histori', compact('orders'));
    }
}
