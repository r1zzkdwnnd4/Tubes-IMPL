<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    @include('sections.adminSidebar')

    <main class="flex-1 p-8">

        {{-- HEADER --}}
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-semibold">Dashboard</h2>
                <p class="text-gray-500">Selamat datang di admin panel pemesanan wisata</p>
            </div>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>

        {{-- SUMMARY --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

            {{-- TOTAL CUSTOMER --}}
            <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4">
                <div class="p-3 bg-blue-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M17 20h5v-2a4 4 0 00-4-4h-1m-6 6v-2a4 4 0 014-4h2m-6 6H3v-2a4 4 0 014-4h1m6-6a4 4 0 11-8 0 4 4 0 018 0zm6 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Customer</p>
                    <p class="text-xl font-semibold">
                        {{ number_format($totalCustomer) }}
                    </p>
                </div>
            </div>

            {{-- TOTAL WISATA --}}
            <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4">
                <div class="p-3 bg-purple-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 20l-5.447 2.724A1 1 0 012 21.829V7a5 5 0 015-5h10a5 5 0 015 5v14.829a1 1 0 01-1.553.895L15 20m-6 0V10"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Paket Wisata</p>
                    <p class="text-xl font-semibold">
                        {{ number_format($totalWisata) }}
                    </p>
                </div>
            </div>

        </div>

        {{-- TRANSAKSI TERBARU --}}
        <div class="mt-10 bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-600 border-b">
                            <th class="p-3">Kode Booking</th>
                            <th class="p-3">Customer</th>
                            <th class="p-3">Paket Wisata</th>
                            <th class="p-3">Total</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($transaksi as $tr)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $tr->kode_booking }}</td>
                            <td class="p-3">{{ $tr->customer }}</td>
                            <td class="p-3">{{ $tr->paket }}</td>
                            <td class="p-3">
                                Rp {{ number_format($tr->total, 0, ',', '.') }}
                            </td>
                            <td class="p-3">
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($tr->status === 'Selesai')
                                        bg-green-100 text-green-600
                                    @elseif($tr->status === 'Proses')
                                        bg-blue-100 text-blue-600
                                    @else
                                        bg-yellow-100 text-yellow-600
                                    @endif">
                                    {{ $tr->status }}
                                </span>
                            </td>
                            <td class="p-3">
                                {{ \Carbon\Carbon::parse($tr->tanggal_travel)->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">
                                Belum ada transaksi
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </main>
</div>

</body>
</html>
