<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-100 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-100">
        <ul class="space-y-2 font-medium">
            @role('admin')
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminprodusen.products.index') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminprodusen.update-stok') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Tambah Stok Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.transactions.index') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path
                                d="M21 8h-2V7a3 3 0 00-3-3H4a2 2 0 00-2 2v12a2 2 0 002 2h15a2 2 0 002-2v-7a3 3 0 00-3-3zm-5.5 2a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm-11-4h12a1 1 0 011 1v1H4V7a1 1 0 011-1zm-1 11v-7h16v7a1 1 0 01-1 1H4a1 1 0 01-1-1z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Transaction</span>
                    </a>
                </li>
            @endauth
            @role('produsen')
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminprodusen.products.index') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminprodusen.update-stok') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Tambah Stok Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('histori-transaksi') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path
                                d="M21 8h-2V7a3 3 0 00-3-3H4a2 2 0 00-2 2v12a2 2 0 002 2h15a2 2 0 002-2v-7a3 3 0 00-3-3zm-5.5 2a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm-11-4h12a1 1 0 011 1v1H4V7a1 1 0 011-1zm-1 11v-7h16v7a1 1 0 01-1 1H4a1 1 0 01-1-1z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Histori Transaksi</span>
                    </a>
                </li>
            @endrole
            @role('reseller')
                <li>
                    <a href="{{ route('histori-transaksi') }}"
                        class="flex items-center p-2 rounded-lg group hover:bg-[#1E303D] hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path
                                d="M21 8h-2V7a3 3 0 00-3-3H4a2 2 0 00-2 2v12a2 2 0 002 2h15a2 2 0 002-2v-7a3 3 0 00-3-3zm-5.5 2a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm-11-4h12a1 1 0 011 1v1H4V7a1 1 0 011-1zm-1 11v-7h16v7a1 1 0 01-1 1H4a1 1 0 01-1-1z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Transaksi</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</aside>
