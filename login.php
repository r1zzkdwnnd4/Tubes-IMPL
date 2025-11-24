<?php
// Jika ingin menambahkan logic PHP (cek session, redirect, dll) bisa diletakkan di sini.
// Untuk sekarang bagian ini dibiarkan kosong.
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
        <a class="navbar-brand ms-4" href="#"><h1>Travela</h1></a>
        <div class="collapse navbar-collapse justify-content-end me-4" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="btn btn-sign-in" href="login.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sign-up" href="register.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="register-container">
    <div class="register-box">
        <p>Belum punya akun? <span class="text-muted">Buat</span></p>
            <h1>Login</h1>
        <form>
            
            <div class="input-group mb-4">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4"/>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.035 6.854L9.432 9.07l-2.03-1.22L1 11.105V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                    </svg>
                </span>
                <input type="email" class="form-control" placeholder="Email" aria-label="Email">
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m-2 7h4v2H6zm0 3v1a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-1H6z"/>
                        <path fill-rule="evenodd" d="M12 4v4H4V4a4 4 0 1 1 8 0M3 8v2H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-1V8a5 5 0 0 0-10 0M2 11a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg>
                </span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Password">
            </div>

            <button type="submit" class="btn btn-daftar">Masuk</button>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
