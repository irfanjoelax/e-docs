@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Klasifikasi Surat</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <x-alert></x-alert>
                <form action="{{ $url }}" method="POST">
                    @csrf @if ($isEdit) @method('PUT') @endif
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Klasifikasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" value="{{ ($isEdit) ? $klasifikasi->nama : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="kode" value="{{ ($isEdit) ? $klasifikasi->kode : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode" class="col-sm-2 col-form-label">Uraian</label>
                        <div class="col-sm-10">
                            <textarea name="uraian" rows="2" class="form-control">{{ ($isEdit) ? $klasifikasi->uraian : '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 offset-2">
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
