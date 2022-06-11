@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User / Pengguna</h1>
    </div>

    <div class="section-body">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ url('/admin/user/create', []) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New
                    </a>
                </h4>
                <div class="card-header-action">
                    <form action="{{ url('/admin/user', []) }}" method="GET">
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
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <th scope="row">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role == 'atasan')
                                    <div class="badge badge-info text-capitalize">{{ $user->role }}</div>
                                    @endif

                                    @if ($user->role == 'admin')
                                    <div class="badge badge-danger text-capitalize">{{ $user->role }}</div>
                                    @endif

                                    @if ($user->role == 'petugas')
                                    <div class="badge badge-warning text-capitalize">{{ $user->role }}</div>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{{ url('/admin/user/'.$user->id, []) }}" onclick="event.preventDefault();document.getElementById('delete-{{ $user->id }}').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-{{ $user->id }}" action="{{ url('/admin/user/'.$user->id, []) }}" method="POST" class="d-none">
                                        @csrf @method("DELETE")
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    user has empty or not found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pl-4">
                        {{ $users->appends($request)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
