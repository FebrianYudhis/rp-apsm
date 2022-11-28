@extends('layouts.auth')

@section('content')
<form class="splash-container" method="POST" action="{{ route('register') }}">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Form Pendaftaran</h3>
        </div>
        <div class="card-body">
            @csrf

            <div class="form-group">
                <input class="form-control form-control-lg @error('username') is-invalid @enderror" type="text"
                    placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control form-control-lg @error('nama') is-invalid @enderror" type="text"
                    placeholder="Nama" name="nama" value="{{ old('nama') }}">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email"
                    placeholder="E-mail" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password"
                    placeholder="Password" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="password" placeholder="Konfirmasi Password"
                    name="password_confirmation">
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Daftar</button>
            </div>
</form>
</div>
<div class="card-footer bg-white">
    <p>Sudah Memiliki Akun ? <a href="{{ route('login') }}" class="text-secondary">Masuk Disini.</a></p>
</div>
</div>
</form>
@endsection