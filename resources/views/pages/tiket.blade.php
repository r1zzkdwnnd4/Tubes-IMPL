<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pemesanan</title>
    <link rel="stylesheet" href="styles/tiket.css">
</head>
<body>

     <div class="banner"></div>

    <div class="ticket-container">
        <div class="ticket-header">Tiket Pemesanan</div>
        <div class="ticket-body">
            <div class="ticket-row"><span>Nama Lengkap:</span> <span id="nama"></span></div>
            <div class="ticket-row"><span>Email:</span> <span id="email"></span></div>
            <div class="ticket-row"><span>No Telepon:</span> <span id="telp"></span></div>
            <div class="ticket-row"><span>Destinasi:</span> <span id="destinasi"></span></div>
            <div class="ticket-row"><span>Tanggal Travel:</span> <span id="tanggal"></span></div>
            <div class="ticket-row"><span>Jumlah Orang:</span> <span id="jumlah"></span></div>
            <div class="ticket-row"><span>Metode Pembayaran:</span> <span id="metode"></span></div>
            <div class="ticket-row"><span>Kode Booking:</span> <span id="kode"></span></div>

            <div class="divider"></div>
            <div class="total-row">Total Pembayaran: <span id="totalHarga"></span></div>

            <div class="btn-container">
                <a href="#" class="btn btn-home">Kembali ke Home</a>
                <a href="#" class="btn btn-print" onclick="window.print()">Cetak Tiket</a>
            </div>
        </div>
    </div>

    

    <script>

        const nama = localStorage.getItem('nama') || '';
        const email = localStorage.getItem('email') || '';
        const telp = localStorage.getItem('telp') || '';
        const destinasi = localStorage.getItem('destinasi') || '';
        const jumlah = parseInt(localStorage.getItem('jumlah') || '0');
        const metode = localStorage.getItem('metode') || '';
        const tanggal = localStorage.getItem('tanggal') || '';
        const kodeBooking = localStorage.getItem('kodeBooking') || 'REF' + Math.floor(Math.random()*1000000);

        const hargaDestinasi = {
            "Destinasi 1": 500000,
            "Destinasi 2": 750000,
            "Destinasi 3": 1000000,
            "Uluwatu": 500000
        };

        const hargaPerOrang = hargaDestinasi[destinasi] || 0;
        const totalHarga = hargaPerOrang * jumlah;

        document.getElementById('nama').textContent = nama;
        document.getElementById('email').textContent = email;
        document.getElementById('telp').textContent = telp;
        document.getElementById('destinasi').textContent = destinasi;
        document.getElementById('tanggal').textContent = tanggal;
        document.getElementById('jumlah').textContent = jumlah;
        document.getElementById('metode').textContent = metode;
        document.getElementById('kode').textContent = kodeBooking;
        document.getElementById('totalHarga').textContent = `IDR ${totalHarga.toLocaleString()}`;
    </script>

</body>
</html>
