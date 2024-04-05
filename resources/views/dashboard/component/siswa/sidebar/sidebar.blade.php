<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        @if (isset(Auth::user()->foto) != null)
            <a class="navbar-brand m-0" href=" {{ url('/peserta/home') }}">
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">{{ Auth::user()->name }}</span>
            </a>
        @else
            <a class="navbar-brand m-0" href=" {{ url('/dashboard/home') }}">
                <img src="{{ asset('argon') }}/assets/img/foto.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">{{ Auth::user()->name }}</span>
            </a>
        @endif
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('peserta/home') ? 'active' : '' }}"
                    href="{{ url('/peserta/home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Information</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('peserta/pembayaran') ? 'active' : '' }}"
                    href="{{ url('/peserta/pembayaran') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-money text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran</span>
                </a>
            </li> --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Setting</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('peserta/profile') ? 'active' : '' }}"
                    href="{{ url('/peserta/profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-success text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('peserta/changepassword') ? 'active' : '' }}"
                    href="{{ url('/peserta/changepassword') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-cogs text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('assets/img/logo-fojb.png') }}" alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">WEBSITE OPREC ANGGOTA</h6>
                    {{-- <p class="text-xs font-weight-bold mb-0">Please check our docs</p> --}}
                </div>
            </div>
        </div>
        {{-- <a href="{{ url('/dashboard/profile') }}" class="btn btn-dark btn-sm w-100 mb-3">Profile</a> --}}
        <a class="btn btn-danger btn-sm mb-0 w-100" href="{{ route('logout') }}" type="button">Logout</a>
    </div>
</aside>
