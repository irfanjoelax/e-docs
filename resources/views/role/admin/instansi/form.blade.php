@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Manage Profile Instansi</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <x-alert></x-alert>
                <form action="{{ url('/admin/instansi/'.$instansi->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{$instansi->nama}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pimpinan" class="col-sm-2 col-form-label">Pimpinan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="pimpinan" value="{{$instansi->pimpinan}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telepon" value="{{$instansi->telepon}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" value="{{$instansi->email}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" rows="2" class="form-control" required>{{$instansi->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profile" class="col-sm-2 col-form-label">Profile</label>
                        <div class="col-sm-10">
                            <textarea name="profile" rows="2" class="summernote" required>{{$instansi->profile}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="visi_misi" class="col-sm-2 col-form-label">Visi Misi</label>
                        <div class="col-sm-10">
                            <textarea name="visi_misi" rows="2" class="summernote" required>{{$instansi->visi_misi}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-2">
                            <button type="submit" class="btn btn-primary">
                                Update now
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

@section('js')
<script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script>


@endsection
