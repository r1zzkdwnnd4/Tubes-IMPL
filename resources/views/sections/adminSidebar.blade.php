<aside class="w-64 min-h-screen bg-white border-r shadow-sm p-5">
    <h1 class="text-lg font-semibold mb-6">TravelAdmin</h1>

    @php
        $user = auth('admin')->user();
        $isManager = $user && $user->Departemen === 'Manager';

        $laporanActive =
            request()->routeIs('admin.laporan.*') ||
            request()->routeIs('manager.laporan.*');
    @endphp

    <nav class="space-y-2">

        {{-- ================= ADMIN MENU (NON MANAGER) ================= --}}
        @if(!$isManager)

            <a href="{{ route('admin.dashboard') }}"
               class="block p-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.wisata') }}" class="block p-2 rounded-md hover:bg-gray-100">
                Manajemen Wisata
            </a>

            <a href="{{ route('admin.customer') }}" class="block p-2 rounded-md hover:bg-gray-100">
                Manajemen Customer
            </a>

            <a href="{{ route('admin.agen') }}" class="block p-2 rounded-md hover:bg-gray-100">
                Manajemen Agen
            </a>

            <a href="{{ route('admin.transaksi') }}" class="block p-2 rounded-md hover:bg-gray-100">
                History Transaksi
            </a>

        @endif
        {{-- ================= END ADMIN MENU ================= --}}

        {{-- ================= LAPORAN ================= --}}
        <div class="space-y-1">

            <button onclick="toggleLaporan()"
                class="w-full flex justify-between items-center p-2 rounded-md
                {{ $laporanActive ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                <span>Laporan</span>
                <svg class="w-4 h-4 {{ $laporanActive ? 'rotate-180' : '' }}"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div id="laporanMenu"
                 class="ml-4 space-y-1 {{ $laporanActive ? '' : 'hidden' }}">

                <a href="{{ $isManager ? route('manager.laporan.transaksi') : route('admin.laporan.transaksi') }}"
                   class="block p-2 rounded-md text-sm hover:bg-gray-100">
                    Laporan Transaksi
                </a>

                <a href="{{ $isManager ? route('manager.laporan.pelanggan') : route('admin.laporan.pelanggan') }}"
                   class="block p-2 rounded-md text-sm hover:bg-gray-100">
                    Laporan Pelanggan
                </a>

                <a href="{{ $isManager ? route('manager.laporan.agen') : route('admin.laporan.agen') }}"
                   class="block p-2 rounded-md text-sm hover:bg-gray-100">
                    Laporan Agen
                </a>

            </div>
        </div>
    </nav>
</aside>

<script>
function toggleLaporan() {
    document.getElementById('laporanMenu').classList.toggle('hidden');
}
</script>
