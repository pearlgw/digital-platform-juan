<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $products = Product::when($keyword, function ($query, $keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return view('front.template', compact('products'));
    }

    public function about()
    {
        return view('about.index', [
            'title' => 'About Platform Juan'
        ]);
    }

    public function show($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Tampilkan view detail produk
        return view('front.show', compact('product'));
    }
}