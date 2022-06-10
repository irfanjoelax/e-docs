@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User Profile</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <x-alert></x-alert>
                <form action="{{ url('/profile', []) }}" method="POST" class="">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 offset-2">
                            <button type="submit" class="btn btn-primary">
                                Update Profile
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
