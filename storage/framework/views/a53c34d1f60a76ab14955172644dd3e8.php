<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Agen Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="d-flex min-vh-100">

    <!-- SIDEBAR -->
    <aside class="bg-white border-end p-4 d-flex flex-column" style="width:260px">
        <h4 class="text-success mb-4">Panel Agen</h4>

        <ul class="nav flex-column gap-2">

            <li class="nav-item">
                <a class="nav-link rounded
                <?php echo e(request()->routeIs('agen.dashboard') ? 'bg-success text-white' : 'text-dark'); ?>"
                href="<?php echo e(route('agen.dashboard')); ?>">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded
                <?php echo e(request()->routeIs('agen.paket') ? 'bg-success text-white' : 'text-dark'); ?>"
                href="<?php echo e(route('agen.paket')); ?>">
                    Daftar Paket Wisata
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded
                <?php echo e(request()->routeIs('agen.riwayat') ? 'bg-success text-white' : 'text-dark'); ?>"
                href="<?php echo e(route('agen.riwayat')); ?>">
                    Riwayat Pemesanan
                </a>
            </li>

        </ul>


        <form method="POST" action="<?php echo e(route('agen.logout')); ?>" class="mt-auto">
            <?php echo csrf_field(); ?>
            <button class="btn btn-outline-danger w-100 mt-4">
                Logout (Agen)
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="flex-fill p-5">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

</body>
</html><?php /**PATH C:\laragon\www\travela\resources\views/pages/agenLayout.blade.php ENDPATH**/ ?>