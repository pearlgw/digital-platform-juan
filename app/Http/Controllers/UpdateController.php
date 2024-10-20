<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $userId = Auth::user()->id;

        // Mengambil produk berdasarkan user_id
        $products = Product::where('user_id', $userId)->get();

        return view('dashboard.updateStok.index', [
            'title' => 'Update Stok',
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|exists:products,id',
            'jumlah_produksi' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->produk);

        $product->jumlah_produksi += $request->jumlah_produksi;

        $product->save();

        return redirect()->back()->with('success', 'Stok produk berhasil diperbarui!');
    }

}