@extends('landing.layouts.Layout')

@section('content')
<div class='px-[20px] md:px-[80px] py-[40px] mt-10'>
    <div class='grid grid-cols-1 lg:grid-cols-2'>
        <div class=' flex justify-center' data-aos="fade-right">
            <div class='lg:h-[350px] lg:w-[500px] overflow-hidden'>
                <img src="/assets/img/foto-semua-Guru.jpg" alt="" class='object-cover h-full w-full' />
            </div>
        </div>
        <div class='flex justify-center'>
            <div class='p-5 lg:p-10 flex flex-col gap-4'>
                <div class='flex items-center gap-3 px-[20px]'>
                    <div class='h-[2px] w-[10px] bg-black'></div>
                    <h3>Tentang Sekolah</h3>
                </div>

                <h1 class='font-bold text-2xl text-[#86B6F6]'>Our Story</h1>
                <p class='text-[32px] text-[#176B87]'>Get to know about us, stores, environment, and people behind it!</p>
            </div>
        </div>
    </div>
</div>

<div class='px-[20px] md:px-[80px] py-[80px]'>
    <div class='grid grid-cols-1 lg:grid-cols-2'>
        <div class='flex flex-col gap-4 lg:px-20'>
            <div class='flex items-center gap-3 px-[20px]'>
                <div class='h-[2px] w-[18px] bg-black'></div>
                <h3>Our Story</h3>
            </div>
            <h1 class='font-bold text-3xl text-[#86B6F6]'>Grind The Essentials</h1>
        </div>
        <div>
            <div class='lg:px-20 flex flex-col gap-4'>
                <p class='text-justify'>Sekolah ini didirikan oleh Yayasan Sapta Prakarsa. Luas tanah sekolah ini adalah xxx meter persegi. Sekolah ini memiliki akses internet. Sumber listrik di sekolah ini berasal dari PLN. Email sekolah ini adalah smkbantim@yahoo.com Website sekolah ini dapat diakses di http://www.smkbandungtimur.com</p>
                <p class='text-justify'>Sekolah ini telah memperoleh SK Operasional dengan nomor 328/I02.1/kep/OT1977 yang dikeluarkan pada 21 April 1997. Selain itu, sekolah ini juga telah terakreditasi A dengan SK Akreditasi Nomor 02.00/203/SK/BAN-SM/XII/2018 yang dikeluarkan pada 04 Desember 2018. Selain itu, sekolah ini juga telah memperoleh sertifikat ISO dengan Nomor.</p>
            </div>
        </div>
    </div>
</div>
    
@endsection