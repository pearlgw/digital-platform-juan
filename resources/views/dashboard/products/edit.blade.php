@extends('dashboard.index')
@section('content')
    <div class="bg-gray-100 rounded-md shadow-lg">
        <!-- Card Header -->
        <div class="p-5 border-b">
            <h1 class="text-2xl font-semibold">Edit Product</h1>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <form method="POST" action="{{ route('adminprodusen.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="max-w-xl mb-5">
                    <label for="nama" class="block mb-2">Nama Produk</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" value="{{ $product->nama }}"
                        placeholder="Nama Produk" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="harga_produk" class="block mb-2">Harga Produk</label>
                    <input type="number" id="harga_produk" name="harga_produk"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" value="{{ $product->harga_produk }}"
                        placeholder="0" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="deskripsi" class="block mb-2">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" value="{{ $product->deskripsi }}" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="jumlah_produksi" class="block mb-2">Jumlah Produksi</label>
                    <input type="number" id="jumlah_produksi" name="jumlah_produksi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none" value="{{ $product->jumlah_produksi }}"
                        placeholder="0" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="foto_produk" class="block mb-2">Foto Produk</label>
                        <img src="{{ Storage::url($product->foto_produk) }}" alt="" class="object-cover w-32 h-32 mb-4 rounded-2xl">
                    <input class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="foto_produk" name="foto_produk" type="file">
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <button type="submit" class="px-4 py-2 rounded-md shadow-md hover:text-white hover:bg-[#16222B]">Update Product</button>
            </form>
        </div>

        <!-- Card Footer -->
        <div class="p-6 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">Digital Platform Juan</p>
            </div>
        </div>
    </div>
@endsection
