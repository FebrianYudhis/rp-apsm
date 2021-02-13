@extends('layouts.main')

@push('css')
<link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('js/datatables.min.js') }}"></script>
@endpush

@push('js')
<script>
    $(document).ready( function () {
        $('#datatabel').DataTable();
    } );
</script>
@endpush

@section('konten')
<div class="row">
    <div class="col-sm-12"><a href="{{ route('masuk.tambah') }}" class="btn btn-primary w-100">Tambah Data</a></div>
</div>
<div class="mt-4">
    <table id="datatabel" class="table table-responsive-md table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nomor Agenda</th>
                <th>Tanggal Diterima</th>
                <th>Nomor Surat</th>
                <th>Pengirim</th>
                <th>Tanggal Surat</th>
                <th>Perihal</th>
                <th>Lokasi Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d['id'] }}</td>
                <td>{{ $d['nomor_agenda'] }}</td>
                <td>{{ $d['tanggal_diterima'] }}</td>
                <td>{{ $d['nomor_surat'] }}</td>
                <td>{{ $d['pengirim'] }}</td>
                <td>{{ $d['tanggal_surat'] }}</td>
                <td>{{ $d['perihal'] }}</td>
                <td>{{ $d['lokasi_berkas'] }}</td>
                <td>
                    <div class="row">
                        <a href="{{ asset('storage').'/'.$d['url'] }}" target="_blank"
                            class="btn btn-success col-md-12">Lihat
                            Berkas</a>
                        <a href="#" class="btn btn-primary col-md-12 mt-1">Edit</a>
                        <a href="#" class="btn btn-danger col-md-12 mt-1">Hapus</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection