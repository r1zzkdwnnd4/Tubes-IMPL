<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 lg:px-8 py-4 flex justify-between items-center">

        
        <div class="flex items-center space-x-2">
            <i data-lucide="map-pin" class="text-primary-blue w-6 h-6"></i>
            <?php if(auth()->guard('customer')->check()): ?>
            <a href="<?php echo e(route('customer.home')); ?>"
                class="text-xl font-bold text-gray-800">
                Travela
            </a>
            <?php else: ?>
            <a href="<?php echo e(route('home')); ?>"
                class="text-xl font-bold text-gray-800">
                Travela
            </a>
            <?php endif; ?>
        </div>

        <div class="flex items-center space-x-6">

            
            <?php if(Route::is('customer.home')): ?>

            

            <a href="#about"
                class="nav-link text-gray-600 hover:text-primary-blue py-2 px-3 rounded-lg hover:bg-gray-100">
                About
            </a>

            <a href="#destination"
                class="nav-link text-gray-600 hover:text-primary-blue py-2 px-3 rounded-lg hover:bg-gray-100">
                Destination
            </a>

            <a href="#footer"
                class="nav-link text-gray-600 hover:text-primary-blue py-2 px-3 rounded-lg hover:bg-gray-100">
                Contact
            </a>

            
            <a href="<?php echo e(route('wisata.katalog')); ?>"
                class="bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Katalog
            </a>

            
            <?php elseif(Route::is('wisata.katalog')): ?>

            <a href="<?php echo e(route('customer.home')); ?>"
                class="bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Home
            </a>

            <?php endif; ?>

            
            
            <?php if(auth()->guard('customer')->guest()): ?>
            <a href="<?php echo e(route('customer.login')); ?>"
                class="bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Login
            </a>
            <?php endif; ?>

            
            <?php if(auth()->guard('customer')->check()): ?>
            <a href="<?php echo e(route('form.booking')); ?>"
                class="bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Book Now
            </a>

            <form method="POST" action="<?php echo e(route('customer.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                    Logout
                </button>
            </form>
            <?php endif; ?>


        </div>
    </nav>
</header><?php /**PATH C:\laragon\www\travelaa\resources\views/sections/header.blade.php ENDPATH**/ ?>