

<?php $__env->startSection('content'); ?>
    <h1 class="fw-semibold mb-1">Area Penugasan Agen</h1>
    <p class="text-muted mb-4">Halo, <?php echo e($agen->NamaAgen); ?>!</p>

    <div class="card shadow-sm">
        <div class="card-body">
            <h6 class="text-success fw-semibold mb-3">
                Area Penugasan Agen
            </h6>

            <button class="btn btn-success rounded-pill px-4">
                <?php echo e($areaAgen); ?>

            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.agenLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\travelaa\resources\views/pages/agenDashboard.blade.php ENDPATH**/ ?>