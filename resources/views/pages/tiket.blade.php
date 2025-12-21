<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Pemesanan</title>
</head>
<body>

    <h1>TIKET BERHASIL DIBUAT</h1>

    <p><strong>ID Tiket:</strong> {{ $ticket->id }}</p>
    <p><strong>Kode Booking:</strong> {{ $ticket->booking_code }}</p>
    <p><strong>Tanggal Tiket:</strong> {{ $ticket->tanggal_tiket }}</p>
    <p><strong>Transaction ID:</strong> {{ $ticket->transaction_id }}</p>
    <p><strong>Customer ID:</strong> {{ $ticket->customer_id }}</p>

</body>
</html>
