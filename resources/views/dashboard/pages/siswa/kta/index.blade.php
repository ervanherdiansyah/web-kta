@extends('dashboard.layouts.siswa.layout')
@section('title', 'KTA')
@section('css-profile')
    {{-- <style>
        .profile-img {
            height: 150px;
            /* Sesuaikan tinggi sesuai kebutuhan Anda */
            width: 100px;
            /* Sesuaikan lebar sesuai kebutuhan Anda */
            border-bottom-left-radius: 50px;
            /* Membuat sisi kiri bawah melengkung */
            border-bottom-right-radius: 50px;
            /* Membuat sisi kanan bawah melengkung */
            object-fit: cover;
            /* Memastikan gambar mencakup seluruh area */
            margin-right: 20px;
            /* Memberikan jarak antara gambar dan teks */
        }
    </style> --}}
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0 pt-3" style="background-color: rgba(250, 247, 247, 0.8);">
                        <h6 class="text-capitalize">Kartu Tanda Anggota</h6>
                    </div>
                    <div class="card-body p-3" style="background-color: rgba(255, 255, 255, 0.8);">
                        <div class="row">
                            <div class="col-lg-2 mb-lg-0 mb-4"> </div>
                            <div class="col-lg-4 mb-lg-0 mb-4">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('assets/img/kta1.png') }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <div class="align-items-center">
                                            <div style="margin-top: 31px; margin-left: 17px">
                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" class=""
                                                    alt="member_photo"
                                                    style="height: 164px;
                                            width: 120px;
                                            border-bottom-left-radius: 50px;
                                            border-bottom-right-radius: 50px;
                                            object-fit: cover;
                                            margin-right: 20px;">
                                            </div>
                                            <div>
                                                <h5 class="font-weight-bold">{{ $dataForm->nama_lengkap }}</h5>
                                                <p class="mb-0">Jenis Kelamin: {{ $dataForm->jenis_kelamin }}</p>
                                                <p class="mb-0">Asal Sekolah: {{ $dataForm->asal_sekolah }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-lg-0 mb-4">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('assets/img/kta2.png') }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title">Card title</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 mb-lg-0 mb-4"> </div>

                        </div>

                        {{-- <div class="row mt-4 justify-content-center align-items-center" style="height: 100vh;">
                            <div class="col-lg-6 mb-lg-0 mb-4 d-flex justify-content-center">
                                <div class="card"
                                    style="width: 40rem; height: 100vh; background-image: url('{{ asset('assets/img/kta1.png') }}'); background-size: cover; background-position: center;">
                                    <div class="card-body justify-content-center">
                                        <div class="align-items-center">
                                            <div style="margin-top: 44px">
                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" class=""
                                                    alt="member_photo"
                                                    style="height: 203px;
                                                width: 155px;
                                                border-bottom-left-radius: 50px;
                                                border-bottom-right-radius: 50px;
                                                object-fit: cover;
                                                margin-right: 20px;">
                                            </div>
                                            <div>
                                                <h5 class="font-weight-bold">{{ $dataForm->nama_lengkap }}</h5>
                                                <p class="mb-0">Jenis Kelamin: {{ $dataForm->jenis_kelamin }}</p>
                                                <p class="mb-0">Asal Sekolah: {{ $dataForm->asal_sekolah }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-lg-0 mb-4 d-flex justify-content-center">
                                <div class="card"
                                    style="width: 40rem; height: 100vh; background-image: url('{{ asset('assets/img/kta2.png') }}'); background-size: cover; background-position: center;">
                                    <div class="card-body justify-content-center">
                                        <div class="align-items-center">
                                            <div style="margin-top: 44px">
                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" class=""
                                                    alt="member_photo"
                                                    style="height: 203px;
                                                width: 155px;
                                                border-bottom-left-radius: 50px;
                                                border-bottom-right-radius: 50px;
                                                object-fit: cover;
                                                margin-right: 20px;">
                                            </div>
                                            <div>
                                                <h5 class="font-weight-bold">{{ $dataForm->nama_lengkap }}</h5>
                                                <p class="mb-0">Jenis Kelamin: {{ $dataForm->jenis_kelamin }}</p>
                                                <p class="mb-0">Asal Sekolah: {{ $dataForm->asal_sekolah }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            @include('dashboard.component.footer.footer')
        </footer>
    </div>
@endsection
