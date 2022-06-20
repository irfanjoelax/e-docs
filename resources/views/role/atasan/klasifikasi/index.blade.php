@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Rekapitulasi Klasifikasi Surat</h1>
    </div>

    <div class="section-body">
        <a href="{{ url('/atasan/laporan/klasifikasi-surat/print', []) }}" class="btn btn-primary mb-3"
            type="submit">Cetak Rekapitulasi</a>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Klasifikasi</th>
                                <th>Surat Masuk</th>
                                <th>Surat Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($klasifikasis as $klasifikasi)
                            <tr>
                                <td>{{ $klasifikasi->kode }}</td>
                                <td>{{ $klasifikasi->nama }}</td>
                                <td>{{ $klasifikasi->surat_masuk->count() }}</td>
                                <td>{{ $klasifikasi->surat_keluar->count() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection