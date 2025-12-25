<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Agen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    @include('sections.adminSidebar')

    <main class="flex-1 p-8">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold">Manajemen Agen</h2>
                <p class="text-gray-500">Kelola agen wisata</p>
            </div>

            <button onclick="openAddModal()"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                + Tambah Agen
            </button>
        </div>

        {{-- FLASH MESSAGE --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLE --}}
        <div class="rounded-xl shadow mb-10 overflow-hidden border border-gray-300 bg-white">
            <table class="w-full border-collapse">
                <thead class="bg-gray-500 text-white">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Nama Agen</th>
                        <th class="p-3 text-left">Area</th>
                        <th class="p-3 text-left">Wisata Dikelola</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-black">
                @forelse ($agen as $a)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $a->id_agen }}</td>
                        <td class="p-3">{{ $a->NamaAgen }}</td>
                        <td class="p-3">{{ $a->Area }}</td>
                        <td class="p-3">
                            {{ $a->wisata ?? '-' }}
                        </td>
                        <td class="p-3 text-center flex gap-3 justify-center">

                            {{-- EDIT --}}
                            <button
                                onclick="openEditModal(
                                    '{{ $a->NamaAgen }}',
                                    '{{ $a->Email }}',
                                    '{{ $a->Area }}',
                                    '{{ route('admin.agen.update', $a->id_agen) }}'
                                )"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Edit
                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.agen.destroy', $a->id_agen) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus agen ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">
                            Data agen belum tersedia
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </main>
</div>

{{-- ================= MODAL TAMBAH AGEN ================= --}}
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

        <button onclick="closeAddModal()"
            class="absolute top-3 right-3 text-gray-500 hover:text-black">✖</button>

        <h2 class="text-xl font-bold mb-4">Tambah Agen</h2>

        <form action="{{ route('admin.agen.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="font-semibold">Nama Agen</label>
                <input type="text" name="nama_agen"
                    class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-3">
                <label class="font-semibold">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-6">
                <label class="font-semibold">Area</label>
                <input type="text" name="area"
                    class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

             <div class="mb-6">
                <label class="font-semibold">Password</label>
                <input type="password" name="password"
                class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>
            


            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Tambah Agen
            </button>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT AGEN ================= --}}
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-xl relative">

        <button onclick="closeEditModal()"
            class="absolute top-3 right-3 text-gray-500 hover:text-black">✖</button>

        <h2 class="text-xl font-bold mb-4">Edit Agen</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="font-semibold">Nama Agen</label>
                <input type="text" name="nama_agen" id="edit_nama_agen"
                    class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-3">
                <label class="font-semibold">Email</label>
                <input type="email" name="email" id="edit_email"
                    class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-6">
                <label class="font-semibold">Area</label>
                <input type="text" name="area" id="edit_area"
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
    document.getElementById('addModal').classList.remove('hidden');
    document.getElementById('addModal').classList.add('flex');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
}

function openEditModal(nama, email, area, updateUrl) {
    document.getElementById('edit_nama_agen').value = nama;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_area').value = area;
    document.getElementById('editForm').action = updateUrl;

    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>

</body>
</html>
