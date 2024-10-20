@extends('dashboard.index')
@section('content')
    <div class="bg-gray-100 rounded-md shadow-lg">
        <!-- Card Header -->
        <div class="p-5 border-b">
            <h1 class="text-2xl font-semibold">Create Product</h1>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <form method="POST" action="{{ route('adminprodusen.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="max-w-xl mb-5">
                    <label for="nama" class="block mb-2">Nama Produk</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Nama produk" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="harga_produk" class="block mb-2">Harga Produk</label>
                    <input type="number" id="harga_produk" name="harga_produk"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="0" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="deskripsi" class="block mb-2">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required placeholder="Isi deskripsi produk " />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="jumlah_produksi" class="block mb-2">Jumlah Produksi</label>
                    <input type="number" id="jumlah_produksi" name="jumlah_produksi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none"
                        placeholder="0" required />
                </div>
                <div class="max-w-xl mb-5">
                    <label for="foto_produk" class="block mb-2">Foto Produk</label>
                    <input class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="foto_produk" name="foto_produk" type="file">
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <button type="submit" class="px-4 py-2 rounded-md shadow-md hover:text-white hover:bg-[#16222B]">Create Product</button>
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
