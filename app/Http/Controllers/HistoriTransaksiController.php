<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriTransaksiController extends Controller
{
    public function historiTransaksi()
    {
        $user = Auth::user()->id;
        return view('dashboard.histori-transaksi.index', [
            'title' => 'Histori Transaksi',
            'transaksis' => Transaksi::with('product')->where('reseller_id', $user)->paginate(10),
            'transaksiProdusen' => Transaksi::where('produsen_id', $user)->paginate(10)
        ]);
    }
}
