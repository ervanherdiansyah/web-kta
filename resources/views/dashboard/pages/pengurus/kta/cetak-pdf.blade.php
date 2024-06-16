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
            margin-top: 33px;
            margin-left: 17px;
        }

        .img-web {
            height: 164px;
            width: 120px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            object-fit: cover;
            margin-right: 20px;
        }

        /* style Name */

        .first_name {
            margin-left: 20px;
            margin-top: 18px
        }

        .last_name {
            margin-left: 20px;
            margin-top: -25px
        }

        .name-font {
            color: #efc471;
            font-size: 40px;
            font-weight: 700;
        }

        .gender {
            margin-left: 50px;
            margin-top: 28px
        }

        .school {
            margin-left: 50px;
            margin-top: 5px
        }

        .origin-school {
            margin-left: 50px;
            margin-top: 7px
        }

        .font-color {
            color: #efc471 !important;
            font-weight: 700;

        }

        @media screen and (max-width: 320px) {
            /* style Foto */

            .margin-foto {
                margin-top: 6px;
                margin-left: -3px;
            }

            .img-web {
                height: 70px;
                width: 53px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: -2px;
                margin-top: 10px
            }

            .last_name {
                margin-left: -2px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 17px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 13px;
                margin-top: 8px
            }

            /* style school */
            .school {
                margin-left: 13px;
                margin-top: -4px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 13px;
                margin-top: -5px;
            }

            .font-color {
                color: #efc471;
                font-size: 7px;
                font-weight: 700;
            }
        }

        @media screen and (min-width: 321px) and (max-width: 360px) {
            /* style Foto */

            .margin-foto {
                margin-top: 8px;
                margin-left: -1px;
            }

            .img-web {
                height: 81px;
                width: 61px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 2px;
                margin-top: 10px
            }

            .last_name {
                margin-left: 2px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 17px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 16px;
                margin-top: 18px
            }

            /* style school */
            .school {
                margin-left: 16px;
                margin-top: -6px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 16px;
                margin-top: -4px;
            }

            .font-color {
                color: #efc471;
                font-size: 8px;
                font-weight: 700;
            }
        }

        @media screen and (min-width: 361px) and (max-width: 375px) {
            /* style Foto */

            .margin-foto {
                margin-top: 9px;
                margin-left: -1px;
            }

            .img-web {
                height: 85px;
                width: 64px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 2px;
                margin-top: 12px
            }

            .last_name {
                margin-left: 2px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 18px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 18px;
                margin-top: 17px
            }

            /* style school */
            .school {
                margin-left: 18px;
                margin-top: -5px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 18px;
                margin-top: -3px;
            }

            .font-color {
                color: #efc471;
                font-size: 8px;
                font-weight: 700;
            }
        }

        @media screen and (min-width: 376px) and (max-width: 390px) {
            /* style Foto */

            .margin-foto {
                margin-top: 10px;
                margin-left: 1px;
            }

            .img-web {
                height: 90px;
                width: 66px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 3px;
                margin-top: 14px
            }

            .last_name {
                margin-left: 3px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 18px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 20px;
                margin-top: 18px
            }

            /* style school */
            .school {
                margin-left: 20px;
                margin-top: -5px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 20px;
                margin-top: -2px;
            }

            .font-color {
                color: #efc471;
                font-size: 8px;
                font-weight: 700;
            }
        }

        @media screen and (min-width: 391px) and (max-width: 414px) {
            /* style Foto */

            .margin-foto {
                margin-top: 10px;
                margin-left: 2px;
            }

            .img-web {
                height: 98px;
                width: 70px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 4px;
                margin-top: 16px
            }

            .last_name {
                margin-left: 4px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 18px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 22px;
                margin-top: 21px
            }

            /* style school */
            .school {
                margin-left: 22px;
                margin-top: -3px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 22px;
                margin-top: -2px;
            }

            .font-color {
                color: #efc471;
                font-size: 9px;
                font-weight: 700;
            }
        }

        @media screen and (min-width: 415px) and (max-width: 425px) {
            /* style Foto */

            .margin-foto {
                margin-top: 13px;
                margin-left: 2px;
            }

            .img-web {
                height: 98px;
                width: 73px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 6px;
                margin-top: 18px
            }

            .last_name {
                margin-left: 6px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 18px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 22px;
                margin-top: 23px
            }

            /* style school */
            .school {
                margin-left: 22px;
                margin-top: -3px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 22px;
                margin-top: -2px;
            }

            .font-color {
                color: #efc471;
                font-size: 9px;
                font-weight: 700;
            }
        }

        @media screen and (min-width: 426px) and (max-width: 430px) {
            /* style Foto */

            .margin-foto {
                margin-top: 14px;
                margin-left: 3px;
            }

            .img-web {
                height: 99px;
                width: 73px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            /* style Name */

            .first_name {
                margin-left: 8px;
                margin-top: 20px
            }

            .last_name {
                margin-left: 8px;
                margin-top: -16px;
            }

            .name-font {
                color: #efc471;
                font-size: 18px;
                font-weight: 700;
            }

            /* style gender */

            .gender {
                margin-left: 22px;
                margin-top: 22px
            }

            /* style school */
            .school {
                margin-left: 22px;
                margin-top: -3px
            }

            /* style origin-school */
            .origin-school {
                margin-left: 22px;
                margin-top: -2px;
            }

            .font-color {
                color: #efc471;
                font-size: 9px;
                font-weight: 700;
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
                color: #efc471 !important;
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
                    <img src="{{ asset('assets/img/kta4.png') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="margin-foto">
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="img-web" alt="member_photo">
                        </div>
                        <div class="first_name mb-2">
                            <h5 class="name-font">
                                {{ $pembayaran->user->nama_depan }}</h5>
                        </div>
                        <div class="last_name mb-2">
                            <h5 class="name-font">
                                {{ $pembayaran->user->nama_belakang }}</h5>
                        </div>
                        <div class="gender mb-2">
                            <p class="mb-0 font-color">
                                {{ $pembayaran->user->form->jenis_kelamin }}
                            </p>
                        </div>
                        <div class="school mb-2">
                            <p class="mb-0 font-color">{{ $pembayaran->user->form->asal_sekolah }}</p>
                        </div>
                        <div class="origin-school">
                            <p class="mb-0 font-color">{{ $pembayaran->user->form->alamat_asal_sekolah }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/img/kta3.png') }}" class="card-img" alt="...">
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </main>

</body>

</html>
