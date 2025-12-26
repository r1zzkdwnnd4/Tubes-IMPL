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
    <aside class="bg-white border-end p-4" style="width:260px">
        <h4 class="text-success mb-4">Agent Panel</h4>

        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a class="nav-link active bg-success text-white rounded" href="#">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    Daftar Paket Wisata
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    Riwayat Pemesanan
                </a>
            </li>
        </ul>

        <form method="POST" action="<?php echo e(route('agen.logout')); ?>" class="mt-auto pt-4">
            <?php echo csrf_field(); ?>
            <button class="btn btn-outline-danger w-100">
                Logout (Agen)
            </button>
        </form>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-fill p-5">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

</body>
</html>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/layout/agen.blade.php ENDPATH**/ ?>