<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Explore Bali</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1D4ED8',
                        'dark-bg': '#0F172A',
                        'light-bg': '#F8FAFC',
                    },
                    backgroundImage: {
                        'hero-bali': "url('https://placehold.co/1920x800/25364D/FFFFFF?text=Pemandangan+Sunset+Bali+Untuk+Hero')",
                        'about-bali': "url('https://placehold.co/1920x400/25364D/FFFFFF?text=Gunung+Pura+Bali+untuk+About')",
                        'dest-bali': "url('https://placehold.co/1920x400/25364D/FFFFFF?text=Pura+untuk+Destinasi')"
                    }
                }
            }
        }
    </script>

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            padding-top: 90px;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white">
    <h1 class="text-1xl font-semibold text-gray-800 mb-4 px-6">
        Selamat datang, <span class="text-primary-blue"><?php echo e(auth('customer')->user()->NamaCustomer); ?></span>
    </h1>





    <?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.caraousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.destinations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <a href="#home" class="fixed bottom-6 right-6 bg-primary-blue text-white p-3 rounded-full shadow-lg">
        <i data-lucide="arrow-up" class="w-6 h-6"></i>
    </a>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/customerHome.blade.php ENDPATH**/ ?>