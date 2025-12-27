

<?php $__env->startSection('content'); ?>
<h1 class="fw-semibold mb-1">Daftar Paket Wisata</h1>
<p class="text-muted mb-4">Paket wisata yang ditugaskan kepada Anda</p>

<div class="row g-4">

<?php $__empty_1 = true; $__currentLoopData = $paketWisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="col-md-6">
    <div class="card shadow-sm h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0"><?php echo e($paket->NamaWisata); ?></h5>
                <span class="badge bg-success">Aktif</span>
            </div>

            <p class="text-success mb-1">📍 <?php echo e($paket->Area); ?></p>

            <p class="text-muted">
                Paket wisata di area <?php echo e($paket->Area); ?>

            </p>

            <div class="d-flex gap-4 mb-3">
                <span>💰 Rp <?php echo e(number_format($paket->Harga, 0, ',', '.')); ?></span>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <span class="badge bg-light text-dark border">Transport</span>
                <span class="badge bg-light text-dark border">Guide</span>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="col-12">
    <div class="alert alert-warning">
        Tidak ada paket wisata untuk area Anda.
    </div>
</div>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.agenLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\travelaa\resources\views/pages/agenPaket.blade.php ENDPATH**/ ?>