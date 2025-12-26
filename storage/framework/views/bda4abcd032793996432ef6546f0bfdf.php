<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php
    $isManager = auth('admin')->check() 
        && auth('admin')->user()->Departemen === 'Manager';
    ?>

<div class="flex">
    <?php if(!$isManager): ?>
        <?php echo $__env->make('sections.adminSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <main class="flex-1 p-8">

        <h2 class="text-2xl font-semibold mb-1">Laporan Pelanggan</h2>
        <p class="text-gray-500 mb-6">
            Analisis perilaku dan keterlibatan pelanggan
        </p>

        
        <div class="bg-white p-6 rounded-xl shadow mb-8">
            <p class="text-gray-500 text-sm">Total Pelanggan Terdaftar</p>
            <p class="text-2xl font-semibold"><?php echo e($totalCustomer); ?></p>
        </div>

        
        <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg">
            <p class="text-sm text-yellow-700">
                Kepuasan pelanggan dianalisis secara tidak langsung melalui
                aktivitas transaksi pelanggan, seperti jumlah transaksi dan
                tingkat penyelesaian transaksi.
            </p>
        </div>

        <table class="w-full bg-white rounded-xl shadow border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama Pelanggan</th>
                    <th class="p-3 text-left">Jumlah Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $repeatCustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t">
                    <td class="p-3"><?php echo e($c->NamaCustomer); ?></td>
                    <td class="p-3"><?php echo e($c->total_transaksi); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="2" class="p-4 text-center text-gray-500">
                        Belum ada repeat customer
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>


    </main>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/laporanPelanggan.blade.php ENDPATH**/ ?>