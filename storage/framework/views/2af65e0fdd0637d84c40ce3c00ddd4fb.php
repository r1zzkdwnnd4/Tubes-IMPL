<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Kartu Kredit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-lg mx-auto mt-20 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Pembayaran Kartu Kredit</h2>

    <form action="<?php echo e(route('konfirmasi.pembayaran')); ?>">
        <div class="mb-4">
            <label>Nama Pemilik Kartu</label>
            <input type="text" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Nomor Kartu</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="XXXX XXXX XXXX XXXX">
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <input type="text" placeholder="MM/YY" class="border rounded px-3 py-2">
            <input type="text" placeholder="CVV" class="border rounded px-3 py-2">
        </div>

        <button class="w-full bg-blue-600 text-white py-3 rounded">
            Bayar Sekarang
        </button>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\travela\resources\views/pages/pembayaran-kartu-kredit.blade.php ENDPATH**/ ?>