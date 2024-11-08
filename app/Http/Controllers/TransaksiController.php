<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaction.index', [
            'title' => 'Manage Transaction',
            'transaksis' => Transaksi::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function buy(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'produsen_id' => 'required|exists:users,id',
            'reseller_id' => 'required|exists:users,id',
            'jumlah_pembelian' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        // Ambil produk yang akan dibeli
        $product = Product::findOrFail($validatedData['product_id']);

        // Membuat entri baru di tabel transaksi
        $transaksi = new Transaksi();
        $transaksi->product_id = $validatedData['product_id'];
        $transaksi->produsen_id = $validatedData['produsen_id'];
        $transaksi->reseller_id = $validatedData['reseller_id'];
        $transaksi->jumlah_pembelian = $validatedData['jumlah_pembelian'];
        $transaksi->total = $validatedData['total'];
        $transaksi->save();

        // Mengurangi jumlah produksi
        $product->jumlah_produksi -= $validatedData['jumlah_pembelian'];
        $product->save();

        // Ambil nomor telepon dari produsen
        $produsen = User::findOrFail($validatedData['produsen_id']);
        $noTelpon = $produsen->no_telfon;

        // Buat pesan untuk WhatsApp
        $message = "Halo! Saya ingin melakukan pembelian:\n" .
            "Produk: {$product->nama}\n" .
            "Jumlah: {$validatedData['jumlah_pembelian']}\n" .
            "Total: Rp {$validatedData['total']}\n" .
            "Dari: " . Auth::user()->name;

        // Encode pesan untuk URL
        $messageEncoded = urlencode($message);
        $whatsappUrl = "https://wa.me/{$noTelpon}?text={$messageEncoded}";

        // Arahkan pengguna ke URL WhatsApp
        return redirect($whatsappUrl);
    }

    public function historiTransaksi()
    {
        $user = Auth::user()->id;
        return view('dashboard.histori-transaksi.index',[
            'title' => 'Histori Transaksi',
            'transaksis' => Transaksi::with('product')->where('reseller_id', $user)->paginate(10),
            'transaksiProdusen' => Transaksi::where('produsen_id', $user)->paginate(10)
        ]);
    }
}