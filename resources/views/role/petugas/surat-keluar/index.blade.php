@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Surat Keluar</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/petugas/surat-keluar/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New
                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/petugas/surat-keluar', []) }}" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control" name="keyword" placeholder="Search" value="{{ $request['keyword'] ?? '' }}">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Surat</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Tgl Surat</th>
                                <th scope="col">Tgl Keluar</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratKeluars as $suratKeluar)
                            <tr>
                                <th scope="row">
                                    {{ ($suratKeluars->currentPage() - 1) * $suratKeluars->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $suratKeluar->no_surat }}</td>
                                <td>{{ $suratKeluar->klasifikasi->kode }}</td>
                                <td>{{ $suratKeluar->perihal }}</td>
                                <td>{{ $suratKeluar->tujuan }}</td>
                                <td>{{ $suratKeluar->tgl_surat }}</td>
                                <td>{{ $suratKeluar->tgl_keluar }}</td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-sm btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item Edit" href="{{ url('/petugas/surat-keluar/'.$suratKeluar->id.'/edit', []) }}">
                                                <i class="fas fa-edit"></i> <span class="ml-2">Edit</span>
                                            </a>
                                            <a class="dropdown-item Edit" href="{{ url('/petugas/surat-keluar/download/'.$suratKeluar->id, []) }}">
                                                <i class="fas fa-file-download"></i> <span class="ml-2">Download</span>

                                            </a>
                                            <a class="dropdown-item Edit" href="{{ url('/petugas/surat-keluar/qr-code/'.$suratKeluar->id, []) }}">

                                                <i class="fas fa-qrcode"></i> <span class="ml-2">Generate QR</span>
                                            </a>
                                        </div>
                                    </div>

                                </td>
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

                    <div class="pl-4">
                        {{ $suratKeluars->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
