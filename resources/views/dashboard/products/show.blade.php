@extends('dashboard.index')
@section('content')
<div class="container p-5 mx-auto">
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div>
                    <img class="object-cover w-full h-full " src="{{ Storage::url($product->foto_produk) }}"
                        alt="Foto Produk" />
                </div>
                <div class="px-4">
                    <h1 class="mt-4 mb-2 text-2xl font-bold text-gray-900">{{ $product->nama }}</h1>
                    <p class="mb-3 text-gray-700">Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                    <p class="mb-3 text-gray-700">Stok: {{ $product->jumlah_produksi }} pcs</p>
                    <p class="mb-5 text-gray-700">{{ $product->deskripsi }}</p>
                    <p class="text-sm text-gray-600">Produsen: {{ $product->user->name }}</p>
                    <a href="{{ url()->previous() }}"
                        class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
