@extends('dashboard.index')
@section('content')
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
    <div class="bg-gray-100 rounded-md shadow-lg">
        <!-- Card Header -->
        <div class="px-5 py-2 border-b">
            <h1 class="text-2xl font-semibold">Data Products</h1>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <div class="flex flex-row items-center justify-between pb-4">
                @role('admin')
                    <a href="{{ route('adminprodusen.products.create') }}"
                        class="md:hidden px-4 py-2 rounded-md bg-[#1E303D] text-white shadow-lg hover:bg-[#16222B]">+</a>
                    <a href="{{ route('adminprodusen.products.create') }}"
                        class="hidden md:block px-4 py-2 rounded-md bg-[#1E303D] text-white shadow-lg hover:bg-[#16222B]">+
                        Create</a>

                    <form action="{{ route('adminprodusen.products.index') }}" method="GET" class="flex items-center md:py-2">
                        <input type="text" name="search" id="table-search"
                            class="block w-56 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                            placeholder="Search for items" value="{{ request('search') }}" oninput="this.form.submit()">
                    </form>
                @endrole
                @role('produsen')
                    <a href="{{ route('adminprodusen.products.create') }}"
                        class="md:hidden px-4 py-2 rounded-md bg-[#1E303D] text-white shadow-lg hover:bg-[#16222B]">+</a>
                    <a href="{{ route('adminprodusen.products.create') }}"
                        class="hidden md:block px-4 py-2 rounded-md bg-[#1E303D] text-white shadow-lg hover:bg-[#16222B]">+
                        Create</a>

                    <form action="{{ route('adminprodusen.products.index') }}" method="GET" class="flex items-center md:py-2">
                        <input type="text" name="search" id="table-search"
                            class="block w-56 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                            placeholder="Search for items" value="{{ request('search') }}" oninput="this.form.submit()">
                    </form>
                @endrole
            </div>
            <div class="overflow-x-auto">
                <table
                    class="w-full overflow-hidden text-sm text-left bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="text-xs text-white uppercase bg-[#1E303D]">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Produk</th>
                            <th scope="col" class="px-6 py-3">Harga Produk</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Jumlah Produksi</th>
                            <th scope="col" class="px-6 py-3">Foto Produk</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            @role('admin')
                                <th scope="col" class="px-6 py-3">Produsen</th>
                            @endrole
                            <th scope="col" class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @role('admin')
                            @forelse ($productadmins as $productadmin)
                                <tr class="bg-white border-b border-gray-200 hover:bg-slate-100">
                                    <td class="px-6 py-4 font-semibold">{{ $productadmin->nama }}</td>
                                    <td class="px-6 py-4">{{ $productadmin->harga_produk }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Illuminate\Support\Str::words($productadmin->deskripsi, 10, '...') }}
                                    <td class="px-6 py-4">{{ $productadmin->jumlah_produksi }}</td>
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ Storage::url($productadmin->foto_produk) }}" alt="Foto Product"
                                            class="object-cover w-16 h-16 rounded-md">
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($productadmin->status == 'approved')
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Approved
                                            </span>
                                        @else
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $productadmin->user->name }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center space-x-4">
                                            <a href="{{ route('adminprodusen.products.show', $productadmin) }}"
                                                class="font-medium text-cyan-600 hover:underline">Show</a>
                                            <a href="{{ route('adminprodusen.products.edit', $productadmin) }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                            <form action="{{ route('adminprodusen.products.destroy', $productadmin) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                            <form action="{{ route('adminprodusen.products.approve', $productadmin) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="font-medium {{ $productadmin->status === 'approved' ? 'text-gray-400 cursor-not-allowed' : 'text-green-600 hover:underline' }}"
                                                    {{ $productadmin->status === 'approved' ? 'disabled' : '' }}>
                                                    Approve
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p class="pb-5 text-lg text-center">Belum ada product</p>
                            @endforelse
                        @endrole
                        @role('produsen')
                            @forelse ($products as $product)
                                <tr class="bg-white border-b border-gray-200 hover:bg-slate-100">
                                    <td class="px-6 py-4 font-semibold">{{ $product->nama }}</td>
                                    <td class="px-6 py-4">{{ $product->harga_produk }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($product->tanggal_produksi)->format('M d, Y') }}
                                    <td class="px-6 py-4">{{ $product->jumlah_produksi }}</td>
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ Storage::url($product->foto_produk) }}" alt="Foto Product"
                                            class="object-cover w-16 h-16 rounded-md">
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($product->status == 'approved')
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Approved
                                            </span>
                                        @else
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center space-x-4">
                                            <a href="{{ route('adminprodusen.products.edit', $product) }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                            <form action="{{ route('adminprodusen.products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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
            {{ $products->links() }}
        </div>
    </div>
@endsection
