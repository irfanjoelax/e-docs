@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Golongan</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/admin/golongan/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New
                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/admin/golongan', []) }}" method="GET">
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
                                <th scope="col">Golongan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($golongans as $golongan)
                            <tr>
                                <th scope="row">
                                    {{ ($golongans->currentPage() - 1) * $golongans->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $golongan->golongan }}</td>
                                <td>
                                    <a href="{{ url('/admin/golongan/'.$golongan->id.'/edit', []) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('/admin/golongan/'.$golongan->id, []) }}" onclick="event.preventDefault();document.getElementById('delete-{{ $golongan->id }}').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-{{ $golongan->id }}" action="{{ url('/admin/golongan/'.$golongan->id, []) }}" method="POST" class="d-none">
                                        @csrf @method("DELETE")
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    Golongan has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $golongans->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
