<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran PayPal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-lg mx-auto mt-20 bg-white p-8 rounded-xl shadow text-center">
    <h2 class="text-2xl font-bold mb-4">Pembayaran via PayPal</h2>

    <p class="mb-6 text-gray-600">
        Silakan masukkan email PayPal Anda untuk melanjutkan pembayaran.
    </p>

    <form action="<?php echo e(route('konfirmasi.pembayaran')); ?>">
        <input
            type="email"
            placeholder="email@paypal.com"
            class="w-full border rounded px-4 py-3 mb-6">

        <button class="w-full bg-blue-500 text-white py-3 rounded">
            Lanjutkan Pembayaran
        </button>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/pembayaran-paypal.blade.php ENDPATH**/ ?>