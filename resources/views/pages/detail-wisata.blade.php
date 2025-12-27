<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $wisata->NamaWisata }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

@include('sections.header')

<div class="max-w-5xl mx-auto px-6 py-16">

    <!-- IMAGE -->
    <img
        src="{{ $wisata->Gambar 
            ? asset('uploads/wisata/' . $wisata->Gambar) 
            : asset('images/img1.jpg') }}"
        alt="{{ $wisata->NamaWisata }}"
        class="w-full h-96 object-cover rounded-xl mb-8"
    >

    <!-- TITLE -->
    <h1 class="text-4xl font-extrabold mb-4">
        {{ $wisata->NamaWisata }}
    </h1>

    <!-- AREA -->
    <p class="text-gray-600 text-lg mb-2">
        Area: {{ $wisata->Area }}
    </p>

    <!-- PRICE -->
    <p class="text-primary-blue text-2xl font-bold mb-6">
        Rp {{ number_format($wisata->Harga, 0, ',', '.') }} / orang
    </p>

    <!-- DESCRIPTION (OPTIONAL) -->
    @if (!empty($wisata->Deskripsi))
        <p class="text-gray-700 leading-relaxed mb-8">
            {{ $wisata->Deskripsi }}
        </p>
    @endif

    <!-- BOOKING BUTTON -->
    <a href="{{ route('form.booking') }}"
       class="inline-block bg-primary-blue text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        Booking Sekarang
    </a>

</div>

</body>
</html>
