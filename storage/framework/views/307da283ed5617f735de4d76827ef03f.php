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

        
        <?php
            $laporanActive =
                request()->routeIs('admin.laporan.transaksi') ||
                request()->routeIs('admin.laporan.pelanggan') ||
                request()->routeIs('admin.laporan.agen');
        ?>

        <div class="space-y-1">

            
            <button
                class="w-full flex justify-between items-center p-2 rounded-md
                <?php echo e($laporanActive ? 'bg-blue-100 text-blue-600 font-semibold' : 'hover:bg-gray-100'); ?>"
                onclick="toggleLaporan()">

                <span>Laporan</span>
                <svg class="w-4 h-4 transition-transform <?php echo e($laporanActive ? 'rotate-180' : ''); ?>"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            
            <div id="laporanMenu"
                 class="ml-4 space-y-1 <?php echo e($laporanActive ? '' : 'hidden'); ?>">

                <a href="<?php echo e(route('admin.laporan.transaksi')); ?>"
                   class="block p-2 rounded-md text-sm
                   <?php echo e(request()->routeIs('admin.laporan.transaksi')
                        ? 'bg-blue-50 text-blue-600 font-semibold'
                        : 'hover:bg-gray-100'); ?>">
                    Laporan Transaksi
                </a>

                <a href="<?php echo e(route('admin.laporan.pelanggan')); ?>"
                   class="block p-2 rounded-md text-sm
                   <?php echo e(request()->routeIs('admin.laporan.pelanggan')
                        ? 'bg-blue-50 text-blue-600 font-semibold'
                        : 'hover:bg-gray-100'); ?>">
                    Laporan Pelanggan
                </a>

                <a href="<?php echo e(route('admin.laporan.agen')); ?>"
                   class="block p-2 rounded-md text-sm
                   <?php echo e(request()->routeIs('admin.laporan.agen')
                        ? 'bg-blue-50 text-blue-600 font-semibold'
                        : 'hover:bg-gray-100'); ?>">
                    Laporan Agen
                </a>

            </div>
        </div>

    </nav>
</aside>
<script>
function toggleLaporan() {
    const menu = document.getElementById('laporanMenu');
    menu.classList.toggle('hidden');
}
</script>
<?php /**PATH C:\laragon\www\travela\resources\views/sections/adminSidebar.blade.php ENDPATH**/ ?>