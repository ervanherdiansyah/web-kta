<div class="navbar bg-white shadow-md px-5">
    <div class="navbar-start w-full md:w-6/12">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[999] p-2 shadow bg-base-100 rounded-box w-52 relative">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">AboutUs</a></li>
                <li>
                    <a>Pendaftaran</a>
                    <ul className="p-2 ">
                      <li><a href="{{ url('/pendaftaran') }}">Pendaftaran PPDB</a></li>                    </li>
                      <li><a href="{{ url('/alur-pendaftaran') }}">Alur pendaftaran</a></li>
                    </ul>
                  </li>
                <li><a href="{{ url('/visi') }}">Visi & Misi</a></li>
                <li><a href="{{ url('/fasilitas') }}">Fasilitas</a></li>
                <li><a href="{{ url('/contact') }}">contact</a></li>
                <div class="gap-2 flex justify-center mt-5 lg:hidden">
                    <a href="/login" class="px-4 py-1 bg-[#86B6F6] rounded-md text-white">login</a>
                    <a href="/register" class="px-4 py-1 bg-[#86B6F6] rounded-md text-white">daftar</a>
                </div>
            </ul>
        </div>
        <a href="/home" class=" text-xl font-semibold text-center ">SMK Bandung timur</a>
    </div>
    <div class="navbar-center hidden lg:flex ">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/visi') }}">Visi & Misi</a></li>
            <li>
                <details class="">
                  <summary>Pendaftaran</summary>
                  <ul className="p-2">
                    <li class=" w-40"><a href="{{ url('/pendaftaran') }}">Pendaftaran PPDB</a></li>                    </li>
                      <li class=" w-40"><a href="{{ url('/alur-pendaftaran') }}">Alur pendaftaran</a></li>
                  </ul>
                </details>
              </li>
            {{-- <li><a href="{{ url('/pendaftaran') }}">Pendaftaran PPDB</a></li> --}}
            <li><a href="{{ url('/about') }}">AboutUs</a></li>
            <li><a href="{{ url('/fasilitas') }}">Fasilitas</a></li>
            <li><a href="{{ url('contact') }}">contact</a></li>
        </ul>
    </div>
    <div class=" navbar-end gap-2 hidden lg:flex">
        <a href="/login" class="px-4 py-1 bg-[#86B6F6] rounded-md text-white">login</a>
        <a href="/register" class="px-4 py-1 bg-[#86B6F6] rounded-md text-white">daftar</a>
    </div>
</div>
