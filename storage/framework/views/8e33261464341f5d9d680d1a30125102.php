<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($wisata->NamaWisata); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

<?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="max-w-5xl mx-auto px-6 py-16">

    <!-- IMAGE -->
    <img
        src="<?php echo e($wisata->Gambar 
            ? asset('uploads/wisata/' . $wisata->Gambar) 
            : asset('images/img1.jpg')); ?>"
        alt="<?php echo e($wisata->NamaWisata); ?>"
        class="w-full h-96 object-cover rounded-xl mb-8"
    >

    <!-- TITLE -->
    <h1 class="text-4xl font-extrabold mb-4">
        <?php echo e($wisata->NamaWisata); ?>

    </h1>

    <!-- AREA -->
    <p class="text-gray-600 text-lg mb-2">
        Area: <?php echo e($wisata->Area); ?>

    </p>

    <!-- PRICE -->
    <p class="text-primary-blue text-2xl font-bold mb-6">
        Rp <?php echo e(number_format($wisata->Harga, 0, ',', '.')); ?> / orang
    </p>

    <!-- DESCRIPTION (OPTIONAL) -->
    <?php if(!empty($wisata->Deskripsi)): ?>
        <p class="text-gray-700 leading-relaxed mb-8">
            <?php echo e($wisata->Deskripsi); ?>

        </p>
    <?php endif; ?>

    <!-- BOOKING BUTTON -->
    <a href="<?php echo e(route('form.booking')); ?>"
       class="inline-block bg-primary-blue text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        Booking Sekarang
    </a>

</div>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/detail-wisata.blade.php ENDPATH**/ ?>