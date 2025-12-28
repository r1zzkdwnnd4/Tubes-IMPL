<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-lg mx-auto mt-20 bg-white p-8 rounded shadow">

    <h2 class="text-2xl font-bold mb-6">Upload Bukti Pembayaran</h2>

    <form action="{{ route('pembayaran.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_transaksi" 
               value="{{ $transaksi->id_transaksi }}">

        <div class="mb-4">
            <label class="block mb-2">Bukti Transfer</label>
            <input type="file" name="bukti" required
                   class="w-full border rounded p-2">
        </div>

        <button type="submit"
            class="w-full bg-green-600 text-white py-3 rounded hover:bg-green-700">
            Kirim Bukti Pembayaran
        </button>
    </form>

</div>

</body>
</html>
