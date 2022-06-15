@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Disposisi Surat Masuk</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="table-responsive">
                    <table class="table table-hover table-md">
                        <thead>
                            <tr>
                                <th>Tujuan</th>
                                <th>Isi</th>
                                <th>Batas Waktu</th>
                                <th>Sifat</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratMasuk->disposisis as $disposisi)
                            <tr>
                                <td>{{ $disposisi->tujuan }}</td>
                                <td>{{ $disposisi->isi }}</td>
                                <td>{{ $disposisi->batas_waktu }}</td>
                                <td>{{ $disposisi->sifat }}</td>
                                <td>{{ $disposisi->catatan }}</td>
                                <td>
                                    <a href="{{ url('/petugas/surat-masuk/disposisi/print/'.$disposisi->id) }}"
                                        target="_blank" class="btn btn-sm btn-icon btn-dark">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">
                                    Disposisi has been empty
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ url('/petugas/surat-masuk', []) }}" class="btn btn-secondary">
                    Back to previous
                </a>
            </div>
        </div>
    </div>
</section>
@endsection