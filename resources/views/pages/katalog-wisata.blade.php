<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Wisata</title>
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

<body class="bg-white">

@include('sections.header')

<div class="max-w-7xl mx-auto px-6 py-20">


    {{-- LOOP PER AREA --}}
    @foreach ($wisataPerArea as $area => $wisataList)

        <!-- JUDUL AREA -->
        <div class="mb-12">
            <h2 class="text-6xl font-extrabold tracking-widest text-gray-900 uppercase">
                {{ $area }}
            </h2>
            <div class="h-1 w-24 bg-gray-300 mt-4"></div>
        </div>

        <!-- GRID CARD -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-24">

           @foreach ($wisataList as $wisata)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-[1.03] transition duration-300">

        <!-- IMAGE -->
       <img
            src="{{ $wisata->Gambar 
            ? asset('uploads/wisata/' . $wisata->Gambar) 
            : asset('images/img1.jpg') }}"
            alt="{{ $wisata->NamaWisata }}"
            class="w-full h-64 object-cover"
        >


        <!-- CONTENT -->
        <div class="p-6">
            <a href="{{ route('wisata.detail', ['id' => $wisata->Id_wisata]) }}">

                <h4 class="text-2xl font-bold mb-2 hover:underline">
                    {{ $wisata->NamaWisata }}
                </h4>
            </a>

            <p class="text-gray-500 mb-3">
                {{ $wisata->Area }}
            </p>

            <p class="text-primary-blue font-semibold mb-4">
                Rp {{ number_format($wisata->Harga, 0, ',', '.') }} / orang
            </p>

            <a href="{{ route('form.booking', ['wisata' => $wisata->Id_wisata]) }}"
               class="inline-block text-sm text-white bg-primary-blue px-4 py-2 rounded hover:bg-blue-700 transition">
                Booking
            </a>
        </div>

    </div>
@endforeach


        </div>

    @endforeach

</div>

</body>
</html>
