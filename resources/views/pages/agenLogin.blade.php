<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Agen Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/register.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
    <a class="navbar-brand ms-4" href="{{ route('home') }}"><h1>Travela Agen</h1></a>
    <div class="collapse navbar-collapse justify-content-end me-4">
        <ul class="navbar-nav">
            <li class="nav-item me-3">
                <span class="btn btn-secondary disabled">Agen Only</span>
            </li>
        </ul>
    </div>
</nav>

<div class="register-container">
    <div class="register-box">
        <h1>Login Agen</h1>

        {{-- ERROR --}}
        @if (session('error'))
            <div class="alert alert-danger mt-2">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('agen.login.process') }}">
            @csrf

            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>
                <input type="email" name="Email" class="form-control" placeholder="Email Agen" required>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="Password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-daftar">Masuk</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
