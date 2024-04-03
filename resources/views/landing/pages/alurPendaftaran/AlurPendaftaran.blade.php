@extends('landing.layouts.Layout')

@section('content')
<section>
    <div class="h-[300px] rounded-br-[200px]" style="background-image: url('assets/img/bg-profile.jpg');">
        <div class="flex items-center h-full lg:w-5/12 justify-center">
            <h1 class="font-bold text-4xl text-white">Alur Pendaftaran</h1>
        </div>
    </div>
</section>    

    <section class="py-20">
        <ul class="timeline timeline-vertical">
            <li>
              <div class="timeline-start timeline-box">pendftaran di buka 23 juli 2024</div>
              <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
              </div>
              <hr/>
            </li>
            <li>
              <hr/>
              <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
              </div>
              <div class="timeline-end timeline-box">calon siswa masuk ke menu pendaftaran</div>
              <hr/>
            </li>
            <li>
              <hr/>
              <div class="timeline-start timeline-box">calon siswa mengisi form pendaftaran di website yang telah di sediakan</div>
              <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
              </div>
              <hr/>
            </li>
            <li>
              <hr/>
              <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
              </div>
              <div class="timeline-end timeline-box">menunggu konfirasi dari pihak sekolah</div>
              <hr/>
            </li>
            <li>
              <hr/>
              <div class="timeline-start timeline-box">calon siswa menerima tanda bukti pendaftaran</div>
              <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
              </div>
            </li>
          </ul>
    </section>
@endsection
