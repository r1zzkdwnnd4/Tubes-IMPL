@extends('pages.agenLayout')

@section('content')
<h1 class="fw-semibold mb-1">Riwayat Pemesanan</h1>
<p class="text-muted mb-4">Daftar pemesanan yang telah diproses</p>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between mb-4">
            <input type="text" class="form-control w-50"
                   placeholder="Cari berdasarkan nama atau paket">

            @php
                $status = request('status');
            @endphp

            <div class="btn-group">

                <a href="{{ route('agen.riwayat') }}"
                class="btn {{ $status === null ? 'btn-success' : 'btn-outline-secondary' }}">
                    Semua
                </a>

                <a href="{{ route('agen.riwayat', ['status' => 'confirmed']) }}"
                class="btn {{ $status === 'confirmed' ? 'btn-success' : 'btn-outline-secondary' }}">
                    Di Konfirmasi
                </a>

                <a href="{{ route('agen.riwayat', ['status' => 'pending']) }}"
                class="btn {{ $status === 'pending' ? 'btn-warning text-dark' : 'btn-outline-secondary' }}">
                    Menunggu
                </a>

                <a href="{{ route('agen.riwayat', ['status' => 'rejected']) }}"
                class="btn {{ $status === 'rejected' ? 'btn-danger' : 'btn-outline-secondary' }}">
                    Ditolak
                </a>

            </div>

        </div>

        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Paket</th>
                    <th>Tanggal</th>
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
                        <td>Rp {{ number_format($item->Total, 0, ',', '.') }}</td>
                        <td>
                            @if($item->Status === 'Dikonfirmasi')
                                <span class="badge bg-success">Dikonfirmasi</span>
                            @elseif($item->Status === 'Menunggu')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada riwayat pemesanan.
                        </td>
                    </tr>
                    @endforelse
                    </tbody>

        </table>

    </div>
</div>
@endsection
