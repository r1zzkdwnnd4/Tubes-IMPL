<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Travela - Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1D4ED8',
                    }
                }
            }
        }
    </script>


 <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <style>
      

        .brand {
            font-weight: 800;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 to-indigo-100">

   <!-- NAVBAR -->
<nav class="navbar navbar-light bg-transparent py-4 px-5">
    <a class="navbar-brand brand text-primary" href="#">Travela</a>

    
</nav>

    <div class="flex items-center justify-center px-4" style="min-height: calc(100vh - 120px);">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6 md:p-8">

            <p class="text-gray-500 mb-1 text-sm">
                Keamanan akun
            </p>

            <h1 class="text-2xl font-bold mb-6">
                Ganti Password
            </h1>

            
            <?php if($errors->any()): ?>
            <div class="mb-5 bg-red-100 text-red-700 p-4 rounded-lg text-sm">
                <ul class="list-disc list-inside space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('customer.reset.process')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue"
                        placeholder="nama@email.com"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Password Lama</label>
                    <input type="password" name="old_password"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue"
                        placeholder="Masukkan password lama"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Password Baru</label>
                    <input type="password" name="new_password"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue"
                        placeholder="Buat password baru"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue"
                        placeholder="Ulangi password baru"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-primary-blue text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Simpan Password Baru
                </button>

                <p class="text-center text-sm text-gray-500 mt-4">
                    Sudah punya akun?
                    <a href="<?php echo e(route('customer.login')); ?>"
                        class="text-primary-blue font-semibold hover:underline">
                        Masuk
                    </a>
                </p>
            </form>

        </div>
    </div>

</body>

</html><?php /**PATH C:\laragon\www\travelaa\resources\views/pages/reset-password.blade.php ENDPATH**/ ?>