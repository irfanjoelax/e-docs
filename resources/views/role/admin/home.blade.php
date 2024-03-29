@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Home Page: Administrator</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Jabatan</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalJabatan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Golongan</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalGolongan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Semua Pegawai</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalPegawai }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User / Pengguna</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalUser }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <img src="{{ asset('storage/default-gambar-instansi.png') }}" class="img-fluid rounded">
            </div>
            <div class="col-md-8 mb-3 table-responsive">
                <table class="table table-sm table-striped">
                    <tr>
                        <td colspan="3">
                            <h4>{{ $instansi->nama }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Pimpinan</td>
                        <td width="5px">:</td>
                        <td>{{ $instansi->pimpinan }}</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td width="5px">:</td>
                        <td>{{ $instansi->telepon }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td width="5px">:</td>
                        <td>{{ $instansi->email }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td width="5px">:</td>
                        <td>{{ $instansi->alamat }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 mb-3">
                {!! $instansi->profile !!}
            </div>

            <div class="col-12 mb-3">
                {!! $instansi->visi_misi !!}
            </div>
        </div>
    </div>
</section>
@endsection