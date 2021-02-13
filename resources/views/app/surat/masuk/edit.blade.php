@extends('layouts.main')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3>Edit Data</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('masuk.edit',[$data['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomorAgenda">Nomor Agenda</label>
                <input type="number" class="form-control" id="nomorAgenda" placeholder="Masukkan Nomor Agenda"
                    name="nomorAgenda" value="{{ old('nomorAgenda') ?? $data['nomor_agenda'] }}" REQUIRED>
                @error('nomorAgenda')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                <small class="text-danger">Harap Berhati-hati Jika Mengubah Nomor Agenda</small>
            </div>
            <div class="form-group">
                <label for="tanggalDiterima">Tanggal Diterima</label>
                <input type="date" class="form-control" id="tanggalDiterima" name="tanggalDiterima"
                    value="{{ old('tanggalDiterima') ?? $data['tanggal_diterima'] }}" REQUIRED>
                @error('tanggalDiterima')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nomorSurat">Nomor Surat</label>
                <input type="text" class="form-control" id="nomorSurat" placeholder="Masukkan Nomor Surat"
                    name="nomorSurat" value="{{ old('nomorSurat') ?? $data['nomor_surat'] }}" REQUIRED>
                @error('nomorSurat')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" placeholder="Masukkan Pengirim" name="pengirim"
                    value="{{ old('pengirim') ?? $data['pengirim'] }}" REQUIRED>
                @error('pengirim')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggalSurat">Tanggal Surat</label>
                <input type="date" class="form-control" id="tanggalSurat" name="tanggalSurat"
                    value="{{ old('tanggalSurat') ?? $data['tanggal_surat'] }}" REQUIRED>
                @error('tanggalSurat')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" placeholder="Masukkan Perihal" name="perihal"
                    value="{{ old('perihal') ?? $data['perihal'] }}" REQUIRED>
                @error('perihal')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lokasiBerkas">Lokasi Berkas</label>
                <input type="text" class="form-control" id="lokasiBerkas" placeholder="Masukkan Lokasi Berkas"
                    name="lokasiBerkas" value="{{ old('lokasiBerkas') ?? $data['lokasi_berkas'] }}" REQUIRED>
                @error('lokasiBerkas')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="berkas">Berkas (PDF)</label>
                <input type="file" class="form-control-file" id="berkas" accept="application/pdf" name="berkas">
                @error('berkas')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                <small class="text-danger">Biarkan Kosong Jika Berkas Tidak Diganti</small>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection