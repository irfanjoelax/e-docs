@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Laporan Disposisi</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">Masukkan Tanggal Awal dan Akhir</div>
                <form class="form-group" action="{{ url('/atasan/laporan/disposisi/print', []) }}" method="POST">
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
                                <th>No.</th>
                                <th>Surat Masuk</th>
                                <th>Tujuan</th>
                                <th>Isi</th>
                                <th>Batas Waktu</th>
                                <th>Sifat</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($disposisis as $disposisi)
                            <tr>
                                <th scope="row">
                                    {{ ($disposisis->currentPage() - 1) * $disposisis->perPage() + $loop->iteration
                                    }}
                                </th>
                                <td>{{ $disposisi->surat_masuk->no_surat }}</td>
                                <td>{{ $disposisi->tujuan }}</td>
                                <td>{{ $disposisi->isi }}</td>
                                <td>{{ $disposisi->batas_waktu }}</td>
                                <td>{{ $disposisi->sifat }}</td>
                                <td>{{ $disposisi->catatan }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger">
                                    Disposisi has been empty
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $disposisis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection