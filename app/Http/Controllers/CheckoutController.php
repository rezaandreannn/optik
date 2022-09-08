<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {

        $orders =  Order::where('user_id', Auth::user()->id)
            ->get();

        return view('frondend.checkout', compact('orders'));
    }
}
