@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Surat Keluar</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>
                                        <img src="{{ asset('images/logo.svg') }}" width="110">
                                    </h2>
                                    <div class="invoice-number">
                                        Kode: {{ $suratKeluar->klasifikasi->kode }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Perihal:</strong><br>
                                        <span>{{ $suratKeluar->perihal }}</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <strong>Tujuan:</strong><br>
                                        <span>{{ $suratKeluar->tujuan }}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <strong>Tangal Surat:</strong><br>
                                        <span>{{ $suratKeluar->tgl_surat }}</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <strong>Tangal Keluar:</strong><br>
                                        <span>{{ $suratKeluar->tgl_keluar }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Keterangan</div>
                                <p class="section-lead">{{ $suratKeluar->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-icon icon-left">
                                <i class="fas fa-undo"></i>
                                Back to previous
                            </a>
                        </div>
                        <a href="{{ url('/atasan/surat-keluar/download/'.$suratKeluar->id) }}"
                            class="btn btn-primary btn-icon icon-left">
                            <i class="fas fa-file-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection