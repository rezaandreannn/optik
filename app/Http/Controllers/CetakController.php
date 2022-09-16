<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function index()
    {
        return view('backend.laporan.input');
    }

    public function cetak(Request $request)
    {

        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        if (!$bulan && !$tahun) {
            $month = date('m');
            $year = date('Y');
        } elseif ($bulan) {
            $month = $bulan;
            $year = date('Y');
        } elseif ($bulan && $tahun) {
            $month = $bulan;
            $year = $tahun;
        } else {
            $this->validate($request, [
                'bulan' => 'required',
            ]);
        }

        $orders = Order::orderBy('id', 'desc')
            ->whereMonth('updated_at', $month)
            ->whereYear('updated_at', $year)
            ->where('status', '=', 'bayar')
            ->get();



        return view('backend.laporan.cetak', compact('orders', 'month', 'year'));
    }
}
