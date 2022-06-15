@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Surat Masuk</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/petugas/surat-masuk/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New
                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/petugas/surat-masuk', []) }}" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control" name="keyword" placeholder="Search"
                                value="{{ $request['keyword'] ?? '' }}">
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
                                <th scope="col">Asal Surat</th>
                                <th scope="col">Tgl Surat</th>
                                <th scope="col">Tgl Masuk</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratMasuks as $suratMasuk)
                            <tr>
                                <th scope="row">
                                    {{ ($suratMasuks->currentPage() - 1) * $suratMasuks->perPage() + $loop->iteration }}
                                </th>
                                <td>
                                    {{ $suratMasuk->no_surat }}
                                    <span class="ml-1 {{ ($suratMasuk->dibaca == 'yes') ? 'text-success' : '' }}">
                                        <i class="fas fa-check-double"></i>
                                    </span>
                                </td>
                                <td>{{ $suratMasuk->klasifikasi->kode }}</td>
                                <td>{{ $suratMasuk->perihal }}</td>
                                <td>{{ $suratMasuk->asal_surat }}</td>
                                <td>{{ $suratMasuk->tgl_surat }}</td>
                                <td>{{ $suratMasuk->tgl_masuk }}</td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-sm btn-light dropdown-toggle w-100" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ url('/petugas/surat-masuk/'.$suratMasuk->id.'/edit', []) }}">
                                                <i class="fas fa-edit"></i> <span class="ml-2">Edit</span>
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ url('/petugas/surat-masuk/download/'.$suratMasuk->id, []) }}">
                                                <i class="fas fa-file-download"></i> <span class="ml-2">Download</span>

                                            </a>
                                            @if ($suratMasuk->dibaca == 'yes')
                                            <a class="dropdown-item"
                                                href="{{ url('/petugas/surat-masuk/'.$suratMasuk->id, []) }}">
                                                <i class="fas fa-file-alt"></i> <span class="ml-2">Daftar
                                                    Disposisi</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>

                                </td>
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
                        {{ $suratMasuks->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection