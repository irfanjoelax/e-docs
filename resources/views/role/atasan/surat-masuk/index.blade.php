@extends('layouts.dashboard')

@section('css')
<style>
    .article-image svg {
        width: 100%;
        height: auto;
    }
</style>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Surat Masuk</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-5">
                <form class="input-group mb-3">
                    <input type="search" class="form-control" name="keyword" value="{{ $request['keyword'] ?? '' }}"
                        placeholder="Type perihal surat here..">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-icon icon-left" type="submit"><i class="fas fa-search"></i>
                            Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse ($suratMasuks as $suratMasuk)
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <article class="article article-style-c shadow">
                    <div class="article-header">
                        <div class="article-image">
                            {!!
                            QrCode::format('svg')->margin(3)->generate(url('/atasan/surat-masuk/download/'.$suratMasuk->id))
                            !!}
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-category"><small>Kode: {{ $suratMasuk->klasifikasi->kode }}</small>
                            <div class="bullet"></div> <small>{{ $suratMasuk->tgl_masuk }}</small>
                        </div>
                        <div class="article-title">
                            <h2><a href="{{ url('atasan/surat-masuk/'. $suratMasuk->id, []) }}">{{
                                    $suratMasuk->perihal }}</a></h2>
                        </div>
                        <div class="article-user">
                            <img alt="image" src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">
                                        <small>{{ $suratMasuk->user->name }}</small>
                                    </a>
                                </div>
                                <div class="text-job">
                                    <small>Petugas</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-12 mb-4">
                <div class="hero bg-danger text-white">
                    <div class="hero-inner">
                        <h2>Ooops!</h2>
                        <p class="lead">Surat Masuk has been empty now</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        {{ $suratMasuks->appends($request)->links() }}
    </div>
</section>
@endsection