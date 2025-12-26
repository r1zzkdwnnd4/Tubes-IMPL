<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Agen</title>
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

        <h2 class="text-2xl font-semibold mb-1">Laporan Agen</h2>
        <p class="text-gray-500 mb-6">
            Analisis kinerja agen dalam sistem pemesanan wisata
        </p>

        
        <div class="bg-white p-6 rounded-xl shadow mb-8">
            <p class="text-gray-500 text-sm">Total Agen Terdaftar</p>
            <p class="text-2xl font-semibold"><?php echo e($totalAgen); ?></p>
        </div>

        
        <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
            <p class="text-sm text-green-700">
                Laporan ini digunakan sebagai dasar evaluasi kinerja agen
                berdasarkan kontribusinya terhadap transaksi dan pengelolaan
                paket wisata.
            </p>
        </div>

        <table class="w-full bg-white rounded-xl shadow border mb-8">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Area</th>
                    <th class="p-3 text-left">Jumlah Agen</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $agenPerArea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-t">
                    <td class="p-3"><?php echo e($a->Area); ?></td>
                    <td class="p-3"><?php echo e($a->jumlah_agen); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>



    </main>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/laporanAgen.blade.php ENDPATH**/ ?>