<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    
    <?php echo $__env->make('sections.adminSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <main class="flex-1 p-8">

        
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold">History Transaksi</h2>
                <p class="text-gray-500">Riwayat transaksi yang masuk</p>
            </div>
        </div>

        
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-600 border-b">
                            <th class="p-3">Kode Booking</th>
                            <th class="p-3">Customer</th>
                            <th class="p-3">Paket Wisata</th>
                            <th class="p-3">Total</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Tanggal Travel</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-medium">
                                    <?php echo e($tr->kode_booking); ?>

                                </td>

                                <td class="p-3">
                                    <?php echo e($tr->customer); ?>

                                </td>

                                <td class="p-3">
                                    <?php echo e($tr->paket); ?>

                                </td>

                                <td class="p-3">
                                    Rp <?php echo e(number_format($tr->total, 0, ',', '.')); ?>

                                </td>

                                <td class="p-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        <?php if($tr->status === 'Selesai'): ?>
                                            bg-green-100 text-green-600
                                        <?php elseif($tr->status === 'Proses'): ?>
                                            bg-blue-100 text-blue-600
                                        <?php else: ?>
                                            bg-yellow-100 text-yellow-600
                                        <?php endif; ?>
                                    ">
                                        <?php echo e($tr->status); ?>

                                    </span>
                                </td>

                                <td class="p-3">
                                    <?php echo e(\Carbon\Carbon::parse($tr->tanggal_travel)->format('d M Y')); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="p-6 text-center text-gray-500">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/adminHistoryTransaksi.blade.php ENDPATH**/ ?>