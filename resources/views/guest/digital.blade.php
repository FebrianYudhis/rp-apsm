@extends('layouts.guest')

@push('js')
    <script>
        document.getElementById('pencarian').addEventListener('input', function() {
            $.ajax({
                url: '{{ route('guest.digital') }}',
                method: 'GET',
                data: {
                    'pencarian': this.value
                },
                success: function(response) {
                    if (!response) {
                        location.reload();
                    } else {
                        $('#ListSuratDigital').empty();
                        $('#paginationListSuratDigital').empty();

                        if (response.length == 0) {
                            $('#ListSuratDigital').append(
                                '<div class="col-md-12"><div class="alert alert-danger" role="alert">Data tidak ditemukan</div></div>'
                            );
                        } else {
                            response.forEach(function(data) {
                                var cardHtml = '<div class="col-md-6">' +
                                    '<div class="card">' +
                                    '<div class="card-header d-flex">' +
                                    '<h4 class="card-header-title">Surat Digital</h4>' +
                                    '<div class="toolbar ml-auto">' +
                                    '<a href="' + '{{ asset('storage') . '/' }}' + data.url +
                                    '" class="btn btn-primary btn-sm" target="_blank">Lihat</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="card-body">' +
                                    '<ul class="list-group">' +
                                    '<li class="list-group-item">' + data.perihal +
                                    '</li>' +
                                    '</ul>' +
                                    '</div>' +
                                    '<div class="card-footer d-flex text-muted">' +
                                    'Lokasi Berkas : ' + data.lokasi_berkas +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                                $('#ListSuratDigital').append(cardHtml);
                            });
                        }
                    }
                },
            });
        });
    </script>
@endpush

@section('konten')
    <div class="container">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">List Surat Digital</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guest') }}" class="breadcrumb-link">Guest</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Digital</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="mb-4">
            <label for="pencarian" class="form-label">Pencarian (Perihal):</label>
            <input type="text" class="form-control" id="pencarian" placeholder="Ketikkan...">
        </div>
        <div class="row" id="ListSuratDigital">
            @foreach ($suratDigital as $data)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h4 class="card-header-title">Surat Digital</h4>
                            <div class="toolbar ml-auto">
                                <a href="{{ asset('storage') . '/' . $data->url }}" class="btn btn-primary btn-sm"
                                    target="_blank">Lihat</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">{{ $data->perihal }}</li>
                            </ul>
                        </div>
                        <div class="card-footer d-flex text-muted">
                            Lokasi Berkas : {{ $data->lokasi_berkas }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="paginationListSuratDigital">
            {{ $suratDigital->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
