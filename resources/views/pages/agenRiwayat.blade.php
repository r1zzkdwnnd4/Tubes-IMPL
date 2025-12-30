@extends('pages.agenLayout')

@section('content')
<h1 class="fw-semibold mb-1">Riwayat Pemesanan</h1>
<p class="text-muted mb-4">Daftar pemesanan yang telah diproses</p>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- FILTER --}}
        <form method="GET" class="row g-3 mb-4">

            {{-- SEARCH --}}
            <div class="col-md-3">
                <input type="text"
                       name="q"
                       value="{{ request('q') }}"
                       class="form-control"
                       placeholder="Cari customer / paket">
            </div>

            {{-- STATUS --}}
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="confirmed" {{ request('status')=='confirmed'?'selected':'' }}>
                        Dikonfirmasi
                    </option>
                    <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>
                        Ditolak
                    </option>
                </select>
            </div>

            {{-- TANGGAL MULAI --}}
            <div class="col-md-2">
                <input type="date"
                       name="start_date"
                       value="{{ request('start_date') }}"
                       class="form-control">
            </div>

            {{-- TANGGAL AKHIR --}}
            <div class="col-md-2">
                <input type="date"
                       name="end_date"
                       value="{{ request('end_date') }}"
                       class="form-control">
            </div>

            {{-- SUBMIT --}}
            <div class="col-md-2 d-grid">
                <button class="btn btn-success">
                    Filter
                </button>
            </div>

        </form>

        {{-- TABLE --}}
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Paket</th>
                    <th>Tanggal Travel</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
            @forelse($riwayat as $item)
                <tr>
                    <td>{{ $item->Id_transaksi }}</td>
                    <td>{{ $item->NamaCustomer }}</td>
                    <td>{{ $item->NamaWisata }}</td>
                    <td>{{ $item->Tanggal_Travel }}</td>
                    <td>{{ $item->Jumlah_Orang }}</td>
                    <td>Rp {{ number_format($item->Total,0,',','.') }}</td>
                    <td>
                        @if($item->Status === 'Dikonfirmasi')
                            <span class="badge bg-success">Dikonfirmasi</span>
                        @elseif($item->Status === 'Ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">{{ $item->Status }}</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-3">
                        Tidak ada data riwayat.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
