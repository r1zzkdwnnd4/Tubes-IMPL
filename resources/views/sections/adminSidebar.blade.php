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
       

    </nav>
</aside>
