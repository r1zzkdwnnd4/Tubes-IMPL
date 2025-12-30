<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-8">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-2xl font-semibold">Dashboard Manager</h1>
            <p class="text-gray-500">
                Ringkasan dan akses laporan kinerja sistem
            </p>
        </div>

        {{-- SUMMARY CARDS (mirip admin dashboard) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Laporan Transaksi</p>
                <p class="text-lg font-semibold mt-2">
                    Analisis transaksi & pendapatan
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Laporan Pelanggan</p>
                <p class="text-lg font-semibold mt-2">
                    Aktivitas & data pelanggan
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Laporan Agen</p>
                <p class="text-lg font-semibold mt-2">
                    Kinerja & kontribusi agen
                </p>
            </div>

        </div>

        {{-- QUICK ACCESS --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">
                Akses Cepat Laporan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <a href="{{ route('manager.laporan.transaksi') }}"
                   class="block p-4 border rounded-lg hover:bg-blue-50 transition">
                    <p class="font-medium text-blue-600">
                        Laporan Transaksi
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Lihat data transaksi & pendapatan
                    </p>
                </a>

                <a href="{{ route('manager.laporan.pelanggan') }}"
                   class="block p-4 border rounded-lg hover:bg-blue-50 transition">
                    <p class="font-medium text-blue-600">
                        Laporan Pelanggan
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Lihat data & aktivitas pelanggan
                    </p>
                </a>

                <a href="{{ route('manager.laporan.agen') }}"
                   class="block p-4 border rounded-lg hover:bg-blue-50 transition">
                    <p class="font-medium text-blue-600">
                        Laporan Agen
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Lihat kinerja agen wisata
                    </p>
                </a>

            </div>
        </div>

    </main>
</div>

</body>
</html>
