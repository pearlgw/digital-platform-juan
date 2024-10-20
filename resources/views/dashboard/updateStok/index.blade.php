@extends('dashboard.index')
@section('content')
    <div class="bg-gray-100 rounded-md shadow-lg">
        @if (session()->has('success'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="sr-only">Info</span>
                <div class="text-sm font-medium ms-3">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <!-- Card Header -->
        <div class="p-5 border-b">
            <h1 class="text-2xl font-semibold">Update Stok Produk</h1>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <form method="POST" action="{{ route('adminprodusen.add-stok') }}">
                @csrf
                <div class="max-w-xl mb-5">
                    <label for="produk" class="block mb-2">Pilih Produk</label>
                    <select id="produk" name="produk"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="max-w-xl mb-5">
                    <label for="jumlah_produksi" class="block mb-2">Jumlah Produksi</label>
                    <input type="number" id="jumlah_produksi" name="jumlah_produksi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="0"
                        required />
                </div>

                <button type="submit" class="px-4 py-2 rounded-md shadow-md hover:text-white hover:bg-[#16222B]">Tambah
                    Stok Produk</button>
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
