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
    <div class="col-sm-12"><a href="#" class="btn btn-primary w-100">Tambah Data</a></div>
</div>
<div class="mt-4">
    <table id="datatabel" class="table table-responsive-md table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>Lokasi Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d['id'] }}</td>
                <td>{{ $d['tanggal_surat'] }}</td>
                <td>{{ $d['nomor_surat'] }}</td>
                <td>{{ $d['tujuan'] }}</td>
                <td>{{ $d['perihal'] }}</td>
                <td>{{ $d['lokasi_berkas'] }}</td>
                <td>{{ "test" }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection