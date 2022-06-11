@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Semua Pegawai</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/admin/pegawai/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New
                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/admin/pegawai', []) }}" method="GET">
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
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawais as $pegawai)
                            <tr>
                                <th scope="row">
                                    {{ ($pegawais->currentPage() - 1) * $pegawais->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $pegawai->nama }}</td>
                                <td>
                                    @if ($pegawai->status == 'pns')
                                    <div class="badge badge-warning text-uppercase">{{ $pegawai->status }}</div>
                                    @endif

                                    @if ($pegawai->status == 'honor')
                                    <div class="badge badge-success text-capitalize">{{ $pegawai->status }}</div>
                                    @endif
                                </td>
                                <td>{{ $pegawai->golongan->golongan }}</td>
                                <td>{{ $pegawai->jabatan->jabatan }}</td>
                                <td>
                                    <a href="{{ url('/admin/pegawai/'.$pegawai->id.'/edit', []) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('/admin/pegawai/'.$pegawai->id, []) }}" onclick="event.preventDefault();document.getElementById('delete-{{ $pegawai->id }}').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-{{ $pegawai->id }}" action="{{ url('/admin/pegawai/'.$pegawai->id, []) }}" method="POST" class="d-none">
                                        @csrf @method("DELETE")
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    pegawai has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $pegawais->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
