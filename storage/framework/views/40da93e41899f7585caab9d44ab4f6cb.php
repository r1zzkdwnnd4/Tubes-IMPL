<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .container h1 {
            color: #003366; 
            font-size: 28px;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #003366; 
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            margin: 5px;
        }

        .btn:hover {
            background-color: #002244;
        }

        .btn-ticket {
            background-color: #0066cc; 
        }

        .btn-ticket:hover {
            background-color: #004d99;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Pembayaran Berhasil!</h1>
        <p>Terima kasih telah melakukan pembayaran. Tiket Anda telah dikonfirmasi.</p>
        <div>
            <a href="tiket.php" class="btn btn-ticket">Lihat Tiket</a>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/konfirmasi-pembayaran.blade.php ENDPATH**/ ?>