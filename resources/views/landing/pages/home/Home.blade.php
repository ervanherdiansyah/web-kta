@extends('landing.layouts.Layout')

@section('content')
    <section class="mt-10">
        <div class="hero min-h-[500px]" style="background-image: url('assets/img/IMG1.jpg');">
            <div class="hero-overlay bg-opacity-60 backdrop-blur-sm"></div>
            <div class="hero-content text-center text-neutral-content">
                <div class="max-w-md ">
                    <h1 class="mb-5 text-5xl font-bold text-[#86B6F6]">SMK BANDUNG TIMUR</h1>
                    <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                        exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                    <button
                        class="px-4 py-2 bg-[#176B87] rounded-md hover:bg-white hover:text-[#86B6F6] transition-all duration-200">Get
                        Started</button>
                </div>
            </div>
        </div>
    </section>

    {{-- sambutan --}}
    <section class="px-5 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
            <div class="col-span-2 lg:col-span-3 p-5">
                <div class="">
                    <h1 class="font-semibold text-2xl text-[#176B87]">Sambutan Kepala Sekolah</h1>
                    <div class="mt-5">
                        <div class="float-left mr-8 lg:mr-5">
                            <div class="h-[300px] w-[310px] lg:w-[300px] overflow-hidden">
                                <img src="assets/logo/logo1.png" alt="" class="h-full w-full">
                            </div>
                        </div>
                        <div class="lg:w-10/12">
                            <p class="text-justify ">
                                Assalamualaikum, Wr. Wb.
                                <br>
                                Puji syukur kami panjatkan kehadirat Allah SWT atas limpahan rahmat dan karunia-Nya sehingga SMK Bandung Timur telah mempunyai website. Kehadiran Website SMK Bandung Timur diharapkan dapat memudahkan penyampaian informasi secara terbuka kepada warga sekolah, alumni dan masyarakat serta Instansi/ Lembaga lain yang terkait.
                                <br>
                                Langkah ini merupakan wujud kepedulian kami, keluarga besar SMK Bandung Timur akan pentingnya sebuah media pembelajaran dan tempat berbagi informasi yang mudah diakses dan lebih luas cakupannya lewat dunia cyber. Kita tahu Generasi bangsa saat ini sudah tidak dapat lepas dari lajunya teknologi informasi. Teknologi sudah menjadi bagian dari kehidupan anak bangsa kita. Memanfaatkan teknologi dengan sebaik-baiknya sebagai media untuk merekatkan tali silaturrahim dan tempat belajar sambil bermain adalah keinginan kita bersama. Akhirnya, ucapan terima kasih kami sampaikan kepada semua pengurus, pembimbing dan peserta didik, keluarga besar SMK Bandung Timur yang telah membantu dan memberikan support sehingga website ini dapat online tepat waktu.  Apabila ada Kekurangan masih banyak kita ditemukan di website ini, maka saran dan kritik membangun sangat kami butuhkan demi kebaikan dan kesempurnaan website kami dimasa yang akan datang. Terima kasih.
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5 border rounded-md shadow-md ">
                <h1 class="text-center font-medium text-[#176B87]">Berita</h1>
                <div class="mt-5 flex justify-center md:justify-end">
                    <div class="flex flex-col gap-5 w-full">
                        {{-- card berita --}}
                        <div class=" border shadow-md group">
                            <div class=" h-[150px] relative overflow-hidden">
                                <img src="assets/img/IMG7.jpg" alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute  bg-white backdrop-blur-sm bg-opacity-50 p-2 translate-y-2 group-hover:-translate-y-[70px] transition-all duration-200">
                                    <div class="bg-white p-1">
                                        <a href="" class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit.
                                            Corporis, culpa.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" border shadow-md group">
                            <div class=" h-[150px] relative overflow-hidden">
                                <img src="assets/img/IMG8.jpg" alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute  bg-white backdrop-blur-sm bg-opacity-50 p-2 translate-y-2 group-hover:-translate-y-[70px] transition-all duration-200">
                                    <div class="bg-white p-1">
                                        <a href="" class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit.
                                            Corporis, culpa.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" border shadow-md group">
                            <div class=" h-[150px] relative overflow-hidden">
                                <img src="assets/img/IMG9.jpg" alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute  bg-white backdrop-blur-sm bg-opacity-50 p-2 translate-y-2 group-hover:-translate-y-[70px] transition-all duration-200">
                                    <div class="bg-white p-1">
                                        <a href="" class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit.
                                            Corporis, culpa.</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- end card berita --}}
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- program keahlian --}}
    <section class="py-[80px] bg-[#EEF5FF] mt-5 overflow-hidden ">
        <div class="flex justify-center">
            <h1 class="font-bold text-3xl text-[#176B87]">Program Keahlian</h1>
        </div>
        <div class="px-5 lg:px-[80px] mt-10 ">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 ">
                {{-- card --}}
                <div class="flex border border-[#86B6F6] p-5 rounded-md bg-white shadow-md" data-aos="fade-right">
                    <div class="flex gap-2">
                        <img src="assets/icons/video-camera.png" alt="" class="h-10 w-10">
                        <div>
                            <h1 class="font-medium text-2xl text-[#86B6F6]">Teknik Komputer & Jaringan</h1>
                            <hr class="border-1">
                            <p class="">Teknik Komputer dan Jaringan (TKJ) merupakan salah satu program studi yang mempersiapkan siswa untuk memahami dan menguasai teknologi komputer serta jaringan, mulai dari pengoperasian hardware hingga administrasi jaringan, untuk mendukung pengembangan keahlian teknologi informasi di masa depan.</p>
                        </div>
                    </div>
                </div>
                <div class="flex border border-[#86B6F6] p-5 rounded-md bg-white shadow-md" data-aos="fade-left">
                    <div class="flex gap-2">
                        <img src="assets/icons/calculation.png" alt="" class="h-10 w-10">
                        <div>
                            <h1 class="font-medium text-2xl text-[#86B6F6]">Akutansi</h1>
                            <hr class="border-1">
                            <p class="">Jurusan akuntansi di SMK mempersiapkan siswa untuk memahami dasar-dasar akuntansi, termasuk penggunaan perangkat lunak akuntansi modern, analisis laporan keuangan, serta prinsip-prinsip perpajakan. Selain itu, siswa juga diajarkan tentang audit, pengendalian intern, dan peraturan keuangan yang relevan. Program ini bertujuan untuk melatih siswa agar memiliki keterampilan yang diperlukan untuk menjadi ahli akuntansi yang kompeten dan dapat diterapkan dalam berbagai industri dan profesi keuangan.</p>
                        </div>
                    </div>
                </div>
                <div class="flex border border-[#86B6F6] p-5 rounded-md bg-white shadow-md" data-aos="fade-right">
                    <div class="flex gap-2">
                        <img src="assets/icons/bike.png" alt="" class="h-10 w-10">
                        <div>
                            <h1 class="font-medium text-2xl text-[#86B6F6]">Teknik Bisnis Sepeda Motor</h1>
                            <hr class="border-1">
                            <p class="">Memberikan siswa pemahaman mendalam tentang industri sepeda motor, termasuk proses manufaktur, distribusi, dan pemasaran sepeda motor. Mereka belajar tentang teknik perakitan sepeda motor, analisis pasar, manajemen rantai pasok, serta strategi penjualan dan layanan pelanggan.</p>
                        </div>
                    </div>
                </div>
                <div class="flex border border-[#86B6F6] p-5 rounded-md bg-white shadow-md" data-aos="fade-left">
                    <div class="flex gap-2">
                        <img src="assets/icons/car.png" alt="" class="h-10 w-10">
                        <div>
                            <h1 class="font-medium text-2xl text-[#86B6F6]">Kendaraan Ringan</h1>
                            <hr class="border-1">
                            <p class=""> jurusan kendaraan ringan mempersiapkan siswa untuk memperoleh pengetahuan dan keterampilan yang diperlukan dalam merawat, memperbaiki, dan mengelola kendaraan bermotor ringan seperti mobil dan sejenisnya, sehingga mereka siap untuk berkarir dalam industri otomotif setelah lulus.</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center md:col-span-2 " data-aos="fade-up">
                    <div class="flex border border-[#86B6F6] p-5 md:w-6/12 rounded-md bg-white shadow-md ">
                        <div class="flex gap-2">
                            <img src="assets/icons/calculation.png" alt="" class="h-10 w-10">
                            <div>
                                <h1 class="font-medium text-2xl text-[#86B6F6]">Perhotelan</h1>
                                <hr class="border-1">
                                <p class="">siswa belajar tentang manajemen operasional, pelayanan pelanggan, dan pengelolaan fasilitas hotel. Program ini dirancang untuk mempersiapkan mereka dalam mengelola berbagai aspek dalam industri perhotelan, mulai dari administrasi hotel, manajemen staf, hingga pelayanan tamu yang unggul.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end card --}}
            </div>
        </div>
    </section>

    {{-- pilihan --}}
    <section class="py-[80px]">
        <div class="flex justify-center">
            <h1 class="font-bold text-3xl  text-center"> <span class="text-[#176B87]">Mengapa Memilih </span> SMK Bandung
                Timur ?</h1>
        </div>
        <div class="px-[40px] mt-10 flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 ">

                <div class="border border-[#86B6F6] lg:w-[400px] rounded-md p-5 ">
                    <div class="flex justify-center">
                        <img src="assets/icons/calculation.png" alt="" class="h-20 w-20">
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-xl text-[#86B6F6]">Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse mollitia fuga maxime modi
                            tenetur sapiente nam ipsam repudiandae. Est.</p>
                    </div>
                </div>
                <div class="border border-[#86B6F6] lg:w-[400px] rounded-md p-5">
                    <div class="flex justify-center">
                        <img src="assets/icons/calculation.png" alt="" class="h-20 w-20">
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-xl text-[#86B6F6]">Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse mollitia fuga maxime modi
                            tenetur sapiente nam ipsam repudiandae. Est.</p>
                    </div>
                </div>
                <div class="border border-[#86B6F6] lg:w-[400px] rounded-md p-5">
                    <div class="flex justify-center">
                        <img src="assets/icons/calculation.png" alt="" class="h-20 w-20">
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-xl text-[#86B6F6]">Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse mollitia fuga maxime modi
                            tenetur sapiente nam ipsam repudiandae. Est.</p>
                    </div>
                </div>
                <div class="border border-[#86B6F6] lg:w-[400px] rounded-md p-5">
                    <div class="flex justify-center">
                        <img src="assets/icons/calculation.png" alt="" class="h-20 w-20">
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-xl text-[#86B6F6]">Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam esse mollitia fuga maxime modi
                            tenetur sapiente nam ipsam repudiandae. Est.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- pedaftaran --}}
    <section class="h-[400px]" style="position: relative; overflow: hidden;">
        <div
            style="
        background-image: url('assets/img/bg-profile.jpg'); 
        position: 
        absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;">
            <div class="flex flex-col items-center justify-center h-full bg-black bg-opacity-40 backdrop-blur-sm">
                <div>
                    <h1 class="font-bold text-2xl text-white text-center">PENDAFTARAN PESERTA DIDIK BARU</h1>
                    <P class="text-white text-center font-medium">Kami mengundang putra terbaik Negeri untuk bergabung
                        bersama SMK
                        Bandung Timur </P>
                </div>
                <div class="mt-5">
                    <a href="" class="px-4 py-2 bg-[#86B6F6] rounded-md text-white">Pendaftaran</a>
                </div>
            </div>
        </div>
    </section>

    {{-- card --}}
    <section class="px-10 py-[80px] ">
        <div class="stats stats-vertical lg:stats-horizontal rounded-none shadow border w-full">
            <div class="stat flex justify-center">
                <div>
                    <div class="stat-title text-center">Guru</div>
                    <div class="stat-value">32</div>
                </div>
            </div>

            <div class="stat flex justify-center bg-slate-200">
                <div>
                    <div class="stat-title text-center">Staff</div>
                    <div class="stat-value">8</div>
                </div>
            </div>

            <div class="stat flex justify-center">
                <div>
                    <div class="stat-title text-center">Siswa</div>
                    <div class="stat-value">490</div>
                </div>
            </div>

        </div>
    </section>

    {{-- prestasi --}}
    <section class="py-[80px] px-5 bg-[#EEF5FF] ">
        <div class="">
            <h1 class="font-bold text-3xl text-[#176B87] text-center">Prestasi yang telah kami Raih</h1>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus consequatur ipsum
                dignissimos tempora minima voluptatum?</p>
        </div>
        {{-- card prestasi --}}
        <div class="flex justify-center mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 overflow-hidden">
                <div class="lg:p-8" data-aos="fade-right">
                    <div class="card  bg-base-100 shadow-xl">
                        <figure class="px-10 pt-10">
                            <img src="assets/img/IMG9.jpg" alt="Shoes" class="rounded-xl w-[350px] h-[180px] object-cover " />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">Turnament Futsal</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions">
                                <button
                                    class="px-4 py-2 text-white bg-[#176B87] rounded-md hover:bg-white hover:text-[#86B6F6] transition-all duration-200">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:p-8" data-aos="fade-down">
                    <div class="card  bg-base-100 shadow-xl">
                        <figure class="px-10 pt-10">
                            <img src="assets/img/IMG4.jpg" alt="Shoes" class="rounded-xl w-[350px] h-[180px] object-cover " />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">Lomba Edit Video jawa barat</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions">
                                <button
                                    class="px-4 py-2 text-white bg-[#176B87] rounded-md hover:bg-white hover:text-[#86B6F6] transition-all duration-200">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:p-8" data-aos="fade-left">
                    <div class="card bg-base-100 shadow-xl">
                        <figure class="px-10 pt-10">
                            <img src="assets/img/IMG8.jpg" alt="Shoes" class="rounded-xl w-[350px] h-[180px] object-cover " />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">lomba ngaji</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions">
                                <button
                                    class="px-4 py-2 text-white bg-[#176B87] rounded-md hover:bg-white hover:text-[#86B6F6] transition-all duration-200">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end card prestasi --}}
    </section>

    {{-- carousel --}}
    <section class="md:p-10">
        <div class="carousel w-full rounded-md">
            <div id="item1" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/IMG2.jpg" class="w-full object-cover" />
            </div>
            <div id="item2" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/IMG3.jpg" class="w-full object-cover" />
            </div>
            <div id="item3" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/IMG4.jpg" class="w-full object-cover" />
            </div>
            <div id="item4" class="carousel-item md:h-[400px] w-full rounded-md overflow-hidden">
                <img src="assets/img/IMG5.jpg" class="w-full object-cover" />
            </div>
        </div>
        <div class="flex justify-center w-full py-2 gap-2">
            <a href="#item1" class="btn btn-xs">1</a>
            <a href="#item2" class="btn btn-xs">2</a>
            <a href="#item3" class="btn btn-xs">3</a>
            <a href="#item4" class="btn btn-xs">4</a>
        </div>
    </section>
@endsection
