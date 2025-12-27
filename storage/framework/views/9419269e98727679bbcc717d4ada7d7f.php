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
                        'hero-bali': "url('/images/img1.jpg')",
                        'about-bali': "url('/images/img2.jpg')",
                        'dest-bali': "url('/images/img3.jpg')"
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

    <a href="#hero" class="fixed bottom-6 right-6 bg-primary-blue text-white p-3 rounded-full shadow-lg">
        <i data-lucide="arrow-up" class="w-6 h-6"></i>
    </a>

    <script>
        lucide.createIcons();
        const hero = document.getElementById('hero');

    const images = [
        '/images/img1.jpg',
        '/images/img2.jpg',
        '/images/img3.jpg',
        '/images/img4.jpg',
        '/images/img5.jpg'
    ];

    let index = 0;

    // Set awal
    hero.style.backgroundImage = `url('${images[index]}')`;

    setInterval(() => {
        index = (index + 1) % images.length;
        hero.style.backgroundImage = `url('${images[index]}')`;
    }, 5000);

     const aboutImages = [
        '/images/img1.jpg',
        '/images/img2.jpg',
        '/images/img3.jpg',
        '/images/img4.jpg',
        '/images/img5.jpg'
    ];

    let aboutIndex = 0;
    const aboutImg = document.getElementById('aboutImage');

    // set gambar awal
    aboutImg.src = aboutImages[aboutIndex];
    aboutImg.style.opacity = 1;

    setInterval(() => {
        aboutImg.style.opacity = 0;

        setTimeout(() => {
            aboutIndex = (aboutIndex + 1) % aboutImages.length;
            aboutImg.src = aboutImages[aboutIndex];
            aboutImg.style.opacity = 1;
        }, 500); // setengah dari durasi transition
    }, 5000);
    </script>


</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/customerHome.blade.php ENDPATH**/ ?>