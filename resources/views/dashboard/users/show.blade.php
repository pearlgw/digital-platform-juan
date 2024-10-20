@extends('dashboard.index')
@section('content')
    <div class="max-w-full p-6 bg-gray-100 rounded-lg shadow-lg">
        <!-- Card Header -->
        <div class="flex items-center pb-4 mb-4 border-b">
            <h1 class="text-2xl font-semibold">Detail Pengguna</h1>
        </div>

        <!-- Card Body -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1 font-medium text-gray-500">Nama</div>
            <div class="col-span-2">{{ $user->name }}</div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1 font-medium text-gray-500">Email</div>
            <div class="col-span-2">{{ $user->email }}</div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1 font-medium text-gray-500">No Telepon</div>
            <div class="col-span-2">{{ $user->no_telfon }}</div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1 font-medium text-gray-500">Alamat</div>
            <div class="col-span-2">{{ $user->alamat }}</div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1 font-medium text-gray-500">Jenis Usaha</div>
            <div class="col-span-2">{{ $user->jenis_usaha ?? '(-)'}}</div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1 font-medium text-gray-500">Nama Usaha</div>
            <div class="col-span-2">{{ $user->nama_usaha ?? '(-)'}}</div>
        </div>

        <!-- Card Footer -->
        <div class="pt-4 border-t">
            <p class="text-sm text-gray-600">Platform Digital Juan</p>
        </div>
    </div>
@endsection
