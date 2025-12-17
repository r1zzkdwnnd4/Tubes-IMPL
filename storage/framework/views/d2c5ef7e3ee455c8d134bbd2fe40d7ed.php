<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Booking</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles/form-booking.css')); ?>">
</head>
<body>

    <div class="banner"></div>

    <div class="booking-form">
        <h3>Online Booking</h3>

        <!-- Kirim ke payment.php -->
        <form action="payment.php" method="POST">
            <div class="row">
                <div class="col">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="col">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan Email" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>No Telepon</label>
                    <input type="number" name="telp" placeholder="Masukkan No Telepon" required>
                </div>
                <div class="col">
                    <label>Destinasi (Harga per Orang)</label>
                    <select name="destinasi" required>
                        <option disabled selected>Pilih Destinasi</option>
                        <option>Destinasi 1</option>
                        <option>Destinasi 2</option>
                        <option>Destinasi 3</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Jumlah Orang</label>
                    <input type="number" name="jumlah" placeholder="Masukkan Jumlah Orang" required>
                </div>
                <div class="col">
                    <label>Metode Pembayaran</label>
                    <select name="metode" required>
                        <option disabled selected>Pilih Metode Pembayaran</option>
                        <option>Kartu Kredit</option>
                        <option>Paypal</option>
                        <option>Transfer Bank</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Tanggal Travel</label>
                    <input type="date" name="tanggal" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">Lanjutkan ke Pembayaran</button>
        </form>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/form-booking.blade.php ENDPATH**/ ?>