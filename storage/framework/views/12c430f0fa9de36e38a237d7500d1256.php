

<?php $__env->startSection('content'); ?>
<h1 class="fw-semibold mb-1">Riwayat Pemesanan</h1>
<p class="text-muted mb-4">Daftar pemesanan yang telah diproses</p>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between mb-4">
            <input type="text" class="form-control w-50"
                   placeholder="Cari berdasarkan nama atau paket">

            <?php
                $status = request('status');
            ?>

            <div class="btn-group">

                <a href="<?php echo e(route('agen.riwayat')); ?>"
                class="btn <?php echo e($status === null ? 'btn-success' : 'btn-outline-secondary'); ?>">
                    Semua
                </a>

                <a href="<?php echo e(route('agen.riwayat', ['status' => 'confirmed'])); ?>"
                class="btn <?php echo e($status === 'confirmed' ? 'btn-success' : 'btn-outline-secondary'); ?>">
                    Di Konfirmasi
                </a>

                <a href="<?php echo e(route('agen.riwayat', ['status' => 'pending'])); ?>"
                class="btn <?php echo e($status === 'pending' ? 'btn-warning text-dark' : 'btn-outline-secondary'); ?>">
                    Menunggu
                </a>

                <a href="<?php echo e(route('agen.riwayat', ['status' => 'rejected'])); ?>"
                class="btn <?php echo e($status === 'rejected' ? 'btn-danger' : 'btn-outline-secondary'); ?>">
                    Ditolak
                </a>

            </div>

        </div>

        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Paket</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($item->Id_transaksi); ?></td>
                        <td><?php echo e($item->NamaCustomer); ?></td>
                        <td><?php echo e($item->NamaWisata); ?></td>
                        <td><?php echo e($item->Tanggal_Travel); ?></td>
                        <td><?php echo e($item->Jumlah_Orang); ?></td>
                        <td>Rp <?php echo e(number_format($item->Total, 0, ',', '.')); ?></td>
                        <td>
                            <?php if($item->Status === 'Dikonfirmasi'): ?>
                                <span class="badge bg-success">Dikonfirmasi</span>
                            <?php elseif($item->Status === 'Menunggu'): ?>
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada riwayat pemesanan.
                        </td>
                    </tr>
                    <?php endif; ?>
                    </tbody>

        </table>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.agenLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/agenRiwayat.blade.php ENDPATH**/ ?>