<nav class="top-0 z-20 w-full bg-white border-b border-gray-200">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/logo.png" class="h-8" alt="Platform Juan">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">PlatformJuan</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-12 rtl:space-x-reverse">
            @if (Auth::check())
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</span>
                </div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="px-4 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg md:hidden hover:bg-red-700">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="hidden px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg md:block hover:bg-blue-800">Register</a>
                @endif
            @endif
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="/" class="block px-3 py-2 rounded md:bg-transparent md:p-0 hover:text-blue-700"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/about"
                        class="block px-3 py-2 rounded md:bg-transparent md:p-0 hover:text-blue-700">About</a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('histori-transaksi') }}"
                            class="block px-3 py-2 rounded md:bg-transparent md:p-0 hover:text-blue-700">Histori Transaksi</a>
                    </li>
                @endauth
                @guest
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"
                                class="block px-3 py-2 text-center text-white bg-blue-700 rounded-md md:bg-transparent md:p-0">Register</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
