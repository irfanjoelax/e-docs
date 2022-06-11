@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Data Pegawai</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <x-alert></x-alert>
                <form action="{{ $url }}" method="POST">
                    @csrf @if ($isEdit) @method('PUT') @endif
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nip" value="{{ ($isEdit) ? $pegawai->nip : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{ ($isEdit) ? $pegawai->nama : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="tgl_lahir" value="{{ ($isEdit) ? $pegawai->tgl_lahir : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telp" value="{{ ($isEdit) ? $pegawai->telp : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" rows="2" class="form-control" required>{{ ($isEdit) ? $pegawai->alamat : '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="golongan_id" class="col-sm-2 col-form-label">Golongan</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="golongan_id" required>
                                <option value="" selected>-- Daftar Golongan --</option>
                                @foreach ($golongans as $golongan)
                                <option value="{{ $golongan->id }}" @if ($isEdit) {{ ($golongan->id == $pegawai->golongan_id) ? 'selected' : '' }} @endif>{{ $golongan->golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan_id" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="jabatan_id" required>
                                <option value="" selected>-- Daftar Jabatan --</option>
                                @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}" @if ($isEdit) {{ ($jabatan->id == $pegawai->jabatan_id) ? 'selected' : '' }} @endif>{{ $jabatan->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="pns" id="pns" name="status" class="custom-control-input" @if ($isEdit) {{ ($pegawai->status == 'pns') ? 'checked' : '' }} @endif>
                                <label class="custom-control-label" for="pns">PNS</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="honor" id="honor" name="status" class="custom-control-input" @if ($isEdit) {{ ($pegawai->status == 'honor') ? 'checked' : '' }} @endif>
                                <label class="custom-control-label" for="honor">Honor</label>
                            </div>
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
