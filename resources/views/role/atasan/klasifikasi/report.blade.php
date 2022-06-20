@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Laporan {{ $klasifikasi->nama }}</h1>
    </div>

    <div class="section-body">
        <a href="{{ url('/atasan/laporan/klasifikasi/'.$klasifikasi->id.'/print', []) }}" class="btn btn-primary mb-3"
            type="submit">Cetak Laporan</a>

        <div class="section-title">Surat Masuk</div>
        <div class="card mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Surat</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Asal Surat</th>
                                <th scope="col">Tgl Surat</th>
                                <th scope="col">Tgl Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($klasifikasi->surat_masuk as $suratMasuk)
                            <tr>
                                <th scope="row">
                                    {{ $loop->iteration }}
                                </th>
                                <td>
                                    {{ $suratMasuk->no_surat }}
                                </td>
                                <td>{{ $suratMasuk->klasifikasi->kode }}</td>
                                <td>{{ $suratMasuk->perihal }}</td>
                                <td>{{ $suratMasuk->asal_surat }}</td>
                                <td>{{ $suratMasuk->tgl_surat }}</td>
                                <td>{{ $suratMasuk->tgl_masuk }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-danger">
                                    Surat masuk has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="section-title">Surat Keluar</div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
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
                            @forelse ($klasifikasi->surat_keluar as $suratKeluar)
                            <tr>
                                <th scope="row">
                                    {{ $loop->iteration }}
                                </th>
                                <td>
                                    {{ $suratKeluar->no_surat }}
                                </td>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection