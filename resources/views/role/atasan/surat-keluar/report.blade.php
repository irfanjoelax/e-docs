@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Laporan Surat Keluar</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">Masukkan Tanggal Awal dan Akhir</div>
                <form class="form-group" action="{{ url('/atasan/laporan/surat-keluar/print', []) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="date" class="form-control" name="tgl_awal">
                        <input type="date" class="form-control" name="tgl_akhir">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cetak sesuai filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Surat</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Tgl Surat</th>
                                <th scope="col">Tgl Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratKeluars as $suratKeluar)
                            <tr>
                                <th scope="row">
                                    {{ ($suratKeluars->currentPage() - 1) * $suratKeluars->perPage() + $loop->iteration
                                    }}
                                </th>
                                <td>{{ $suratKeluar->no_surat }}</td>
                                <td>{{ $suratKeluar->klasifikasi->kode }}</td>
                                <td>{{ $suratKeluar->perihal }}</td>
                                <td>{{ $suratKeluar->tujuan }}</td>
                                <td>{{ $suratKeluar->tgl_surat }}</td>
                                <td>{{ $suratKeluar->tgl_keluar }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-danger">
                                    Surat keluar has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $suratKeluars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection