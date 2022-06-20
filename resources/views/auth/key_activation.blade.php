<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tab Bar -->
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" />
    <title>{{ str_replace('-', ' ', env('APP_NAME')) }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/style.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/components.css">

</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>Activation</h1>
                        <div class="page-description">
                            You do not have access to this page.
                        </div>
                        <div class="page-search">
                            <form action="{{ url('/key-activation', []) }}" method="POST">
                                @csrf
                                <div class="form-group floating-addon floating-addon-not-append">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="key" class="form-control" placeholder="Key Activation">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <a href="https://wa.me/+6283140617623">Contact Developer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer mt-5">
                    Developed by Muhammad Irfan Permana {{ date('Y') }}
                </div>
            </div>
        </section>
    </div>

</html>