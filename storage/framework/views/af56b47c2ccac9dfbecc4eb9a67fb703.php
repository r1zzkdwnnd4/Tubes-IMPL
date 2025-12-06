<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
    <a class="navbar-brand ms-4" href="#"><h1>Travela</h1></a>
    <div class="collapse navbar-collapse justify-content-end me-4">
        <ul class="navbar-nav">
            <li class="nav-item me-3">
                <a class="btn btn-sign-in" href="<?php echo e(route('login')); ?>">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-sign-up" href="<?php echo e(route('register')); ?>">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>

<div class="register-container">
    <div class="register-box">
        <p>Belum punya akun? <span class="text-muted">Buat</span></p>
        <h1>Login</h1>

        <form method="POST" action="<?php echo e(route('login.process')); ?>">
            <?php echo csrf_field(); ?>

            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-daftar">Masuk</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/login.blade.php ENDPATH**/ ?>