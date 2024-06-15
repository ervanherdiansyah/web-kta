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

        .text {
            color: #efc471 !important;
        }

        @media (max-width: 768px) {
            .margin-foto {
                margin-top: 34px;
                margin-left: 17px;
            }

            .img-phone {
                height: 181px;
                width: 137px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            .first_name {
                margin-left: 21px;
                margin-top: 23px
            }

            .last_name {
                margin-left: 21px;
                margin-top: -25px
            }

            .name-font {
                color: #efc471;
                font-size: 40px;
                font-weight: 700;
            }

            .gender {
                margin-left: 50px;
                margin-top: 22px;
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
                color: #efc471 !important;
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
        @foreach ($pembayaran as $data)
            <div class="container-fluid mt-3">
                <div class="d-flex justify-content-between">
                    <div class="card">
                        <img src="{{ asset('assets/img/kta4.png') }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="margin-foto">
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="img-web"
                                    alt="member_photo">
                            </div>
                            <div class="first_name mb-2">
                                <h5 class="name-font text">
                                    {{ $data->user->nama_depan }}</h5>
                            </div>
                            <div class="last_name mb-2">
                                <h5 class="name-font text">
                                    {{ $data->user->nama_belakang }}</h5>
                            </div>
                            <div class="gender mb-2">
                                <p class="mb-0 font-weight-bold text">
                                    {{ $data->user->form->jenis_kelamin }}
                                </p>
                            </div>
                            <div class="school mb-2">
                                <p class="mb-0 font-weight-bold text">{{ $data->user->form->asal_sekolah }}</p>
                            </div>
                            <div class="origin-school">
                                <p class="mb-0 font-weight-bold text">
                                    {{ $data->user->form->alamat_asal_sekolah }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('assets/img/kta3.png') }}" class="card-img" alt="...">
                    </div>
                </div>
            </div>
        @endforeach
    </main>

</body>

</html>
