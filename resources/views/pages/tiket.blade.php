<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pemesanan</title>
    <link rel="stylesheet" href="{{ asset('styles/tiket.css') }}">
</head>
<body>

<div class="banner"></div>

<div class="ticket-container">
    <div class="ticket-header">Tiket Pemesanan</div>

    <div class="ticket-body">

        <div class="ticket-row">
            <span>Nama Lengkap:</span>
            <span>{{ $transaksi->customer->NamaCustomer }}</span>
        </div>

        <div class="ticket-row">
            <span>Email:</span>
            <span>{{ $transaksi->customer->Email }}</span>
        </div>

        <div class="ticket-row">
            <span>No Telepon:</span>
            <span>{{ $transaksi->customer->NoHP }}</span>
        </div>

        <div class="ticket-row">
            <span>Destinasi:</span>
            <span>{{ $transaksi->wisata->NamaWisata }}</span>
        </div>

        <div class="ticket-row">
            <span>Tanggal Travel:</span>
            <span>{{ \Carbon\Carbon::parse($transaksi->Tanggal_Travel)->format('d M Y') }}</span>
        </div>

        <div class="ticket-row">
            <span>Jumlah Orang:</span>
            <span>{{ $transaksi->Jumlah_Orang }} orang</span>
        </div>

        <div class="ticket-row">
            <span>Metode Pembayaran:</span>
            <span>{{ $transaksi->Metode_Pembayaran }}</span>
        </div>

        <div class="ticket-row">
            <span>Kode Booking:</span>
            <strong class="kode-booking">
                {{ $transaksi->Kode_Booking }}
            </strong>
        </div>

        <div class="divider"></div>

        <div class="total-row">
            Total Pembayaran:
            <span>
                Rp {{ number_format($transaksi->Total, 0, ',', '.') }}
            </span>
        </div>

        <div class="btn-container">
            <a href="{{ route('customer.home') }}" class="btn btn-home">
                Kembali ke Home
            </a>

            <button class="btn btn-print" onclick="window.print()">
                Cetak Tiket
            </button>
        </div>

    </div>
</div>

</body>
</html>
