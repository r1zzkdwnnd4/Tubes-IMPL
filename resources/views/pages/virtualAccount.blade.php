<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Virtual Account Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded shadow">

    <h2 class="text-2xl font-bold mb-4">Virtual Account Pembayaran</h2>

    <p><strong>Kode Booking:</strong> {{ $transaksi->kode_booking }}</p>
    <p><strong>Total Bayar:</strong> 
        Rp {{ number_format($transaksi->total,0,',','.') }}
    </p>

    <div class="my-6 text-center">
        <p class="text-gray-600 mb-2">Kode Virtual Account</p>
        <h1 class="text-3xl font-bold text-blue-600">
            {{ $kodeVA }}
        </h1>
        <p class="text-sm text-gray-500 mt-2">
            Berlaku 24 jam
        </p>
    </div>

    <a href="{{ route('pembayaran.konfirmasi', $transaksi->id_transaksi) }}"
       class="block text-center bg-blue-600 text-white py-3 rounded hover:bg-blue-700">
        Konfirmasi Pembayaran
    </a>

</div>

</body>
</html>
