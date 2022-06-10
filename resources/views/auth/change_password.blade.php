@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Change Password</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <x-alert></x-alert>
                <form action="{{ url('/change-password', []) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" placeholder="*****" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 offset-2">
                            <button type="submit" class="btn btn-primary">
                                Change Password
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
