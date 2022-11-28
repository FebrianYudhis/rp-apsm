@extends('layouts.auth')

@section('content')
<div class="splash-container">
    <div class="card">
        <div class="card-header text-center">
            <a href="{{ url('/') }}"><img class="logo-img" src="{{ asset('gambar/icon/Logo.png') }}" alt="logo"
                    style="width: 100%"></a>
            <span class="splash-description">Masukkan
                Informasi
                Akun Anda</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                        type="email" placeholder="Email" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
                        type="password" placeholder="Password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember"><span
                            class="custom-control-label">Ingat Saya</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0">
            <a href="{{ url('/register') }}" class="btn btn-success w-100">Buat Akun</a>
        </div>
    </div>
</div>
@endsection