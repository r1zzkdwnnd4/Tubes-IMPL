<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Agen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">

        @include('sections.adminSidebar')

        <!-- CONTENT -->
        <main class="flex-1 p-8">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-semibold">Manajemen Agen</h2>
                    <p class="text-gray-500">Kelola agen wisata</p>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="openAddModal()">
                    + Tambah Agen
                </button>
            </div>


            <!-- MODAL TAMBAH WISATA -->
            <!-- popup menu untuk form tambah agen -->
            <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

                    <!-- Tombol Close -->
                    <button onclick="closeAddModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black">
                        ✖
                    </button>

                    <h2 class="text-xl font-bold mb-4">Tambah Paket Wisata</h2>

                    <!-- FORM CREATE -->

                    <form method="POST" action="{{ route('admin.customers.store') }}"> <!-- masukin action dan method disini -->
                        @csrf

                        <!-- NAMA AGEN -->
                        <div class="mb-3">
                            <label class="font-semibold">Nama Agen</label>
                            <input type="text" name="nama_agen"
                                class="w-full mt-1 px-3 py-2 border rounded-lg">
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="font-semibold">Email</label>
                            <input type="text" name="email"
                                class="w-full mt-1 px-3 py-2 border rounded-lg">
                        </div>

                        <!-- password -->
                        <div class="mb-3">
                            <label class="font-semibold">Password</label>
                            <input type="password" name="password"
                                class="w-full mt-1 px-3 py-2 border rounded-lg">

                        </div>

                        <!-- SUBMIT -->
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                            Tambah Agen
                        </button>
                    </form>
                </div>
            </div>


            <!-- SEARCH & FILTER WRAPPER -->
            <div class="mb-6 p-4 bg-white border rounded-xl shadow-sm">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <!-- SEARCH BAR -->
                    <div>
                        <label class="text-sm text-gray-600">Cari Agen</label>
                        <input type="text" placeholder="Cari agen atau area..."
                            class="w-full p-3 border border-black/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    </div>


                    <!-- FILTER AREA -->
                    <div>
                        <label class="text-sm text-gray-600">Filter Area</label>
                        <select class="w-full p-3 border border-black/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <option value="">Semua Area</option>
                            <option>Bali</option>
                            <option>Papua Barat</option>
                            <option>Yogyakarta</option>
                            <!-- Tambah dinamis -->
                        </select>
                    </div>

                    <!-- FILTER WISATA DIKELOLA -->
                    <div>
                        <label class="text-sm text-gray-600">Filter Wisata</label>
                        <select class="w-full p-3 border border-black/30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <option value="">Semua Destinasi</option>
                            <option>Pantai Kuta</option>
                            <option>Wayag Island</option>
                            <option>Prambanan</option>
                            <!-- Bisa diisi otomatis -->
                        </select>
                    </div>

                </div>
            </div>

            <!-- TABLE LIST -->
            <div class="rounded-xl shadow mb-10 overflow-hidden border border-gray-300">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-500 text-white">
                        <tr class="border-b border-gray-500">
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Nama Agen</th>
                            <th class="p-3 text-left">Area</th>
                            <th class="p-3 text-left">Wisata yang dikelola</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="wisataTable" class="bg-white text-black">
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

            <h2 class="text-xl font-bold mb-4">Edit Data Agen</h2>

            <!-- FORM EDIT (tinggal sambungkan ke route update) -->
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')


                <!-- NAMA AGEN -->
                <div class="mb-3">
                    <label class="font-semibold">Nama Agen</label>
                    <input type="text" name="nama_agen" id="edit_nama_agen"
                        class="w-full mt-1 px-3 py-2 border rounded-lg">
                </div>

                <!-- AREA -->
                <div class="mb-3">
                    <label class="font-semibold">Area</label>
                    <input type="text" name="area" id="edit_area"
                        class="w-full mt-1 px-3 py-2 border rounded-lg">
                </div>

                <!-- NO HP -->
                <div class="mb-3">
                    <label class="font-semibold">Wisata yang dikelola</label>
                    <select name="wisata_dikelola" id="edit_wisata_dikelola" class="w-full mt-1 px-3 py-2 border rounded-lg">
                        <option value="pantai kuta">Pantai Kuta</option>
                        <option value="raja ampat">Raja Ampat</option>
                        <option value="prambanan">Prambanan</option>
                        <option value="lombok">Lombok</option>
                        <option value="bromo">Bromo</option>
                        <option value="komodo">Komodo</option>
                    </select>
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
        // DATA WISATA DUMMY (bisa diganti fetch dari API backend)
        const wisataList = [{
                id: "TOUR001",
                nama: "Paket Bali 3D2N",
                area: "Bali",
                wisata: "pantai kuta"
            },
            {
                id: "TOUR002",
                nama: "Raja Ampat 5D4N",
                area: "Papua Barat",
                wisata: "raja ampat"
            },
            {
                id: "TOUR003",
                nama: "Yogyakarta Cultural",
                area: "Yogyakarta",
                wisata: "prambanan"
            },
            {
                id: "TOUR004",
                nama: "Lombok Paradise",
                area: "Lombok",
                wisata: "lombok"
            },
            {
                id: "TOUR005",
                nama: "Bromo Sunrise",
                area: "Jawa Timur",
                wisata: "bromo"
            },
            {
                id: "TOUR006",
                nama: "Komodo Adventure",
                area: "NTT",
                wisata: "komodo"
            },
        ];



        const tableBody = document.getElementById("wisataTable");

        wisataList.forEach(w => {
            tableBody.innerHTML += `
        <tr class="border-b hover:bg-gray-50">
            <td class="p-3">${w.id}</td>
            <td class="p-3">${w.nama}</td>
            <td class="p-3">${w.area}</td>
            <td class="p-3">${w.wisata}</td>
            <td class="p-3 text-center flex items-center gap-3 justify-center">
                <button onclick="openEditModal()"class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Edit
                </button>
                <button class="text-red-600 hover:underline">delete</button>
            </td>
        </tr>`;
        });


        //script untuk buka popup menu edit data agen
        function openEditModal(id, nama, email, wisata, updateUrl) {
            document.getElementById('edit_nama_agen').value = nama;
            document.getElementById('edit_area').value = email;
            document.getElementById('edit_wisata_dikelola').value = wisata;

            // Set action form ke URL update
            document.getElementById('editForm').action = updateUrl;

            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        //script untuk buka popup menu tambah agen
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