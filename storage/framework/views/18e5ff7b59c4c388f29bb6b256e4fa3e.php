<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">

        <?php echo $__env->make('sections.adminSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- CONTENT -->
        <main class="flex-1 p-8">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-semibold">Manajemen Customer</h2>
                    <p class="text-gray-500">Kelola customer yang terdaftar</p>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                        onclick="openAddModal()">
                    + Tambah Customer
                </button>
            </div>

            <!-- SEARCH WRAPPER-->
            <div class="mb-6 p-4 bg-white border rounded-xl shadow-sm">
                <label class="text-sm text-black">Cari Customer</label>
                <input type="text" placeholder="Cari customer..."
                    class="w-full p-3 border border-black/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>

            <!-- CUSTOMER TABLE -->
            <div class="rounded-xl shadow mb-10 overflow-hidden border border-gray-300">
                <table class="w-full border-collapse">

                    <!-- HEADER -->
                    <thead class="bg-gray-500 text-white">
                        <tr class="border-b border-gray-500">
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Nama Customer</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">No HP</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody class="bg-white text-black">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3"><?php echo e($cust->Id_cust); ?></td>
                                <td class="p-3"><?php echo e($cust->NamaCustomer); ?></td>
                                <td class="p-3"><?php echo e($cust->Email); ?></td>
                                <td class="p-3"><?php echo e($cust->NoHP); ?></td>

                                <td class="p-3 text-center flex items-center gap-3 justify-center">

                                    <!-- BUTTON EDIT -->
                                    <button
                                        onclick="openEditModal(
                                            '<?php echo e($cust->Id_cust); ?>',
                                            '<?php echo e($cust->NamaCustomer); ?>',
                                            '<?php echo e($cust->Email); ?>',
                                            '<?php echo e($cust->NoHP); ?>',
                                            '<?php echo e(route('admin.customer.update', $cust->Id_cust)); ?>'
                                        )"
                                        class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                        Edit
                                    </button>

                                    <!-- DELETE -->
                                    <form action="<?php echo e(route('admin.customer.delete', $cust->Id_cust)); ?>"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>


        </main>
    </div>

    <!-- MODAL TAMBAH CUSTOMER -->
    <div id="addModal"
         class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

            <button onclick="closeAddModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black"> ✖ </button>

            <h2 class="text-xl font-bold mb-4">Tambah Customer</h2>

            <form action="<?php echo e(route('admin.customer.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="font-semibold">Nama Customer</label>
                    <input type="text" name="nama_customer"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Email</label>
                    <input type="email" name="email"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Password</label>
                    <input type="password" name="password"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div class="mb-3">
                    <label class="font-semibold">No HP</label>
                    <input type="text" name="no_hp"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Tambah Customer
                </button>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT CUSTOMER -->
    <div id="editModal"
         class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

            <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black"> ✖ </button>

            <h2 class="text-xl font-bold mb-4">Edit Customer</h2>

            <form id="editForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="font-semibold">Nama Customer</label>
                    <input type="text" id="edit_nama" name="nama_customer"
                        class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div class="mb-3">
                    <label class="font-semibold">Email</label>
                    <input type="email" id="edit_email" name="Email"
                        class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div class="mb-3">
                    <label class="font-semibold">No HP</label>
                    <input type="text" id="edit_nohp" name="no_hp"
                        class="w-full px-3 py-2 border rounded-lg">
                </div>
    
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 mt-3">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden')
            document.getElementById('addModal').classList.add('flex')
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden')
        }

        function openEditModal(id, nama, email, nohp, url) {
            document.getElementById('edit_nama').value = nama
            document.getElementById('edit_email').value = email
            document.getElementById('edit_nohp').value = nohp

            document.getElementById('editForm').action = url

            document.getElementById('editModal').classList.remove('hidden')
            document.getElementById('editModal').classList.add('flex')
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden')
        }
    </script>

</body>

</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/adminManajemenCustomer.blade.php ENDPATH**/ ?>