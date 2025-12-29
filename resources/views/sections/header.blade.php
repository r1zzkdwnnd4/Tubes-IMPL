<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 lg:px-8 py-4 flex justify-between items-center">

        {{-- LOGO --}}
        <div class="flex items-center space-x-2">
            <i data-lucide="map-pin" class="text-primary-blue w-6 h-6"></i>
            <a href="#hero" class="text-xl font-bold text-gray-800">
                Travela
            </a>
        </div>

        <div class="flex items-center space-x-6">

            {{-- ================= CUSTOMER HOME ================= --}}
            @if(Route::is('customer.home'))

                <a href="#about" class="nav-link text-gray-600 hover:text-primary-blue">
                    About
                </a>

                <a href="#destination" class="nav-link text-gray-600 hover:text-primary-blue">
                    Destination
                </a>

                <a href="#footer" class="nav-link text-gray-600 hover:text-primary-blue">
                    Contact
                </a>

                <a href="{{ route('wisata.katalog') }}"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Katalog
                </a>

            {{-- ================= KATALOG ================= --}}
            @elseif(Route::is('wisata.katalog'))

                <a href="{{ route('customer.home') }}"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Home
                </a>

            {{-- ================= HISTORY PEMESANAN ================= --}}
            @elseif(Route::is('customer.history'))

                <a href="{{ route('customer.home') }}"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Home
                </a>

                <a href="{{ route('form.booking') }}"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Booking
                </a>

                <a href="{{ route('wisata.katalog') }}"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Katalog
                </a>

            @endif

            {{-- ================= AUTH ================= --}}
            @guest('customer')
                <a href="{{ route('customer.login') }}"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Login
                </a>
            @endguest

            @auth('customer')
                @unless(Route::is('customer.history'))
                    <a href="{{ route('form.booking') }}"
                       class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                        Book Now
                    </a>

                    <a href="{{ route('customer.history') }}"
                       class="nav-link text-black-600 hover:text-primary-blue bg-yellow-300 px-4 py-2 rounded-lg">
                        History Pemesanan
                    </a>
                @endunless

                <form method="POST" action="{{ route('customer.logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </nav>
</header>
