@extends('pages.agenLayout')

@section('content')
<h1 class="fw-semibold mb-1">Daftar Paket Wisata</h1>
<p class="text-muted mb-4">Paket wisata yang ditugaskan kepada Anda</p>

<div class="row g-4">

@forelse($paketWisata as $paket)
<div class="col-md-6">
    <div class="card shadow-sm h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">{{ $paket->NamaWisata }}</h5>
                <span class="badge bg-success">Aktif</span>
            </div>

            <p class="text-success mb-1">📍 {{ $paket->Area }}</p>

            <p class="text-muted">
                Paket wisata di area {{ $paket->Area }}
            </p>

            <div class="d-flex gap-4 mb-3">
                <span>💰 Rp {{ number_format($paket->Harga, 0, ',', '.') }}</span>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <span class="badge bg-light text-dark border">Transport</span>
                <span class="badge bg-light text-dark border">Guide</span>
            </div>
        </div>
    </div>
</div>
@empty
<div class="col-12">
    <div class="alert alert-warning">
        Tidak ada paket wisata untuk area Anda.
    </div>
</div>
@endforelse

</div>
@endsection
