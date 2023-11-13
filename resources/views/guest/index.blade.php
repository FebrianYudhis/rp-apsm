@extends('layouts.guest')

@section('konten')
    <div class="card text-center">
        <div class="card-header">
            <h2>Jumlah Surat</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Surat Masuk</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1 text-primary">{{ $suratMasuk }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Surat Keluar</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1 text-primary">{{ $suratKeluar }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Surat Digital</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1 text-primary">{{ $suratDigital }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
