<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transfer Bank</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-lg mx-auto mt-20 bg-white p-8 rounded-xl shadow text-center">

    <h2 class="text-2xl font-bold mb-4">Transfer Bank</h2>
    <p class="text-gray-600 mb-6">Gunakan Virtual Account berikut</p>

    <div id="va" class="text-3xl font-mono font-bold text-blue-600 mb-6"></div>

    <a href="{{ route('konfirmasi.pembayaran') }}"
       class="inline-block w-full bg-green-600 text-white py-3 rounded">
        Cek Status Pembayaran
    </a>
</div>

<script>
    function generateVA() {
        let va = '';
        for (let i = 0; i < 16; i++) {
            va += Math.floor(Math.random() * 10);
        }
        document.getElementById('va').innerText = va;
    }
    generateVA();
</script>

</body>
</html>
