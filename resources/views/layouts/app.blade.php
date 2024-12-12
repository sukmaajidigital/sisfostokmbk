<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Pendataan Barang</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/mbk.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.sidebar')
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@yield('title')</h4>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
<footer>
    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://sukmaajidigital.github.io/" target="_blank" class="pe-1 text-warning text-decoration-underline">sukmaajidigital</a> Distributed by <a href="https://muriabatikkudus.com" target="_blank">muria batik kudus</a></p>
    </div>
</footer>

</html>
