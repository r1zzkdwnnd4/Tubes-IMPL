<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Wisata</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1D4ED8',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-white">

<?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="max-w-7xl mx-auto px-6 py-20">


    
    <?php $__currentLoopData = $wisataPerArea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area => $wisataList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <!-- JUDUL AREA -->
        <div class="mb-12">
            <h2 class="text-6xl font-extrabold tracking-widest text-gray-900 uppercase">
                <?php echo e($area); ?>

            </h2>
            <div class="h-1 w-24 bg-gray-300 mt-4"></div>
        </div>

        <!-- GRID CARD -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-24">

           <?php $__currentLoopData = $wisataList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wisata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-[1.03] transition duration-300">

        <!-- IMAGE -->
       <img
            src="<?php echo e($wisata->Gambar 
            ? asset('uploads/wisata/' . $wisata->Gambar) 
            : asset('images/img1.jpg')); ?>"
            alt="<?php echo e($wisata->NamaWisata); ?>"
            class="w-full h-64 object-cover"
        >


        <!-- CONTENT -->
        <div class="p-6">
            <h4 class="text-2xl font-bold mb-2">
                <?php echo e($wisata->NamaWisata); ?>

            </h4>

            <p class="text-gray-500 mb-3">
                <?php echo e($wisata->Area); ?>

            </p>

            <p class="text-primary-blue font-semibold mb-4">
                Rp <?php echo e(number_format($wisata->Harga, 0, ',', '.')); ?> / orang
            </p>

            <a href="<?php echo e(route('form.booking')); ?>"
               class="inline-block text-sm text-white bg-primary-blue px-4 py-2 rounded hover:bg-blue-700 transition">
                Booking
            </a>
        </div>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/katalog-wisata.blade.php ENDPATH**/ ?>