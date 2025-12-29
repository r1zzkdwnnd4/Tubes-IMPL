<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 lg:px-8 py-4 flex justify-between items-center">

        
        <div class="flex items-center space-x-2">
            <i data-lucide="map-pin" class="text-primary-blue w-6 h-6"></i>
            <a href="#hero" class="text-xl font-bold text-gray-800">
                Travela
            </a>
        </div>

        <div class="flex items-center space-x-6">

            
            <?php if(Route::is('customer.home')): ?>

                <a href="#about" class="nav-link text-gray-600 hover:text-primary-blue">
                    About
                </a>

                <a href="#destination" class="nav-link text-gray-600 hover:text-primary-blue">
                    Destination
                </a>

                <a href="#footer" class="nav-link text-gray-600 hover:text-primary-blue">
                    Contact
                </a>

                <a href="<?php echo e(route('wisata.katalog')); ?>"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Katalog
                </a>

            
            <?php elseif(Route::is('wisata.katalog')): ?>

                <a href="<?php echo e(route('customer.home')); ?>"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Home
                </a>

            
            <?php elseif(Route::is('customer.history')): ?>

                <a href="<?php echo e(route('customer.home')); ?>"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Home
                </a>

                <a href="<?php echo e(route('form.booking')); ?>"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Booking
                </a>

                <a href="<?php echo e(route('wisata.katalog')); ?>"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Katalog
                </a>

            <?php endif; ?>

            
            <?php if(auth()->guard('customer')->guest()): ?>
                <a href="<?php echo e(route('customer.login')); ?>"
                   class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                    Login
                </a>
            <?php endif; ?>

            <?php if(auth()->guard('customer')->check()): ?>
                <?php if (! (Route::is('customer.history'))): ?>
                    <a href="<?php echo e(route('form.booking')); ?>"
                       class="bg-primary-blue text-white px-4 py-2 rounded-lg">
                        Book Now
                    </a>

                    <a href="<?php echo e(route('customer.history')); ?>"
                       class="nav-link text-gray-600 hover:text-primary-blue">
                        History Reservasi
                    </a>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('customer.logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>
            <?php endif; ?>

        </div>
    </nav>
</header>
<?php /**PATH C:\laragon\www\travelaa\resources\views/sections/header.blade.php ENDPATH**/ ?>