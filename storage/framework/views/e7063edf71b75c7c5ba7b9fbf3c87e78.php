<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="<?php echo e(asset('styles/payment.css')); ?>">
</head>

<body>

<div class="payment-container">
    <h3>Detail Pembayaran</h3>

    <div class="info-row">
        <span>Nama Lengkap:</span>
        <span><?php echo e($transaksi->customer->NamaCustomer); ?></span>
    </div>

    <div class="info-row">
        <span>Email:</span>
        <span><?php echo e($transaksi->customer->Email); ?></span>
    </div>

    <div class="info-row">
        <span>No Telepon:</span>
        <span><?php echo e($transaksi->customer->NoHP); ?></span>
    </div>

    <div class="info-row">
        <span>Destinasi:</span>
        <span><?php echo e($transaksi->wisata->NamaWisata); ?></span>
    </div>

    <div class="info-row">
        <span>Jumlah Orang:</span>
        <span><?php echo e($transaksi->Jumlah_Orang); ?></span>
    </div>

    <div class="info-row">
        <span>Metode Pembayaran:</span>
        <span><?php echo e($transaksi->Metode_Pembayaran); ?></span>
    </div>

    <div class="info-row">
        <span>Tanggal Travel:</span>
        <span><?php echo e($transaksi->Tanggal_Travel); ?></span>
    </div>

    <div class="total">
        Total Harga: Rp<?php echo e(number_format($transaksi->Total, 0, ',', '.')); ?>

    </div>

    <form action="<?php echo e(route('customer.konfirmasi')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn-pay">Bayar</button>
    </form>
</div>

</body>
</html><?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/payment.blade.php ENDPATH**/ ?>