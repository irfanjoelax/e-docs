@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Data Surat Masuk</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <x-alert></x-alert>
                <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                    @csrf @if ($isEdit) @method('PUT') @endif
                    <div class="form-group row">
                        <label for="no_surat" class="col-sm-2 col-form-label">No. Surat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="no_surat"
                                value="{{ ($isEdit) ? $suratMasuk->no_surat : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="asal_surat" class="col-sm-2 col-form-label">Asal Surat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="asal_surat"
                                value="{{ ($isEdit) ? $suratMasuk->asal_surat : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="perihal"
                                value="{{ ($isEdit) ? $suratMasuk->perihal : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="klasifikasi_id" class="col-sm-2 col-form-label">Kode Klasifikasi</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="klasifikasi_id" required>
                                <option value="" selected>-- Daftar kode klasifikasi --</option>
                                @foreach ($klasifikasis as $klasifikasi)
                                <option value="{{ $klasifikasi->id }}" @if ($isEdit) {{ ($klasifikasi->id ==
                                    $suratMasuk->klasifikasi_id) ? 'selected' : '' }} @endif>{{ $klasifikasi->nama }}
                                    ({{ $klasifikasi->kode }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="tgl_surat"
                                value="{{ ($isEdit) ? $suratMasuk->tgl_surat : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="tgl_masuk"
                                value="{{ ($isEdit) ? $suratMasuk->tgl_masuk : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan"
                                value="{{ ($isEdit) ? $suratMasuk->keterangan : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">File Surat</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" {{ ($isEdit) ? '' : 'required' }}>
                            @if ($isEdit)
                            <small class="form-text text-danger">
                                Kosongkan jika tidak ingin mengubah file surat
                            </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-2">
                            <button type="submit" class="btn btn-primary">
                                {{ ($isEdit) ? 'Update' : 'Save' }} now
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-dark ml-2">
                                Back to previous
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection