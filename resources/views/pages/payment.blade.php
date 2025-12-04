<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="styles/payment.css">
</head>
<body>

    <div class="payment-container">
        <h3>Detail Pembayaran</h3>
        <div class="info-row"><span>Nama Lengkap:</span> <span id="nama"></span></div>
        <div class="info-row"><span>Email:</span> <span id="email"></span></div>
        <div class="info-row"><span>No Telepon:</span> <span id="telp"></span></div>
        <div class="info-row"><span>Destinasi:</span> <span id="destinasi"></span></div>
        <div class="info-row"><span>Jumlah Orang:</span> <span id="jumlah"></span></div>
        <div class="info-row"><span>Metode Pembayaran:</span> <span id="metode"></span></div>
        <div class="info-row"><span>Tanggal Travel:</span> <span id="tanggal"></span></div>

        <div class="total" id="totalHarga">Total Harga: Rp0</div>

        <button class="btn-pay" onclick="window.location.href = 'konfirmasi-pembayaran.php'">Bayar</button>



    </div>

    <script>
        const nama = localStorage.getItem('nama') || '';
        const email = localStorage.getItem('email') || '';
        const telp = localStorage.getItem('telp') || '';
        const destinasi = localStorage.getItem('destinasi') || '';
        const jumlah = parseInt(localStorage.getItem('jumlah') || '0');
        const metode = localStorage.getItem('metode') || '';
        const tanggal = localStorage.getItem('tanggal') || '';

        const hargaDestinasi = {
            "Destinasi 1": 500000,
            "Destinasi 2": 750000,
            "Destinasi 3": 1000000
        };

        const hargaPerOrang = hargaDestinasi[destinasi] || 0;
        const totalHarga = hargaPerOrang * jumlah;

        document.getElementById('nama').textContent = nama;
        document.getElementById('email').textContent = email;
        document.getElementById('telp').textContent = telp;
        document.getElementById('destinasi').textContent = destinasi;
        document.getElementById('jumlah').textContent = jumlah;
        document.getElementById('metode').textContent = metode;
        document.getElementById('tanggal').textContent = tanggal;
        document.getElementById('totalHarga').textContent = `Total Harga: Rp${totalHarga.toLocaleString()}`;
    </script>

</body>
</html>
