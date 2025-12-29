<section id="destination" class="py-32 bg-white">

    <!-- Header Section -->
    <div class="relative bg-dest-bali bg-cover bg-center h-64 flex justify-center items-center text-white mb-16">
        <div class="absolute inset-0 bg-dark-bg/60"></div>

        <div class="relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-1">Destination</h2>
            <p class="text-sm">Home / Destination</p>
        </div>
    </div>

    <div class="text-center max-w-7xl mx-auto px-4 lg:px-8">
        <p class="text-sm font-semibold text-primary-blue mb-2 border-b border-primary-blue inline-block">
            DESTINATION
        </p>
        <h3 class="text-4xl font-bold mb-12">Popular Destination</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php
            $wisataList = $wisata ?? collect();
            ?>

            <?php $__empty_1 = true; $__currentLoopData = $wisataList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-[1.03] transition">

                <!-- IMAGE (TIDAK DIKLIK) -->
                <img
                    src="<?php echo e($item->Gambar
            ? asset('uploads/wisata/' . $item->Gambar)
            : asset('images/img1.jpg')); ?>"
                    class="w-full h-64 object-cover"
                    alt="<?php echo e($item->NamaWisata); ?>">

                <div class="p-6 text-left">

                    <!-- NAMA WISATA (KLIK KE DETAIL) -->
                    <a href="<?php echo e(route('wisata.detail', ['id' => $item->Id_wisata])); ?>">
                        <h4 class="text-2xl font-bold mb-1 hover:underline">
                            <?php echo e($item->NamaWisata); ?>

                        </h4>
                    </a>

                    <p class="text-gray-500 mb-2">
                        <?php echo e($item->Area); ?>

                    </p>

                    <p class="font-semibold text-primary-blue mb-4">
                        Rp <?php echo e(number_format($item->Harga, 0, ',', '.')); ?> / orang
                    </p>

                    <!-- BOOKING -->
                    <a href="<?php echo e(route('form.booking')); ?>"
                        class="inline-block text-sm text-white bg-primary-blue px-4 py-2 rounded hover:bg-blue-700 transition">
                        Booking
                    </a>

                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-3 text-center text-gray-500">
                Belum ada data wisata.
            </p>
            <?php endif; ?>

        </div>

        <!-- LINK KE KATALOG -->
        <div class="mt-14">
            <a href="<?php echo e(route('wisata.katalog')); ?>"
                class="inline-block text-primary-blue font-semibold border border-primary-blue px-6 py-3 rounded hover:bg-primary-blue hover:text-white transition">
                Lihat Semua Destinasi
            </a>
        </div>

    </div>
</section><?php /**PATH C:\laragon\www\travelaa\resources\views/sections/destinations.blade.php ENDPATH**/ ?>