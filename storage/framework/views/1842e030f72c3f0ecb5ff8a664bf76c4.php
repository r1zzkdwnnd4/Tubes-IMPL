<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>History Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>



    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1D4ED8',
                        'dark-bg': '#0F172A',
                        'light-bg': '#F8FAFC',
                    }
                }
            }
        }
    </script>



</head>

<body class="bg-gray-100">

    <?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="max-w-6xl mx-auto px-6 pt-32">


        <h1 class="text-3xl font-bold mb-8">History Pemesanan</h1>

        <?php if($transaksi->isEmpty()): ?>
        <div class="bg-white p-6 rounded-lg shadow text-center text-gray-500">
            Belum ada pemesanan.
        </div>
        <?php else: ?>
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="p-4 text-left">Destinasi</th>
                        <th class="p-4 text-left">Tanggal</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Total</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="p-4"><?php echo e($t->wisata->NamaWisata); ?></td>
                        <td class="p-4"><?php echo e($t->Tanggal_Travel); ?></td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded text-sm
                                <?php echo e($t->Status === 'Paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'); ?>">
                                <?php echo e($t->Status); ?>

                            </span>
                        </td>
                        <td class="p-4">
                            Rp <?php echo e(number_format($t->Total, 0, ',', '.')); ?>

                        </td>
                        <td class="p-4 text-center">
                            <a href="<?php echo e(route('customer.tiket', $t->Kode_Booking)); ?>"
                                class="text-blue-600 hover:underline font-semibold">
                                Lihat detail pemesanan
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
        <?php endif; ?>

    </div>

</body>

</html><?php /**PATH C:\laragon\www\travelaa\resources\views/pages/customer-history.blade.php ENDPATH**/ ?>