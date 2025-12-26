<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Wisata</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        
        <?php echo $__env->make('sections.adminSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <main class="flex-1 p-8">

            
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-semibold">Manajemen Wisata</h2>
                    <p class="text-gray-500">Kelola paket wisata yang tersedia</p>
                </div>

                <button onclick="openAddModal()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    + Tambah Paket Wisata
                </button>
            </div>

            
            <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            
            <div class="rounded-xl shadow mb-10 overflow-hidden border border-gray-300 bg-white">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-600 text-white">
                        <tr>
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Nama Wisata</th>
                            <th class="p-3 text-left">Area</th>
                            <th class="p-3 text-left">Harga</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="text-black">
                        <?php $__empty_1 = true; $__currentLoopData = $wisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b hover:bg-gray-50">
                            
                            <td class="p-3"><?php echo e($w->Id_wisata); ?></td>
                            <td class="p-3"><?php echo e($w->NamaWisata); ?></td>
                            <td class="p-3"><?php echo e($w->Area); ?></td>
                            <td class="p-3">
                                Rp <?php echo e(number_format($w->Harga, 0, ',', '.')); ?>

                            </td>
                            <td class="p-3 text-center flex gap-3 justify-center">

                                
                                <button
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 edit-btn"
                                    data-nama="<?php echo e($w->NamaWisata); ?>"
                                    data-area="<?php echo e($w->Area); ?>"
                                    data-harga="<?php echo e($w->Harga); ?>"
                                    data-url="<?php echo e(route('admin.wisata.update', $w->Id_wisata)); ?>">
                                    Edit
                                </button>

                                
                                <form action="<?php echo e(route('admin.wisata.destroy', $w->Id_wisata)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Hapus paket wisata ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                Belum ada data wisata
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

            <button onclick="closeAddModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">✖</button>

            <h2 class="text-xl font-bold mb-4">Tambah Paket Wisata</h2>

            <form action="<?php echo e(route('admin.wisata.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="font-semibold">Nama Wisata</label>
                    <input type="text" name="nama_wisata"
                        class="w-full mt-1 px-3 py-2 border rounded-lg" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Area</label>
                    <input type="text" name="area"
                        class="w-full mt-1 px-3 py-2 border rounded-lg" required>
                </div>

                <div class="mb-6">
                    <label class="font-semibold">Harga</label>
                    <input type="number" name="harga"
                        class="w-full mt-1 px-3 py-2 border rounded-lg" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Tambah Wisata
                </button>
            </form>
        </div>
    </div>

    
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

            <button onclick="closeEditModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">✖</button>

            <h2 class="text-xl font-bold mb-4">Edit Paket Wisata</h2>

            <form id="editForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="font-semibold">Nama Wisata</label>
                    <input type="text" name="nama_wisata" id="edit_nama_wisata"
                        class="w-full mt-1 px-3 py-2 border rounded-lg" required>
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Area</label>
                    <input type="text" name="area" id="edit_area"
                        class="w-full mt-1 px-3 py-2 border rounded-lg" required>
                </div>

                <div class="mb-6">
                    <label class="font-semibold">Harga</label>
                    <input type="number" name="harga" id="edit_harga"
                        class="w-full mt-1 px-3 py-2 border rounded-lg" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    
    <script>
        function openAddModal() {
            const modal = document.getElementById('addModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(nama, area, harga, updateUrl) {
            document.getElementById('edit_nama_wisata').value = nama;
            document.getElementById('edit_area').value = area;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('editForm').action = updateUrl;

            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        openEditModal(
            this.dataset.nama,
            this.dataset.area,
            this.dataset.harga,
            this.dataset.url
        );
    });
});

    </script>

</body>

</html><?php /**PATH C:\laragon\www\travelaa\resources\views/pages/adminManajemenWisata.blade.php ENDPATH**/ ?>