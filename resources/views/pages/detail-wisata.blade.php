<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $wisata->NamaWisata }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1D4ED8',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">

@include('sections.header')

<div class="max-w-6xl mx-auto px-6 pt-28 pb-10">


    {{-- KEMBALI KE KATALOG --}}
    <a href="{{ route('wisata.katalog') }}"
       class="inline-flex items-center bg-primary-blue hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md mb-8">
        ← Kembali ke Katalog
    </a>

    {{-- HERO IMAGE --}}
    <div class="relative h-[420px] rounded-3xl overflow-hidden shadow-lg mb-10">
        <img
            src="{{ $wisata->Gambar
                ? asset('uploads/wisata/' . $wisata->Gambar)
                : asset('images/img1.jpg') }}"
            alt="{{ $wisata->NamaWisata }}"
            class="w-full h-full object-cover"
        >

        {{-- OVERLAY --}}
        <div class="absolute inset-0 bg-black/40"></div>

        {{-- TEKS --}}
        <div class="absolute bottom-8 left-8 text-white">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-2">
                {{ $wisata->NamaWisata }}
            </h1>
            <p class="flex items-center gap-2 text-sm opacity-90">
                📍 {{ $wisata->Area }}
            </p>
        </div>
    </div>

    {{-- CARD HARGA --}}
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 flex items-center justify-between mb-10">
        <div>
            <p class="text-sm text-gray-600 mb-1">Harga Paket Wisata</p>
            <p class="text-2xl font-extrabold text-primary-blue">
                Rp {{ number_format($wisata->Harga, 0, ',', '.') }} / orang
            </p>
        </div>

        <div class="w-12 h-12 rounded-full bg-primary-blue text-white flex items-center justify-center">
            💰
        </div>
    </div>

    {{-- DESKRIPSI --}}
    <div class="mb-10">
        <h3 class="text-lg font-bold border-l-4 border-primary-blue pl-3 mb-3">
            Deskripsi Paket
        </h3>

        <p class="text-gray-700 leading-relaxed">
            {{ $wisata->Deskripsi ?? 'Belum ada deskripsi untuk paket wisata ini.' }}
        </p>
    </div>

    {{-- LOKASI --}}
    <div class="bg-gray-100 rounded-xl p-5 mb-10">
        <h4 class="font-semibold flex items-center gap-2 mb-1">
            📍 Lokasi
        </h4>
        <p class="text-gray-600">{{ $wisata->Area }}</p>
    </div>

    {{-- CTA --}}
    <a href="{{ route('form.booking') }}"
       class="block w-full text-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-4 rounded-xl hover:opacity-90 transition">
        Booking Sekarang
    </a>

</div>

</body>
</html>
