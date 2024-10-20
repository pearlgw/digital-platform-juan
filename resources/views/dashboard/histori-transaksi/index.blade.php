@extends('dashboard.index')
@section('content')
    <div class="bg-gray-100 rounded-md shadow-lg">
        <!-- Card Header -->
        <div class="px-5 py-2 border-b">
            <h1 class="text-2xl font-semibold">Data Transaksi</h1>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full overflow-hidden text-sm text-left bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="text-xs text-white uppercase bg-[#1E303D]">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Reseller</th>
                            <th scope="col" class="px-6 py-3">Nama Produsen</th>
                            <th scope="col" class="px-6 py-3">Produk</th>
                            <th scope="col" class="px-6 py-3">Jumlah Pembelian</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @role('reseller')
                            @forelse ($transaksis as $transaksi)
                                <tr class="bg-white border-b border-gray-200 hover:bg-slate-100">
                                    <td class="px-6 py-4 font-semibold">{{ $transaksi->userreseller->name }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->userprodusen->name }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->product->nama }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->jumlah_pembelian }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->total }}</td>
                                </tr>
                            @empty
                                <p class="pb-5 text-lg text-center">Belum ada product</p>
                            @endforelse
                        @endrole
                        @role('produsen')
                            @forelse ($transaksiProdusen as $transaksi)
                                <tr class="bg-white border-b border-gray-200 hover:bg-slate-100">
                                    <td class="px-6 py-4 font-semibold">{{ $transaksi->userreseller->name }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->userprodusen->name }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->product->nama }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->jumlah_pembelian }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->total }}</td>
                                </tr>
                            @empty
                                <p class="pb-5 text-lg text-center">Belum ada product</p>
                            @endforelse
                        @endrole
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer -->
        <div class="p-6 border-t border-gray-200">
            @role('reseller')
                {{ $transaksis->links() }}
            @endrole
            @role('produsen')
                {{ $transaksiProdusen->links() }}
            @endrole
        </div>
    </div>
@endsection
