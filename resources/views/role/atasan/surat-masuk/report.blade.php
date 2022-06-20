@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Laporan Surat Masuk</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">Masukkan Tanggal Awal dan Akhir</div>
                <form class="form-group" action="{{ url('/atasan/laporan/surat-masuk/print', []) }}" method="POST">
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
                                <th scope="col">Asal Surat</th>
                                <th scope="col">Tgl Surat</th>
                                <th scope="col">Tgl Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratMasuks as $suratMasuk)
                            <tr>
                                <th scope="row">
                                    {{ ($suratMasuks->currentPage() - 1) * $suratMasuks->perPage() + $loop->iteration
                                    }}
                                </th>
                                <td>{{ $suratMasuk->no_surat }}</td>
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

                    <div class="pl-4">
                        {{ $suratMasuks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection