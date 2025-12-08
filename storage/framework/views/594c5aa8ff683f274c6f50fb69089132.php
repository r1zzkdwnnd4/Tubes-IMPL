<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travela - Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('styles/register.css')); ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
    <a class="navbar-brand ms-4" href="<?php echo e(route('home')); ?>"><h1>Travela</h1></a>
    <div class="collapse navbar-collapse justify-content-end me-4" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item me-3">
                <a class="btn btn-sign-in" href="<?php echo e(route('customer.login')); ?>">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-sign-up" href="<?php echo e(route('customer.register')); ?>">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>

<div class="register-container">
    <div class="register-box">

        <p>Sudah punya akun? <a href="<?php echo e(route('customer.login')); ?>" class="text-muted">Masuk</a></p>
        <h1>Registrasi</h1>

        
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
                <label class="form-label">Username</label>
                <input type="text" name="NamaCus" class="form-control" placeholder="Username">
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

            <button type="submit" class="btn btn-primary w-100 mt-2">Daftar</button>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\travela\resources\views/pages/register.blade.php ENDPATH**/ ?>