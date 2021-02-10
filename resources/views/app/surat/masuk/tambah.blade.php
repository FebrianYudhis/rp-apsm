@extends('layouts.main')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3>Tambah Data</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('masuk.tambah') }}" method="POST">
            <div class="form-group">
                <label for="nomorAgenda">Nomor Agenda</label>
                <input type="number" class="form-control" id="nomorAgenda" placeholder="Masukkan Nomor Agenda"
                    name="nomorAgenda" value="{{ old('nomorAgenda') }}">
                @error('nomorAgenda')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggalDiterima">Tanggal Diterima</label>
                <input type="date" class="form-control" id="tanggalDiterima" name="tanggalDiterima"
                    value="{{ old('tanggalDiterima') }}">
                @error('tanggalDiterima')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nomorSurat">Nomor Surat</label>
                <input type="text" class="form-control" id="nomorSurat" placeholder="Masukkan Nomor Surat"
                    name="nomorSurat" value="{{ old('nomorSurat') }}">
                @error('nomorSurat')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" placeholder="Masukkan Pengirim" name="pengirim"
                    value="{{ old('pengirim') }}">
                @error('pengirim')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggalSurat">Tanggal Surat</label>
                <input type="date" class="form-control" id="tanggalSurat" name="tanggalSurat"
                    value="{{ old('tanggalSurat') }}">
                @error('tanggalSurat')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" placeholder="Masukkan Perihal" name="perihal"
                    value="{{ old('perihal') }}">
                @error('perihal')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lokasiBerkas">Lokasi Berkas</label>
                <input type="text" class="form-control" id="lokasiBerkas" placeholder="Masukkan Lokasi Berkas"
                    name="lokasiBerkas" value="{{ old('lokasiBerkas') }}">
                @error('lokasiBerkas')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection