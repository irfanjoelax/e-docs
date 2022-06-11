@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Jabatan</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/admin/jabatan/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New
                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/admin/jabatan', []) }}" method="GET">
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
                                <th scope="col">Jabatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jabatans as $jabatan)
                            <tr>
                                <th scope="row">
                                    {{ ($jabatans->currentPage() - 1) * $jabatans->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $jabatan->jabatan }}</td>
                                <td>
                                    <a href="{{ url('/admin/jabatan/'.$jabatan->id.'/edit', []) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('/admin/jabatan/'.$jabatan->id, []) }}" onclick="event.preventDefault();document.getElementById('delete-{{ $jabatan->id }}').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-{{ $jabatan->id }}" action="{{ url('/admin/jabatan/'.$jabatan->id, []) }}" method="POST" class="d-none">
                                        @csrf @method("DELETE")
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    Jabatan has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $jabatans->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
