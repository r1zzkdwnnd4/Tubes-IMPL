<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Registrasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8fafc, #eef2ff);
            min-height: 100vh;
        }

        .register-card {
            max-width: 500px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            background: #ffffff;
        }

        .register-card h1 {
            font-weight: 700;
        }

        .form-control {
            padding: 12px 14px;
        }

        .btn-register {
            padding: 12px;
            font-weight: 600;
            background-color: #1D4ED8;
            border: none;
        }

        .btn-register:hover {
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
    <a class="navbar-brand brand text-primary" href="<?php echo e(route('home')); ?>">Travela</a>

    <div>
        <a class="btn btn-outline-primary me-2" href="<?php echo e(route('customer.login')); ?>">Sign In</a>
        <a class="btn btn-primary" href="<?php echo e(route('customer.register')); ?>">Sign Up</a>
    </div>
</nav>

<!-- REGISTER FORM -->
<div class="d-flex align-items-center justify-content-center px-3" style="min-height: calc(100vh - 120px);">
    <div class="register-card p-4 p-md-5">

        
        <h1 class="mb-4">Registrasi</h1>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($err); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('customer.register.process')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="NamaCustomer" class="form-control" placeholder="Masukkan nama lengkap">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="Email" class="form-control" placeholder="nama@email.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" placeholder="Buat password">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="Alamat" class="form-control" placeholder="Alamat tempat tinggal">
            </div>

            <div class="mb-4">
                <label class="form-label">No HP</label>
                <input type="text" name="NoHP" class="form-control" placeholder="08xxxxxxxxxx">
            </div>

            <button type="submit" class="btn btn-register text-white w-100 mb-3">
                Daftar
            </button>
        </form>

        <p class="text-center text-muted mb-0">
            Sudah punya akun?
            <a href="<?php echo e(route('customer.login')); ?>" class="text-primary fw-semibold text-decoration-none">
                Masuk
            </a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\travelaa\resources\views/pages/register.blade.php ENDPATH**/ ?>