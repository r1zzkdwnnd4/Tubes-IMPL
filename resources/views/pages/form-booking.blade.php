<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Booking</title>
    <link rel="stylesheet" href="{{ asset('styles/form-booking.css') }}">
</head>

<body>

    <div class="banner"></div>

    <div class="booking-form">
        <h3>Online Booking</h3>

        {{-- FORM BOOKING LARAVEL --}}
        <form action="{{ route('customer.booking.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col">
                    <label>Nama Lengkap</label>
                    <input type="text"
                        name="NamaCustomer"
                        value="{{ auth('customer')->user()->NamaCustomer ?? '' }}"
                        readonly>
                </div>

                <div class="col">
                    <label>Email</label>
                    <input type="email"
                        name="Email"
                        value="{{ auth('customer')->user()->Email ?? '' }}"
                        readonly>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>No Telepon</label>
                    <input type="text"
                        name="NoHP"
                        value="{{ auth('customer')->user()->NoHP ?? '' }}"
                        required>
                </div>

                <div class="col">
                    <label>Destinasi Wisata</label>
                    <select name="Id_wisata" required>
                        <option value="" disabled {{ empty($selectedWisata) ? 'selected' : '' }}>
                            Pilih Destinasi
                        </option>

                        @foreach ($wisata as $w)
                        <option value="{{ $w->Id_wisata }}"
                            {{ (isset($selectedWisata) && $selectedWisata == $w->Id_wisata) ? 'selected' : '' }}>
                            {{ $w->NamaWisata }} - Rp{{ number_format($w->Harga) }}
                        </option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Jumlah Orang</label>
                    <input type="number" name="JumlahOrang" min="1" required>
                </div>

                <div class="col">
                    <label>Metode Pembayaran</label>
                    <select name="MetodePembayaran" required>
                        <option value="" disabled selected>Pilih Metode</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Tanggal Travel</label>
                    <input type="date" name="Tanggal" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                Lanjutkan ke Pembayaran
            </button>
        </form>
    </div>

</body>

</html>