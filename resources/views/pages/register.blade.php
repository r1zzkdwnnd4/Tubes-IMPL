<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/register.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
    <a class="navbar-brand ms-4" href="{{ route('home') }}"><h1>Travela</h1></a>
    <div class="collapse navbar-collapse justify-content-end me-4" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item me-3">
                <a class="btn btn-sign-in" href="{{ route('customer.login') }}">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-sign-up" href="{{ route('customer.register') }}">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>

<div class="register-container">
    <div class="register-box">

        <p>Sudah punya akun? <a href="{{ route('customer.login') }}" class="text-muted">Masuk</a></p>
        <h1>Registrasi</h1>

        {{-- ERROR ALERT --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('customer.register.process') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="NamaCus" class="form-control" placeholder="Nama Lengkap">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" placeholder="Password">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="Alamat" class="form-control" placeholder="Alamat">
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="NoHP" class="form-control" placeholder="Nomor HP">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2">Daftar</button>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
