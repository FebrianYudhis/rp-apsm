@extends('layouts.main')

@section('konten')
<div class="card">
    <div class="card-header">
        <h3>Tambah Data</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('digital.tambah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" placeholder="Masukkan Perihal" name="perihal"
                    value="{{ old('perihal') }}" REQUIRED>
                @error('perihal')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lokasiBerkas">Lokasi Berkas</label>
                <input type="text" class="form-control" id="lokasiBerkas" placeholder="Masukkan Lokasi Berkas"
                    name="lokasiBerkas" value="{{ old('lokasiBerkas') }}" REQUIRED>
                @error('lokasiBerkas')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="berkas">Berkas (PDF)</label>
                <input type="file" class="form-control-file" id="berkas" accept="application/pdf" name="berkas"
                    REQUIRED>
                @error('berkas')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection