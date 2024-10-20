<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Show Platform Juan' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="/img/logo.png">
</head>

<body class="font-figtree">
    @include('front.navbar')
    <div class="container p-5 mx-auto">
        @if (session()->has('success'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="sr-only">Info</span>
                <div class="text-sm font-medium ms-3">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
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
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-md">
            <h1 class="mt-4 mb-2 text-2xl font-bold text-gray-900">{{ $product->nama }}</h1>
            <img class="object-cover w-full rounded-md h-[540px]" src="{{ Storage::url($product->foto_produk) }}"
                alt="Foto Produk" />

            <div class="mt-3">
                <p class="mb-3 text-gray-700">Harga: Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                <p class="mb-3 text-gray-700">Stok: {{ $product->jumlah_produksi }} pcs</p>
                <p class="mb-5 text-gray-700">Deskripsi: {{ $product->deskripsi }}</p>
                <p class="text-sm text-gray-600">Produsen: {{ $product->user->name }}</p>
            </div>

            <div class="flex flex-col gap-4 mt-5">
                <div class="flex justify-between">
                    <a href="{{ url()->previous() }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Kembali
                    </a>

                    @guest
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Beli
                        </a>
                    @endguest
                </div>

                @auth
                    <form action="{{ route('buy') }}" method="POST" id="purchase-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="produsen_id" value="{{ $product->user->id }}">
                        <input type="hidden" name="reseller_id" value="{{ Auth::user()->id }}">
                        <div class="mb-4">
                            <label for="jumlah_pembelian" class="block text-sm font-medium text-gray-700">Jumlah
                                Pembelian</label>
                            <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" min="1"
                                value="1" class="block w-full p-2 mt-1 border border-gray-300 rounded-md"
                                oninput="updateTotal()" required>
                        </div>

                        <div class="mb-4">
                            <label for="total" class="block text-sm font-medium text-gray-700">Total Harga</label>
                            <input type="text" id="total" name="total" value="{{ $product->harga_produk }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md" readonly>
                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Beli
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    @include('front.footer')
    <script>
        function updateTotal() {
            const quantity = document.getElementById('jumlah_pembelian').value;
            const pricePerItem = {{ $product->harga_produk }}; // Harga produk dalam format numerik
            const totalPrice = quantity * pricePerItem;

            // Format total price
            const formattedTotalPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(totalPrice);

            // Menyimpan total harga yang dihitung di input total
            document.getElementById('total').value = totalPrice; // Nilai total dalam format numerik
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>
