<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/circular/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/concept.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    @stack('css')
    <title>{{ $judul }}</title>
</head>

<body>
    <div class="dashboard-main-wrapper">

        @include('layouts.main.partials.navbar')
        @include('layouts.main.partials.sidebar')

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                @yield('konten')
            </div>
            <div class="footer">
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2018 Concept.</a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Shoutout Febrian Yudhistira
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/concept.js') }}"></script>
    @stack('js')
</body>

</html>