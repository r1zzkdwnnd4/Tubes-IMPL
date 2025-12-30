
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart.js HARUS di-load dulu -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    @php
    $isManager = auth('admin')->check() 
        && auth('admin')->user()->Departemen === 'Manager';
    @endphp


<div class="flex">
    @if (!$isManager)
        @include('sections.adminSidebar')
    @endif


    <main class="flex-1 p-8">

        <h2 class="text-2xl font-semibold mb-1">Laporan Transaksi</h2>
        <p class="text-gray-500 mb-6">
            Analisis performa transaksi berdasarkan data historis
        </p>

        {{-- FILTER --}}
        @if (!$isManager)
        @endif
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6 bg-white p-4 rounded-xl shadow">
            <div>
                <label class="text-sm">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                       class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="text-sm">Tanggal Akhir</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                       class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="text-sm">Status</label>
                <select name="status" class="w-full p-2 border rounded">
                    <option value="">Semua</option>
                    <option value="Selesai" {{ request('status')=='Selesai'?'selected':'' }}>Selesai</option>
                    <option value="Proses" {{ request('status')=='Proses'?'selected':'' }}>Proses</option>
                    <option value="Pending" {{ request('status')=='Pending'?'selected':'' }}>Pending</option>
                </select>
            </div>

            <div class="flex items-end">
                <button class="w-full bg-blue-600 text-white py-2 rounded">Filter</button>
            </div>
        </form>

        {{-- SUMMARY --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">Total Transaksi</p>
                <p class="text-2xl font-semibold">{{ $totalTransaksi }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">Total Pendapatan</p>
                <p class="text-2xl font-semibold">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- CHART --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <canvas id="chartTransaksi" height="100"></canvas>
        </div>

        <script>
            new Chart(document.getElementById('chartTransaksi'), {
                type: 'bar',
                data: {
                    labels: ['Total Transaksi'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [{{ $totalTransaksi }}],
                        backgroundColor: '#3b82f6'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        </script>

    </main>
</div>

</body>
</html>
