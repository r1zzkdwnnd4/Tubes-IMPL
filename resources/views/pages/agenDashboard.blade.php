@extends('pages.agenLayout')

@section('content')
    <h1 class="fw-semibold mb-1">Area Penugasan Agen</h1>
    <p class="text-muted mb-4">Halo, {{ $agen->NamaAgen }}!</p>

    <div class="card shadow-sm">
        <div class="card-body">
            <h6 class="text-success fw-semibold mb-3">
                Area Penugasan Agen
            </h6>

            <button class="btn btn-success rounded-pill px-4">
                {{ $areaAgen }}
            </button>
        </div>
    </div>
@endsection