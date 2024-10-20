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
            <h1 class="text-2xl font-semibold">Data Users</h1>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <div class="flex flex-row items-center pb-4">
                <form action="{{ route('admin.users.index') }}" method="GET" class="flex items-center md:py-2">
                    <input type="text" name="search" id="table-search"
                        class="block w-56 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        placeholder="Search for items" value="{{ request('search') }}" oninput="this.form.submit()">
                </form>
            </div>
            <div class="overflow-x-auto">
                <table
                    class="w-full overflow-hidden text-sm text-left bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="text-xs text-white uppercase bg-[#1E303D]">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Role</th>
                            <th scope="col" class="px-6 py-3">No Telepon</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Jenis Usaha</th>
                            <th scope="col" class="px-6 py-3">Nama Usaha</th>
                            <th scope="col" class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="bg-white border-b border-gray-200 hover:bg-slate-100">
                                <td class="px-6 py-4 font-semibold">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    {{ $user->getRoleNames()->implode(', ') }}
                                </td>
                                <td class="px-6 py-4">{{ $user->no_telfon }}</td>
                                <td class="px-6 py-4">{{ $user->alamat }}</td>
                                <td class="px-6 py-4">{{ $user->jenis_usaha ?? '(-)' }}</td>
                                <td class="px-6 py-4">{{ $user->nama_usaha ?? '(-)' }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center space-x-4">
                                        <a href="{{ route('admin.users.show', $user) }}"
                                            class="font-medium text-blue-600 hover:underline">Show</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center">Belum ada users</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer -->
        <div class="p-6 border-t border-gray-200">
            {{ $users->links() }}
        </div>
    </div>
@endsection
