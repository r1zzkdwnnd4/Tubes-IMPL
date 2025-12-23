<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="{{ asset('styles/payment.css') }}">
</head>

<body>

<div class="payment-container">
    <h3>Detail Pembayaran</h3>

    <div class="info-row">
        <span>Nama Lengkap:</span>
        <span>{{ $transaksi->customer->NamaCustomer }}</span>
    </div>

    <div class="info-row">
        <span>Email:</span>
        <span>{{ $transaksi->customer->Email }}</span>
    </div>

    <div class="info-row">
        <span>No Telepon:</span>
        <span>{{ $transaksi->customer->NoHP }}</span>
    </div>

    <div class="info-row">
        <span>Destinasi:</span>
        <span>{{ $transaksi->wisata->NamaWisata }}</span>
    </div>

    <div class="info-row">
        <span>Jumlah Orang:</span>
        <span>{{ $transaksi->Jumlah_Orang }}</span>
    </div>

    <div class="info-row">
        <span>Metode Pembayaran:</span>
        <span>{{ $transaksi->Metode_Pembayaran }}</span>
    </div>

    <div class="info-row">
        <span>Tanggal Travel:</span>
        <span>{{ $transaksi->Tanggal_Travel }}</span>
    </div>

    <div class="total">
        Total Harga: Rp{{ number_format($transaksi->Total, 0, ',', '.') }}
    </div>

    <form action="{{ route('customer.konfirmasi') }}" method="POST">
        @csrf
        <button type="submit" class="btn-pay">Bayar</button>
    </form>
</div>

</body>
</html>
