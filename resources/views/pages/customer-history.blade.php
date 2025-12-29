<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>History Reservasi</title>
    <script src="https://cdn.tailwindcss.com"></script>



    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1D4ED8',
                        'dark-bg': '#0F172A',
                        'light-bg': '#F8FAFC',
                    }
                }
            }
        }
    </script>



</head>

<body class="bg-gray-100">

    @include('sections.header')

    <div class="max-w-6xl mx-auto px-6 py-16">

        <h1 class="text-3xl font-bold mb-8">History Reservasi</h1>

        @if ($transaksi->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow text-center text-gray-500">
            Belum ada reservasi.
        </div>
        @else
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="p-4 text-left">Destinasi</th>
                        <th class="p-4 text-left">Tanggal</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Total</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transaksi as $t)
                    <tr class="border-t">
                        <td class="p-4">{{ $t->wisata->NamaWisata }}</td>
                        <td class="p-4">{{ $t->Tanggal_Travel }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded text-sm
                                {{ $t->Status === 'Paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $t->Status }}
                            </span>
                        </td>
                        <td class="p-4">
                            Rp {{ number_format($t->Total, 0, ',', '.') }}
                        </td>
                        <td class="p-4 text-center">
                            <a href="{{ route('customer.tiket', $t->Kode_Booking) }}"
                                class="text-blue-600 hover:underline font-semibold">
                                Lihat detail pemesanan
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        @endif

    </div>

</body>

</html>