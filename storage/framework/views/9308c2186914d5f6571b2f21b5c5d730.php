<aside class="w-64 min-h-screen bg-white border-r shadow-sm p-5">
    <h1 class="text-lg font-semibold mb-6">TravelAdmin</h1>

    <nav class="space-y-2">

        
        <a href="<?php echo e(route('admin.dashboard')); ?>"
           class="block p-2 rounded-md
           <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            Dashboard
        </a>

        
        <a href="<?php echo e(route('admin.wisata')); ?>"
           class="block p-2 rounded-md
           <?php echo e(request()->routeIs('admin.wisata') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            Manajemen Wisata
        </a>

        
        <a href="<?php echo e(route('admin.customer')); ?>"
           class="block p-2 rounded-md
           <?php echo e(request()->routeIs('admin.customer') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            Manajemen Customer
        </a>

        
        <a href="<?php echo e(route('admin.agen')); ?>"
           class="block p-2 rounded-md
           <?php echo e(request()->routeIs('admin.agen') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            Manajemen Agen
        </a>

        
        <a href="<?php echo e(route('admin.transaksi')); ?>"
           class="block p-2 rounded-md
           <?php echo e(request()->routeIs('admin.transaksi') ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>">
            History Transaksi
        </a>
       

    </nav>
</aside>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/sections/adminSidebar.blade.php ENDPATH**/ ?>