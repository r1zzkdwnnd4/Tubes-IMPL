<aside class="w-64 min-h-screen bg-white border-r shadow-sm p-5">
    <h1 class="text-lg font-semibold mb-6">TravelAdmin</h1>

    <nav class="space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="block p-2 rounded-md
           {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            Dashboard
        </a>

        {{-- Manajemen Wisata --}}
        <a href="{{ route('admin.wisata') }}"
           class="block p-2 rounded-md
           {{ request()->routeIs('admin.wisata') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            Manajemen Wisata
        </a>

        {{-- Manajemen Customer --}}
        <a href="{{ route('admin.customer') }}"
           class="block p-2 rounded-md
           {{ request()->routeIs('admin.customer') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            Manajemen Customer
        </a>

        {{-- Manajemen Agen --}}
        <a href="{{ route('admin.agen') }}"
           class="block p-2 rounded-md
           {{ request()->routeIs('admin.agen') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            Manajemen Agen
        </a>

        {{-- Manajemen Transaksi --}}
        <a href="{{ route('admin.transaksi') }}"
           class="block p-2 rounded-md
           {{ request()->routeIs('admin.transaksi') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
            History Transaksi
        </a>

        {{-- ================== LAPORAN (DROPDOWN) ================== --}}
        @php
            $laporanActive =
                request()->routeIs('admin.laporan.transaksi') ||
                request()->routeIs('admin.laporan.pelanggan') ||
                request()->routeIs('admin.laporan.agen');
        @endphp

        <div class="space-y-1">

            {{-- Header Dropdown --}}
            <button
                class="w-full flex justify-between items-center p-2 rounded-md
                {{ $laporanActive ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}"
                onclick="toggleLaporan()">

                <span>Laporan</span>
                <svg class="w-4 h-4 transition-transform {{ $laporanActive ? 'rotate-180' : '' }}"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            {{-- Dropdown Content --}}
            <div id="laporanMenu"
                 class="ml-4 space-y-1 {{ $laporanActive ? '' : 'hidden' }}">

                <a href="{{ route('admin.laporan.transaksi') }}"
                   class="block p-2 rounded-md text-sm
                   {{ request()->routeIs('admin.laporan.transaksi')
                        ? 'bg-blue-50 text-blue-600 font-semibold'
                        : 'hover:bg-gray-100' }}">
                    Laporan Transaksi
                </a>

                <a href="{{ route('admin.laporan.pelanggan') }}"
                   class="block p-2 rounded-md text-sm
                   {{ request()->routeIs('admin.laporan.pelanggan')
                        ? 'bg-blue-50 text-blue-600 font-semibold'
                        : 'hover:bg-gray-100' }}">
                    Laporan Pelanggan
                </a>

                <a href="{{ route('admin.laporan.agen') }}"
                   class="block p-2 rounded-md text-sm
                   {{ request()->routeIs('admin.laporan.agen')
                        ? 'bg-blue-50 text-blue-600 font-semibold'
                        : 'hover:bg-gray-100' }}">
                    Laporan Agen
                </a>

            </div>
        </div>

    </nav>
</aside>
<script>
function toggleLaporan() {
    const menu = document.getElementById('laporanMenu');
    menu.classList.toggle('hidden');
}
</script>
