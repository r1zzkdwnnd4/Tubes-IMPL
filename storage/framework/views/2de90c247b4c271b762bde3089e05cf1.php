<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8fafc, #eef2ff);
            min-height: 100vh;
        }

        .login-card {
            max-width: 420px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            background: #ffffff;
        }

        .login-card h1 {
            font-weight: 700;
        }

        .form-control {
            padding: 12px 14px;
        }

        .btn-login {
            padding: 12px;
            font-weight: 600;
            background-color: #1D4ED8;
            border: none;
        }

        .btn-login:hover {
            background-color: #1E40AF;
        }

        .brand {
            font-weight: 800;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-transparent py-4 px-5">
    <a class="navbar-brand brand text-primary" href="#">Travela</a>

    <div>
        <a class="btn btn-outline-primary me-2" href="<?php echo e(route('customer.login')); ?>">Sign In</a>
        <a class="btn btn-primary" href="<?php echo e(route('customer.register')); ?>">Sign Up</a>
    </div>
</nav>

<!-- LOGIN FORM -->
<div class="d-flex align-items-center justify-content-center px-3" style="min-height: calc(100vh - 120px);">
    <div class="login-card p-4 p-md-5">

        
        <h1 class="mb-4">Login</h1>

        <form method="POST" action="<?php echo e(route('customer.login.process')); ?>">
            <?php echo csrf_field(); ?>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
            </div>
           
            <a href="<?php echo e(route('customer.reset.form')); ?>" class="text-primary fw-semibold text-decoration-none mb-4 d-block">
                Lupa Sandi?
            </a>
        

            <!-- BUTTON -->
            <button type="submit" class="btn btn-login text-white w-100 mb-3">
                Masuk
            </button>
        </form>

        <p class="text-center text-muted mb-0">
            Belum punya akun?
            <a href="<?php echo e(route('customer.register')); ?>" class="text-primary fw-semibold text-decoration-none">
                Daftar sekarang
            </a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/login.blade.php ENDPATH**/ ?>