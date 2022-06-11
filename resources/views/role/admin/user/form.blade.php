@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User Profile</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/admin/user', []) }}" method="POST" class="">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="atasan" id="atasan" name="role" class="custom-control-input">
                                <label class="custom-control-label" for="atasan">Atasan</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="admin" id="admin" name="role" class="custom-control-input">
                                <label class="custom-control-label" for="admin">Admin</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="petugas" id="petugas" name="role" class="custom-control-input">
                                <label class="custom-control-label" for="petugas">Petugas</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <span class="text-danger">
                                Password default untuk user pengguna adalah: <strong>123456</strong>

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 offset-2">
                            <button type="submit" class="btn btn-primary">
                                Save now
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
