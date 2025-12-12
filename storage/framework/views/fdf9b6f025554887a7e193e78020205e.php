<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agen Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary px-4 py-3">
    <span class="navbar-brand mb-0 h1">Agen Panel</span>
</nav>

<div class="container mt-5 text-center">
    <h1 class="mb-4">Welcome, Agen!</h1>
    <p class="lead">Login berhasil. Ini halaman dashboard uji coba.</p>

    <form method="POST" action="<?php echo e(route('agen.logout')); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn btn-danger">Logout</button>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\Tubes-IMPL\resources\views/pages/agenDashboard.blade.php ENDPATH**/ ?>