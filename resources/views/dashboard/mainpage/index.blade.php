@extends('dashboard.index')
@section('content')
    {{-- <h1>dashboard lho ya</h1> --}}
    <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
        @role('admin')
            <div class="flex flex-col items-center justify-center w-full h-40 p-4 rounded-md bg-[#1E303D]">
                <h2 class="text-lg font-semibold text-white">Total Users</h2>
                <p class="mt-2 text-3xl font-bold text-white">{{ $totalUsers }}</p>
            </div>
            <div class="flex flex-col items-center justify-center w-full h-40 p-4 rounded-md bg-[#1E303D]">
                <h2 class="text-lg font-semibold text-white">Total Keseluruhan Products</h2>
                <p class="mt-2 text-3xl font-bold text-white">{{ $totalKeseluruhanProducts }}</p>
            </div>
            <div class="flex flex-col items-center justify-center w-full h-40 p-4 rounded-md bg-[#1E303D]">
                <h2 class="text-lg font-semibold text-white">Jumlah Data Transaksi</h2>
                <p class="mt-2 text-3xl font-bold text-white">{{ $totalDataTransaksi }}</p>
            </div>
        @endrole

        @role('produsen')
            <div class="flex flex-col items-center justify-center w-full h-40 p-4 rounded-md bg-[#1E303D]">
                <h2 class="text-lg font-semibold text-white">Total Keseluruhan Products</h2>
                <p class="mt-2 text-3xl font-bold text-white">{{ $totalProductsByLoggedInUser }}</p>
            </div>
        @endrole

    </div>
@endsection
