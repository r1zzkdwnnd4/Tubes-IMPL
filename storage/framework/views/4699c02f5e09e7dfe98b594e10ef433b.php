<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 lg:px-8 py-4 flex justify-between items-center">

        <div class="flex items-center space-x-2">
            <i data-lucide="map-pin" class="text-primary-blue w-6 h-6"></i>
            <a href="<?php echo e(route('home')); ?>" class="text-xl font-bold text-gray-800">Travela</a>
        </div>

        <div class="flex items-center space-x-6">

            <a href="#home" class="nav-link text-white bg-primary-blue py-2 px-3 rounded-lg">Home</a>
            <a href="#about" class="nav-link text-gray-600 hover:text-primary-blue py-2 px-3 rounded-lg hover:bg-gray-100">About</a>

            <div class="relative group">
                <button class="flex items-center bg-primary-blue text-white py-2 px-3 rounded-lg">
                    Pages
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1 group-hover:rotate-180"></i>
                </button>

                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-20">
                    <a href="#destination" class="nav-link block px-4 py-2 hover:bg-gray-100">Destination</a>
                    <a href="#footer" class="nav-link block px-4 py-2 hover:bg-gray-100">Contact</a>
                </div>
            </div>

            <!-- PERBAIKAN PALING PENTING -->
            <a href="<?php echo e(route('form.booking')); ?>" 
               class="bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Book Now
            </a>

        </div>

    </nav>
</header>

<style>
    .nav-link.active {
        color: #1d4ed8 !important;
        font-weight: 600;
        background-color: #e0e7ff;
        border-radius: 8px;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".nav-link");
    const sections = document.querySelectorAll("section[id]");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute("id");

                navLinks.forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === `#${id}`) {
                        link.classList.add("active");
                    }
                });
            }
        });
    }, { threshold: 0.5 });

    sections.forEach(sec => observer.observe(sec));
});
</script>
<?php /**PATH C:\laragon\www\travela\resources\views/sections/header.blade.php ENDPATH**/ ?>