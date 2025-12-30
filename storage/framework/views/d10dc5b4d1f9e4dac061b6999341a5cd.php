

<?php $__env->startSection('content'); ?>
<h1 class="fw-semibold mb-1">Riwayat Pemesanan</h1>
<p class="text-muted mb-4">Daftar pemesanan yang telah diproses</p>

<div class="card shadow-sm">
    <div class="card-body">

        
        <form method="GET" class="row g-3 mb-4">

            
            <div class="col-md-3">
                <input type="text"
                       name="q"
                       value="<?php echo e(request('q')); ?>"
                       class="form-control"
                       placeholder="Cari customer / paket">
            </div>

            
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="confirmed" <?php echo e(request('status')=='confirmed'?'selected':''); ?>>
                        Dikonfirmasi
                    </option>
                    <option value="rejected" <?php echo e(request('status')=='rejected'?'selected':''); ?>>
                        Ditolak
                    </option>
                </select>
            </div>

            
            <div class="col-md-2">
                <input type="date"
                       name="start_date"
                       value="<?php echo e(request('start_date')); ?>"
                       class="form-control">
            </div>

            
            <div class="col-md-2">
                <input type="date"
                       name="end_date"
                       value="<?php echo e(request('end_date')); ?>"
                       class="form-control">
            </div>

            
            <div class="col-md-2 d-grid">
                <button class="btn btn-success">
                    Filter
                </button>
            </div>

        </form>

        
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Paket</th>
                    <th>Tanggal Travel</th>
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
                    <td>Rp <?php echo e(number_format($item->Total,0,',','.')); ?></td>
                    <td>
                        <?php if($item->Status === 'Dikonfirmasi'): ?>
                            <span class="badge bg-success">Dikonfirmasi</span>
                        <?php elseif($item->Status === 'Ditolak'): ?>
                            <span class="badge bg-danger">Ditolak</span>
                        <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e($item->Status); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center text-muted py-3">
                        Tidak ada data riwayat.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.agenLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\travela\resources\views/pages/agenRiwayat.blade.php ENDPATH**/ ?>