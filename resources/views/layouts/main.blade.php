<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    @include('sweetalert::alert')
    <div class="dashboard-main-wrapper">

        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{ url('/app') }}">APSM Tahun {{ auth()->user()->tahun }}</a>
            </nav>
        </div>

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">{{ $judul }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/app') }}" class="nav-link"><i
                                        class="fa fa-fw fa-home"></i>Beranda</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1" aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-envelope"></i>Surat</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('surat.masuk') }}">Surat Masuk</a>
                                            <a class="nav-link" href="{{ route('surat.keluar') }}">Surat Keluar</a>
                                            <a class="nav-link" href="{{ route('surat.digital') }}">Surat Digital</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Akun
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"><i
                                        class="fa fa-fw fa-power-off"></i>Keluar</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                @yield('konten')
            </div>
            <div class="footer">
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <a href="https://github.com/puikinsh/concept">Copyright © 2018 Concept.</a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <a href="https://github.com/febrianyudhis">Shoutout Febrian Yudhistira</a>
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
