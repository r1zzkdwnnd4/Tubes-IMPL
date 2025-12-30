@extends('pages.agenLayout')

@section('content')
    <h1 class="fw-semibold mb-1">Dashboard Agen</h1>
    <p class="text-muted mb-4">Halo, {{ $agen->NamaAgen }}!</p>

    {{-- AREA PENUGASAN --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h6 class="text-success fw-semibold mb-3">
                Area Penugasan Agen
            </h6>

            <button class="btn btn-success rounded-pill px-4">
                {{ $areaAgen }}
            </button>
        </div>
    </div>

    {{-- PESANAN MASUK --}}
    <h5 class="fw-semibold mb-3">Pesanan Masuk (Menunggu Konfirmasi)</h5>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Customer</th>
                        <th>Paket Wisata</th>
                        <th>Tanggal Travel</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                @forelse($pesananMasuk as $p)
                    <tr>
                        <td>{{ $p->NamaCustomer }}</td>
                        <td>{{ $p->NamaWisata }}</td>
                        <td>{{ $p->Tanggal_Travel }}</td>
                        <td>{{ $p->Jumlah_Orang }}</td>
                        <td>Rp {{ number_format($p->Total,0,',','.') }}</td>
                        <td class="d-flex gap-2">

                            {{-- KONFIRMASI --}}
                            <form method="POST"
                                  action="{{ route('agen.pesanan.updateStatus', $p->Id_transaksi) }}">
                                @csrf
                                <input type="hidden" name="status" value="Dikonfirmasi">
                                <button class="btn btn-success btn-sm">
                                    Konfirmasi
                                </button>
                            </form>

                            {{-- TOLAK --}}
                            <form method="POST"
                                  action="{{ route('agen.pesanan.updateStatus', $p->Id_transaksi) }}">
                                @csrf
                                <input type="hidden" name="status" value="Ditolak">
                                <button class="btn btn-danger btn-sm">
                                    Tolak
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada pesanan menunggu konfirmasi.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection
