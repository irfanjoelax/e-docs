@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Klasifikasi Surat</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/petugas/klasifikasi/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New

                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/petugas/klasifikasi', []) }}" method="GET">
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
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Uraian</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($klasifikasis as $klasifikasi)
                            <tr>
                                <th scope="row">
                                    {{ ($klasifikasis->currentPage() - 1) * $klasifikasis->perPage() + $loop->iteration
                                    }}
                                </th>
                                <td>{{ $klasifikasi->nama }}</td>
                                <td>{{ $klasifikasi->kode }}</td>
                                <td>{{ $klasifikasi->uraian }}</td>
                                <td>
                                    <a href="{{ url('/petugas/klasifikasi/'.$klasifikasi->id.'/edit', []) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/petugas/klasifikasi/'.$klasifikasi->id, []) }}"
                                        onclick="event.preventDefault();document.getElementById('delete-{{ $klasifikasi->id }}').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-{{ $klasifikasi->id }}"
                                        action="{{ url('/petugas/klasifikasi/'.$klasifikasi->id, []) }}" method="POST"
                                        class="d-none">
                                        @csrf @method("DELETE")
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    Klasifikasi surat has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $klasifikasis->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection