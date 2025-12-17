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

            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="openAddModal()">
                + Tambah Customer
            </button>
        </div>

 <!-- MODAL TAMBAH WISATA -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

        <!-- Tombol Close -->
        <button onclick="closeAddModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black">
            ✖
        </button>

        <h2 class="text-xl font-bold mb-4">Tambah Customer</h2>

        <!-- FORM CREATE -->
        
        <form id="addForm">  <!-- masukin action dan method disini -->
            <?php echo csrf_field(); ?>

            <!-- NAMA CUSTOMER -->
            <div class="mb-3">
                <label class="font-semibold">Nama Customer</label>
                <input type="text" name="nama_customer"
                       class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="font-semibold">email</label>
                <input type="text" name="email"
                       class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <!-- NO HP -->
            <div class="mb-3">
                <label class="font-semibold">Password</label>
                <input type="password" name="password"
                       class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <!-- SUBMIT -->
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Tambah Customer
            </button>
        </form>
    </div>
</div>

         <!-- SEARCH WRAPPER-->
<div class="mb-6 p-4 bg-white border rounded-xl shadow-sm">

    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

        <!-- SEARCH BAR -->
<div>
    <label class="text-sm text-black">Cari Customer</label>
    <input type="text" placeholder="Cari customer..."
           class="w-full p-3 border border-black/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
</div>


    </div>
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
        <tbody id="wisataTable" class="bg-white text-black">
        </tbody>

    </table>
</div>
  

    </main>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

        <!-- Tombol Close -->
        <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black">
            ✖
        </button>

        <h2 class="text-xl font-bold mb-4">Edit Data Customer</h2>

        <!-- FORM EDIT (tinggal sambungkan ke route update) -->
        <form id="editForm" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- NAMA CUSTOMER -->
            <div class="mb-3">
                <label class="font-semibold">Nama Customer</label>
                <input type="text" name="nama_customer" id="edit_nama_customer"
                       class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="font-semibold">Email</label>
                <input type="email" name="email" id="edit_email"
                       class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <!-- NO HP -->
            <div class="mb-3">
                <label class="font-semibold">No HP</label>
                <input type="text" name="no_hp" id="edit_no_hp"
                       class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>
           
            
                
                

            <!-- SUBMIT -->
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 mt-3">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<script>
    // DATA CUSTOMER DUMMY (bisa diganti fetch dari API backend)
    const wisataList = [
        { id: "CUST001", nama: "Budi Santoso", email: "budi@gmail.com", nohp: "08123456789" },
        { id: "CUST002", nama: "Ani Pratiwi", email: "ani@gmail.com", nohp: "08123456788" },
        { id: "CUST003", nama: "Dedi Kurniawan", email: "dedi@gmail.com", nohp: "08123456787" },
        { id: "CUST004", nama: "Siti Nurhaliza", email: "siti@gmail.com", nohp: "08123456786" },
        { id: "CUST005", nama: "Rudi Hartono", email: "rudi@gmail.com", nohp: "08123456785" },
        { id: "CUST006", nama: "Lina Susanti", email: "lina@gmail.com", nohp: "08123456784" },
    ];

   

    const tableBody = document.getElementById("wisataTable");

    wisataList.forEach(w => {
        tableBody.innerHTML += `
        <tr class="border-b hover:bg-gray-50">
            <td class="p-3">${w.id}</td>
            <td class="p-3">${w.nama}</td>
            <td class="p-3">${w.email}</td>
            <td class="p-3">${w.nohp}</td>
            <td class="p-3 text-center flex items-center gap-3 justify-center">
                <button onclick="openEditModal()"class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Edit
                </button>
                <button class="text-red-600 hover:underline">delete</button>
            </td>
        </tr>`;
    });

     function openEditModal(id, nama, email, nohp, updateUrl) {
        document.getElementById('edit_nama_customer').value = nama;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_no_hp').value = nohp;

        // Set action form ke URL update
        document.getElementById('editForm').action = updateUrl;

        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
    document.getElementById('addModal').classList.add('flex');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
}

</script>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/adminManajemenCustomer.blade.php ENDPATH**/ ?>