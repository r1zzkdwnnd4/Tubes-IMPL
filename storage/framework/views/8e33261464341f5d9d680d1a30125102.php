<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($wisata->NamaWisata); ?></title>

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

<body class="bg-gray-50">

<?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="max-w-6xl mx-auto px-6 pt-28 pb-10">


    
    <a href="<?php echo e(route('wisata.katalog')); ?>"
       class="inline-flex items-center bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md mb-8">
        ← Kembali ke Katalog
    </a>

    
    <div class="relative h-[420px] rounded-3xl overflow-hidden shadow-lg mb-10">
        <img
            src="<?php echo e($wisata->Gambar
                ? asset('uploads/wisata/' . $wisata->Gambar)
                : asset('images/img1.jpg')); ?>"
            alt="<?php echo e($wisata->NamaWisata); ?>"
            class="w-full h-full object-cover"
        >

        
        <div class="absolute inset-0 bg-black/40"></div>

        
        <div class="absolute bottom-8 left-8 text-white">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-2">
                <?php echo e($wisata->NamaWisata); ?>

            </h1>
            <p class="flex items-center gap-2 text-sm opacity-90">
                📍 <?php echo e($wisata->Area); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 flex items-center justify-between mb-10">
        <div>
            <p class="text-sm text-gray-600 mb-1">Harga Paket Wisata</p>
            <p class="text-2xl font-extrabold text-primary-blue">
                Rp <?php echo e(number_format($wisata->Harga, 0, ',', '.')); ?> / orang
            </p>
        </div>

        <div class="w-12 h-12 rounded-full bg-primary-blue text-white flex items-center justify-center">
            💰
        </div>
    </div>

    
    <div class="mb-10">
        <h3 class="text-lg font-bold border-l-4 border-primary-blue pl-3 mb-3">
            Deskripsi Paket
        </h3>

        <p class="text-gray-700 leading-relaxed">
            <?php echo e($wisata->Deskripsi ?? 'Belum ada deskripsi untuk paket wisata ini.'); ?>

        </p>
    </div>

    
    <div class="bg-gray-100 rounded-xl p-5 mb-10">
        <h4 class="font-semibold flex items-center gap-2 mb-1">
            📍 Lokasi
        </h4>
        <p class="text-gray-600"><?php echo e($wisata->Area); ?></p>
    </div>

    
    <a href="<?php echo e(route('form.booking')); ?>"
       class="block w-full text-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-4 rounded-xl hover:opacity-90 transition">
        Booking Sekarang
    </a>

</div>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/detail-wisata.blade.php ENDPATH**/ ?>