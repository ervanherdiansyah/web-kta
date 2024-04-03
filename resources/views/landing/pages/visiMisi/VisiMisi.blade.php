@extends('landing.layouts.Layout')

@section('content')
    <section>
        <div class="h-[300px] rounded-br-[200px]" style="background-image: url('assets/img/bg-profile.jpg');">
            <div class="flex items-center h-full lg:w-5/12 justify-center">
                <h1 class="font-bold text-4xl text-white">Visi & Misi</h1>
            </div>
        </div>
    </section>

    <section class="py-[40px]">
        <div class="flex justify-center p-5">
            <div class="flex flex-col md:flex-row justify-center gap-5 items-center">
                <h1 class="font-medium text-[#176B87] text-3xl text-center md:text-left md:w-3/12">Visi SMK Bandung Timur
                </h1>
                <div class="h-[50px] p-[1px] bg-[#176B87] hidden md:block"></div>
                <div class="w-[50px] p-[1px] bg-[#176B87] md:hidden"></div>
                <p class="text-xl text-center font-medium p-2 md:w-5/12">Menjadi Sekolah Standar Nasional (SSN) tahun 2026 yang menghasilkan lulusan yang beriman dan bertaqwa, handal, kompeten dalam bidang keahliannya, berwawasan dan berbudaya lingkungan serta mampu beradaptasi dalam menghadapi persaingan global.</p>
            </div>
        </div>
    </section>

    <section class="py-[40px] mb-20">
        <div class="flex flex-col md:flex-row p-5 gap-5 relative md:h-[400px] ove">
            <div class="absolute bottom-0 left-0 bg-gray-200 h-[500px] w-full md:hidden"></div>
            <div class="absolute -bottom-10 right-0 bg-gray-200 h-[450px] w-[800px] hidden md:block"></div>
            <div class="relative h-[200px] md:w-[550px] lg:h-[400px]" >
                <img src="assets/img/IMG1.jpg" alt="" class="h-full w-full object-cover" data-aos="fade-right">
            </div>
            <div class=" relative flex justify-center lg:w-7/12">
                <div class= "p-5">
                    <h1 class="font-medium text-[#176B87] text-2xl">Misi Sekolah</h1>
                    <div class="mt-2">
                        <ul class="list-decimal list-outside pl-4 font-medium">
                            <li>Menerapkan proses pendidikan dan pelatihan sesuai dengan Standar Nasional Pendidikan.</li>
                            <li>Mempersiapkan lulusan yang berakhlak mulia, mampu beradaptasi, kreatif, produktif dan mandiri melalui pendidikan dan pelatihan kelompok Mata Pelajaran Muatan Nasional, Muatan Kewilayahan dan Muatan Kejuruan.</li>
                            <li>Menanamkan jiwa wirausaha, mampu mengembangkan sikap profesional di bidang keahliannya masing – masing.</li>
                            <li>Mempersiapkan lulusan yang mampu berkompetisi/ bersaing mengisi lowongan pekerjaan di Dunia Usaha dan Dunia Industri (DU/DI) baik Lingkup Nasional maupun Internasional sesuai dengan bidang keahliannya.</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-[40px]">
        <div class="flex justify-center">
            <h1 class="font-medium text-[#176B87] text-2xl">Tujuan Sekolah</h1>
        </div>
        <div class="py-5 flex justify-center">
            <ul class="list-decimal px-10 md:w-8/12 font-medium">
                <li>Meningkatkan keamanan dan ketaqwaan peserta didik kepada Tuhan Yang Maha Esa.</li>
                <li>Mengembangkan potensi peserta didik agar menjadi warga negara yang berakhlak mulia, sehat, berilmu, cakap, kreatif, mandiri, demokratis dan bertanggung jawab.</li>
                <li>Mengembangkan potensi peserta didik agar memiliki wawasan kebangsaan, memahami dan menghargai keanekaragaman budaya bangsa Indonesia.</li>
                <li>Mengembangkan potensi peserta didik agar memiliki kepedulian terhadap lingkungan hidup dengan secara aktif, turut memelihara dan melestarikan lingkungan hidup, serta memanfaatkan sumber daya alam dangan efektif dan efesien.</li>
            </ul>
        </div>
    </section>
@endsection
