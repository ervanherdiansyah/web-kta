@extends('landing.layouts.Layout')

@section('content')
    <section>
        <div class="h-[300px] rounded-br-[200px]" style="background-image: url('assets/img/bg-profile.jpg');">
            <div class="flex items-center h-full lg:w-5/12 justify-center">
                <h1 class="font-bold text-4xl text-white">Fasilitas Sekolah</h1>
            </div>
        </div>
    </section>

    <section class="mt-10 mb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-5 md:p-10 gap-10">
            {{-- card --}}
            <div class="border shadow-md md:w-[350px]  overflow-hidden hover:scale-105 transition-all duration-200 ">
                <div class="h-[200px] md:w-[350px]">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Ruang Kelas</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px]  overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px]">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Ruang prakik Tekni kendaraan ringan</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px]  overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px]">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Ruang teknik sepeda motor</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px]  overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px]">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Ruang tekni koputer dan jaringan</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Ruang praktik perhotelan</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Ruang praktik akutansi & keuangan</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Lab. Informatika</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>mini Bank</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Sanggar Tari</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Perpustakaan</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Masjid</h2>
                </div>
            </div>
            <div class="border shadow-md md:w-[350px] overflow-hidden hover:scale-105 transition-all duration-200">
                <div class="h-[200px] md:w-[350px] ">
                    <img src="assets/img/home-decor-1.jpg" alt="" class="h-full w-full object-cover">
                </div>
                <div class="text-center p-2">
                    <h2>Lapangan olahraga</h2>
                </div>
            </div>
        </div>
    </section>
@endsection
