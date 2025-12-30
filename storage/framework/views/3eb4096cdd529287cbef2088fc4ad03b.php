<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    <main class="flex-1 p-8">

        
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Dashboard Manager
                </h1>
                <p class="text-slate-500 mt-1">
                    Ringkasan dan akses laporan sistem
                </p>
            </div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

            
            <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-xl">
                        💰
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">
                            Laporan Transaksi
                        </p>
                        <p class="text-lg font-semibold text-slate-800 mt-1">
                            Analisis Pendapatan
                        </p>
                    </div>
                </div>
            </div>

            
            <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-emerald-100 text-emerald-600 rounded-xl">
                        👥
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">
                            Laporan Pelanggan
                        </p>
                        <p class="text-lg font-semibold text-slate-800 mt-1">
                            Data & Aktivitas
                        </p>
                    </div>
                </div>
            </div>

            
            <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-xl">
                        🧭
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">
                            Laporan Agen
                        </p>
                        <p class="text-lg font-semibold text-slate-800 mt-1">
                            Kinerja & Kontribusi
                        </p>
                    </div>
                </div>
            </div>

        </div>

        
        <div class="bg-white p-8 rounded-2xl shadow-sm border">

            <h2 class="text-xl font-semibold text-slate-800 mb-6">
                Akses Cepat Laporan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                
                <a href="<?php echo e(route('manager.laporan.transaksi')); ?>"
                   class="group p-6 rounded-xl border hover:border-blue-500 hover:bg-blue-50 transition">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-600 font-semibold text-lg">
                                Laporan Transaksi
                            </p>
                            <p class="text-sm text-slate-500 mt-1">
                                Data transaksi & pendapatan
                            </p>
                        </div>
                        <span class="text-blue-500 text-xl group-hover:translate-x-1 transition">
                            →
                        </span>
                    </div>
                </a>

                
                <a href="<?php echo e(route('manager.laporan.pelanggan')); ?>"
                   class="group p-6 rounded-xl border hover:border-emerald-500 hover:bg-emerald-50 transition">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-emerald-600 font-semibold text-lg">
                                Laporan Pelanggan
                            </p>
                            <p class="text-sm text-slate-500 mt-1">
                                Aktivitas & data pelanggan
                            </p>
                        </div>
                        <span class="text-emerald-500 text-xl group-hover:translate-x-1 transition">
                            →
                        </span>
                    </div>
                </a>

                
                <a href="<?php echo e(route('manager.laporan.agen')); ?>"
                   class="group p-6 rounded-xl border hover:border-purple-500 hover:bg-purple-50 transition">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-600 font-semibold text-lg">
                                Laporan Agen
                            </p>
                            <p class="text-sm text-slate-500 mt-1">
                                Kinerja agen wisata
                            </p>
                        </div>
                        <span class="text-purple-500 text-xl group-hover:translate-x-1 transition">
                            →
                        </span>
                    </div>
                </a>

            </div>
        </div>

    </main>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\travela\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>