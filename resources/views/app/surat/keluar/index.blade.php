@extends('layouts.main')

@push('css')
<link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endpush

@push('js')
<script>
    $(document).ready(function () {
       $('#datatabel').DataTable({
            paging: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('surat.keluar') }}',
            columns: [
                { data: 'tanggal_surat', name: 'tanggal_surat'},
                { data: 'nomor_surat', name: 'nomor_surat'},
                { data: 'tujuan', name: 'tujuan'},
                { data: 'perihal', name: 'perihal'},
                { data: 'lokasi_berkas', name: 'lokasi_berkas', orderable: false, searchable: false},
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false},
            ],
            order: [[ 0, 'desc' ]]
        });
     });
</script>

<script>
    $('#datatabel').on("click",".konfirmasi-hapus",function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal({
          title: `Hapus`,
          text: "Apakah Anda Yakin Ingin Menghapus ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
</script>
@endpush

@section('konten')
<div class="row">
    <div class="col-sm-12"><a href="{{ route('keluar.tambah') }}" class="btn btn-primary w-100">Tambah Data</a></div>
</div>
<div class="mt-4">
    <table id="datatabel" class="table table-responsive-md table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>Lokasi Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection