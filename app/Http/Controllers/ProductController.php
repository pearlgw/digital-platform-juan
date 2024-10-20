<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil keyword dari request
        $keyword = $request->input('search');

        // Query untuk mengambil produk, sertakan pencarian
        $products = Product::when($keyword, function ($query, $keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%")
                    ->orWhere('harga_produk', 'like', "%{$keyword}%");
            });
        })
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $productadmins = Product::when($keyword, function ($query, $keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%")
                    ->orWhere('harga_produk', 'like', "%{$keyword}%");
            });
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.products.index', [
            'title' => 'Manage Products',
            'products' => $products,
            'productadmins' => $productadmins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'title' => 'Create Products'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required',
            'harga_produk' => 'required|integer',
            'deskripsi' => 'required|string',
            'jumlah_produksi' => 'required|integer',
            'foto_produk' => 'required|mimes:jpg,png|max:2048',
            'user_id' => 'required|integer',
        ]);

        if ($request->hasFile('foto_produk')) {
            $fotoPath = $request->file('foto_produk')->store('products', 'public');
            $validated['foto_produk'] = $fotoPath;
        }

        Product::create($validated);

        return redirect()->route('adminprodusen.products.index')->with('success', 'Produk berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga_produk' => 'required|integer',
            'deskripsi' => 'required|string',
            'jumlah_produksi' => 'required|integer',
            'foto_produk' => 'image|mimes:png,jpg|max:2048',
        ]);

        // Menghapus foto lama jika ada foto baru yang diunggah
        if ($request->hasFile('foto_produk')) {
            // Hapus foto lama
            if ($product->foto_produk && Storage::disk('public')->exists($product->foto_produk)) {
                Storage::disk('public')->delete($product->foto_produk);
            }

            // Simpan foto baru
            $validatedData['foto_produk'] = $request->file('foto_produk')->store('products', 'public');
        }

        $product->update($validatedData);

        return redirect()->route('adminprodusen.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->foto_produk) {
            $path = $product->foto_produk;

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }

        $product->delete();

        return redirect()->route('adminprodusen.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'approved';
        $product->save();

        return redirect()->route('adminprodusen.products.index')->with('success', 'Produk approved!');
    }
}