<div class="px-5 py-6">
    <div class="flex flex-col md:justify-between md:items-center md:flex-row">
        <h2 class="mb-4 text-3xl font-bold text-gray-900">Daftar Produk</h2>
        <div class="mb-6 md:mb-0">
            <form action="/" method="GET" class="flex items-center md:py-2">
                <input type="text" name="search" id="table-search"
                    class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 lg:w-96"
                    placeholder="Search for items" value="{{ request('search') }}" oninput="this.form.submit()">
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2 lg:grid-cols-4">
        @forelse ($products as $product)
            <div class="flex flex-col h-full overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
                <img class="object-cover w-full h-48" src="{{ Storage::url($product->foto_produk) }}"
                    alt="Foto Produk" />
                <div class="flex-grow p-5">
                    <h5 class="mb-2 text-xl font-bold text-gray-900">{{ $product->nama }}</h5>
                    <p class="mb-3 text-gray-700">{{ \Illuminate\Support\Str::words($product->deskripsi, 10, '...') }}
                    </p>
                    <div class="flex justify-between">
                        <p class="mb-1 text-gray-700">Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                        <p class="mb-1 text-gray-700">Stok: {{ $product->jumlah_produksi }} pcs</p>
                    </div>
                    <a href="{{ route('show.product', $product->id) }}"
                        class="inline-flex items-center px-4 py-2 mt-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Show More
                    </a>
                </div>
                <!-- Footer -->
                <div class="px-5 py-3 mt-auto bg-gray-100 border-t">
                    <p class="text-sm text-gray-600">{{ $product->user->name }}</p>
                </div>
            </div>
        @empty
            <p class="font-bold text-left">Data Belum Ada</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
