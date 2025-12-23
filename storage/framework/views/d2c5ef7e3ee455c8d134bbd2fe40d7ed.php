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

        
        <form action="<?php echo e(route('customer.booking.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col">
                    <label>Nama Lengkap</label>
                    <input type="text"
                           name="NamaCustomer"
                           value="<?php echo e(auth('customer')->user()->NamaCustomer ?? ''); ?>"
                           readonly>
                </div>

                <div class="col">
                    <label>Email</label>
                    <input type="email"
                           name="Email"
                           value="<?php echo e(auth('customer')->user()->Email ?? ''); ?>"
                           readonly>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>No Telepon</label>
                    <input type="text"
                           name="NoHP"
                           value="<?php echo e(auth('customer')->user()->NoHP ?? ''); ?>"
                           required>
                </div>

                <div class="col">
                    <label>Destinasi Wisata</label>
                    <select name="Id_wisata" required>
                        <option value="" disabled selected>Pilih Destinasi</option>
                        <?php $__currentLoopData = $wisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($w->Id_wisata); ?>">
                                <?php echo e($w->NamaWisata); ?> - Rp<?php echo e(number_format($w->Harga)); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Jumlah Orang</label>
                    <input type="number" name="JumlahOrang" min="1" required>
                </div>

                <div class="col">
                    <label>Metode Pembayaran</label>
                    <select name="MetodePembayaran" required>
                        <option value="" disabled selected>Pilih Metode</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Tanggal Travel</label>
                    <input type="date" name="Tanggal" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                Lanjutkan ke Pembayaran
            </button>
        </form>
    </div>

</body>
</html><?php /**PATH C:\laragon\www\travelaa\resources\views/pages/form-booking.blade.php ENDPATH**/ ?>