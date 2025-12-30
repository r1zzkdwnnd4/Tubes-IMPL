

<?php $__env->startSection('content'); ?>
    <h1 class="fw-semibold mb-1">Dashboard Agen</h1>
    <p class="text-muted mb-4">Halo, <?php echo e($agen->NamaAgen); ?>!</p>

    
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h6 class="text-success fw-semibold mb-3">
                Area Penugasan Agen
            </h6>

            <button class="btn btn-success rounded-pill px-4">
                <?php echo e($areaAgen); ?>

            </button>
        </div>
    </div>

    
    <h5 class="fw-semibold mb-3">Pesanan Masuk (Menunggu Konfirmasi)</h5>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Customer</th>
                        <th>Paket Wisata</th>
                        <th>Tanggal Travel</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $pesananMasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($p->NamaCustomer); ?></td>
                        <td><?php echo e($p->NamaWisata); ?></td>
                        <td><?php echo e($p->Tanggal_Travel); ?></td>
                        <td><?php echo e($p->Jumlah_Orang); ?></td>
                        <td>Rp <?php echo e(number_format($p->Total,0,',','.')); ?></td>
                        <td class="d-flex gap-2">

                            
                            <form method="POST"
                                  action="<?php echo e(route('agen.pesanan.updateStatus', $p->Id_transaksi)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="status" value="Dikonfirmasi">
                                <button class="btn btn-success btn-sm">
                                    Konfirmasi
                                </button>
                            </form>

                            
                            <form method="POST"
                                  action="<?php echo e(route('agen.pesanan.updateStatus', $p->Id_transaksi)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="status" value="Ditolak">
                                <button class="btn btn-danger btn-sm">
                                    Tolak
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada pesanan menunggu konfirmasi.
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.agenLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\travela\resources\views/pages/agenDashboard.blade.php ENDPATH**/ ?>