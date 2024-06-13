<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <title>
        @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('argon') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('argon') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientServer') }}"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
    @if (Request::is('pengurus/profile*'))
        <div class="position-absolute w-100 min-height-300 top-0"
            style="background-image: url('{{ config('app.url') }}/argon/assets/img/bgp.jpg'); background-position-y: 50%;">
            <span class="mask opacity-6" style="background-color: #2C5499;"></span>
        </div>
    @else
        <div class="min-height-300 position-absolute w-100" style="background-color: #2C5499;"></div>
    @endif
    @include('dashboard.component.pengurus.sidebar.sidebar')
    @if (Request::is('pengurus/profile*'))
        <div class="main-content position-relative max-height-vh-100 h-100">
            {{-- @include('dashboard.component.pengurus.navbar.navbar') --}}

            @yield('content')
            @include('sweetalert::alert')

        </div>
    @else
        <main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
            @include('dashboard.component.pengurus.navbar.navbar')
            <!-- End Navbar -->
            <!-- Content -->
            @yield('content')
            <!-- End Content -->
            @include('sweetalert::alert')
        </main>
    @endif

    @stack('midtrans')
    @include('dashboard.component.pengurus.plugins.plugin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('js-payment')
    <!--   Core JS Files   -->
    <script src="{{ asset('argon') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('argon') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>

</body>

</html>
