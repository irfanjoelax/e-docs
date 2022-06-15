@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Surat Masuk</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-7 mb-3">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>
                                        <img src="{{ asset('images/logo.svg') }}" width="100">
                                    </h2>
                                    <div class="invoice-number">
                                        Kode: {{ $suratMasuk->klasifikasi->kode }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Perihal:</strong><br>
                                        <span>{{ $suratMasuk->perihal }}</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <strong>Asal Surat:</strong><br>
                                        <span>{{ $suratMasuk->asal_surat }}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <strong>Tangal Surat:</strong><br>
                                        <span>{{ $suratMasuk->tgl_surat }}</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <strong>Tangal Masuk:</strong><br>
                                        <span>{{ $suratMasuk->tgl_masuk }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Keterangan</div>
                                <p class="section-lead">{{ $suratMasuk->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                            <a href="{{ url('atasan/surat-masuk') }}" class="btn btn-secondary">
                                Back to previous
                            </a>
                        </div>
                        <a href="{{ url('/atasan/surat-keluar/download/'.$suratMasuk->id) }}" class="btn btn-primary">
                            Download Surat
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <h4 class="mb-4">New Disposisi</h4>
                <form action="{{ url('atasan/surat-masuk/'.$suratMasuk->id.'/disposisi/create', []) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="isi" placeholder="Isi" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sifat" placeholder="Sifat" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Batas Waktu</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="batas_waktu" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="catatan" placeholder="Catatan" required></textarea>
                    </div>
                    <button class="btn btn-warning">
                        Insert Disposisi
                    </button>
                </form>
            </div>

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
                                    <a href="{{ url('/atasan/surat-masuk/disposisi/print/'.$disposisi->id) }}"
                                        target="_blank" class="btn btn-sm btn-icon btn-dark">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <a href="{{ url('/atasan/surat-masuk/disposisi/delete/'.$disposisi->id, []) }}"
                                        class="btn btn-sm btn-icon btn-danger ml-1">
                                        <i class="fas fa-trash-alt"></i>
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
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://demo.getstisla.com/assets/modules/sweetalert/sweetalert.min.js"></script>
@if (session('alert-primary'))
<script>
    swal('Success', '{{ session('alert-primary') }}', 'success');
</script>
@endif
@endsection