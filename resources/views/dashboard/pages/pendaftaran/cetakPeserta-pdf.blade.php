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
    <style>
        .margin-foto {
            margin-top: 31px;
            margin-left: 16px;
        }

        .img-web {
            height: 164px;
            width: 120px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            object-fit: cover;
            margin-right: 20px;
        }

        .first_name {
            margin-left: 20px;
            margin-top: 195px
        }

        .last_name {
            margin-left: 20px;
            margin-top: -25px;
        }

        .name-font {
            color: #557571;
            font-size: 40px;
            font-weight: 700;
        }

        /* style gender */

        .gender {
            margin-left: 50px;
            margin-top: 36px
        }

        /* style school */
        .school {
            margin-left: 50px;
            margin-top: 5px
        }

        /* style origin-school */
        .origin-school {
            margin-left: 50px;
            margin-top: 7px
        }

        .text {
            color: #557571 !important;
        }

        @media screen and (max-width: 375px) {
            /* style Foto */

            .margin-foto {
                margin-top: 37px;
                margin-left: 17px;
            }

            .img-phone {
                height: 181px;
                width: 137px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 3px;
                margin-top: 95px
            }

            .last_name {
                margin-left: 3px;
                margin-top: -15px;
            }

            .name-font {
                color: #557571;
                font-size: 20px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 20px;
                margin-top: 14px
            }

            /* style school */
            .school {
                margin-left: 20px;
                margin-top: -8px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 20px;
                margin-top: -8px
            }

            .text {
                color: #557571;
                /* font-size: */
                font-weight: 700;
                font-size: 10px
            }
        }

        @media screen and (min-width: 376px) and (max-width: 425px) {
            /* style Foto */

            .margin-foto {
                margin-top: 37px;
                margin-left: 17px;
            }

            .img-phone {
                height: 181px;
                width: 137px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 6px;
                margin-top: 115px
            }

            .last_name {
                margin-left: 6px;
                margin-top: -15px;
            }

            .name-font {
                color: #557571;
                font-size: 20px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 25px;
                margin-top: 21px
            }

            /* style school */
            .school {
                margin-left: 25px;
                margin-top: -4px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 25px;
                margin-top: -6px
            }

            .text {
                color: #557571;
                /* font-size: */
                font-weight: 700;
                font-size: 10px
            }
        }

        @media screen and (min-width: 426px) and (max-width: 430px) {
            /* style Foto */

            .margin-foto {
                margin-top: 37px;
                margin-left: 17px;
            }

            .img-phone {
                height: 181px;
                width: 137px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 6px;
                margin-top: 118px
            }

            .last_name {
                margin-left: 6px;
                margin-top: -15px;
            }

            .name-font {
                color: #557571;
                font-size: 20px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 25px;
                margin-top: 21px
            }

            /* style school */
            .school {
                margin-left: 25px;
                margin-top: -4px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 25px;
                margin-top: -6px
            }

            .text {
                color: #557571;
                /* font-size: */
                font-weight: 700;
                font-size: 10px
            }
        }

        @media (max-width: 768px) {
            .margin-foto {
                margin-top: 37px;
                margin-left: 17px;
            }

            .img-phone {
                height: 181px;
                width: 137px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            .first_name {
                margin-left: 20px;
                margin-top: 200px
            }

            .last_name {
                margin-left: 20px;
                margin-top: -25px;
            }

            .name-font {
                color: #557571;
                font-size: 40px;
                font-weight: 700;

            }

            .gender {
                margin-left: 50px;
                margin-top: 31px
            }

            .school {
                margin-left: 50px;
                margin-top: 5px
            }

            .origin-school {
                margin-left: 50px;
                margin-top: 7px
            }

            .text {
                color: #557571 !important;
            }
        }

        .card {
            max-width: 320px;
            /* Atur lebar maksimum kartu */
            margin: auto;
            /* Tengahkan kartu */
            box-shadow: none;
            /* Menghilangkan shadow */
        }

        .card-img {
            max-width: 100%;
            /* Gunakan lebar gambar maksimum */
            height: auto;
            /* Biarkan tinggi gambar disesuaikan secara proporsional */
        }



        @media print {
            body {
                color: white !important;
                background-color: aqua
                    /* Set warna teks menjadi putih */
            }

            .card {
                box-shadow: none;
                /* Menghilangkan shadow saat cetak */
            }

            .text {
                color: #557571 !important;
            }

        }
    </style>
    <script type="text/javascript">
        window.print();
    </script>
</head>

<body class="g-sidenav-show bg-gray-100">
    <main class="main-content position-relative border-radius-lg ">
        {{-- @foreach ($dataForm as $dataForm) --}}
        <div class="container-fluid mt-3">
            <div class="d-flex justify-content-between">
                <div class="card">
                    <img src="{{ asset('assets/img/FRONT2.png') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="first_name mb-2">
                            <h5 class="name-font text">
                                {{ $pembayaran->user->nama_depan }}</h5>
                        </div>
                        <div class="last_name mb-2">
                            <h5 class="name-font text">
                                {{ $pembayaran->user->nama_belakang }}</h5>
                        </div>
                        <div class="gender mb-2">
                            <p class="mb-0 font-weight-bold text">
                                {{ $pembayaran->user->form->jenis_kelamin }}
                            </p>
                        </div>
                        <div class="school mb-2">
                            <p class="mb-0 font-weight-bold text">{{ $pembayaran->user->form->asal_sekolah }}</p>
                        </div>
                        <div class="origin-school">
                            <p class="mb-0 font-weight-bold text">{{ $pembayaran->user->form->alamat_asal_sekolah }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/img/BACK2.png') }}" class="card-img" alt="...">
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </main>

</body>

</html>
