<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Pemesanan</title>
</head>
<body>

    <h1>TIKET BERHASIL DIBUAT</h1>

    <p><strong>ID Tiket:</strong> <?php echo e($ticket->id); ?></p>
    <p><strong>Kode Booking:</strong> <?php echo e($ticket->booking_code); ?></p>
    <p><strong>Tanggal Tiket:</strong> <?php echo e($ticket->tanggal_tiket); ?></p>
    <p><strong>Transaction ID:</strong> <?php echo e($ticket->transaction_id); ?></p>
    <p><strong>Customer ID:</strong> <?php echo e($ticket->customer_id); ?></p>

</body>
</html>
<?php /**PATH C:\laragon\www\travela\resources\views/pages/tiket.blade.php ENDPATH**/ ?>