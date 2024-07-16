<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        @if (isset(Auth::user()->foto) != null)
            <a class="navbar-brand m-0" href=" {{ url('/pengurus/biodata') }}">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="navbar-brand-img" alt="main_logo"
                        style="height: 50px; margin-right: 10px;">
                    <div>
                        <div>
                            <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">{{ Auth::user()->nohp }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @else
            <a class="navbar-brand m-0" href=" {{ url('/pengurus/biodata') }}">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('argon') }}/assets/img/foto.png" class="navbar-brand-img" alt="main_logo"
                        style="height: 50px; margin-right: 10px;">
                    <div>
                        <div>
                            <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">{{ Auth::user()->nohp }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endif
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pengurus/biodata') ? 'active' : '' }}"
                    href="{{ url('/pengurus/biodata') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Biodata</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pengurus/kta') ? 'active' : '' }}"
                    href="{{ url('/pengurus/kta') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-success text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">KTP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pengurus') ? 'active' : '' }}" target="_blank"
                    href="{{ url('https://strawpoll.com/w4nWWD68WnA') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-pencil-square-o text-success text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">E-Vote Caketum</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('pengurus/pendaftaran') ? 'active' : '' }}" target="_blank"
                    href="{{ url('/pengurus/pendaftaran') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-pencil-square-o text-success text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pendaftaran</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->is('pengurus/pembayaran') ? 'active' : '' }}"
                    href="{{ url('/pengurus/pembayaran') }}">
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
                <a class="nav-link {{ request()->is('pengurus/profile') ? 'active' : '' }}"
                    href="{{ url('/pengurus/profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-success text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pengurus/changepassword') ? 'active' : '' }}"
                    href="{{ url('/pengurus/changepassword') }}">
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
                    <h6 class="mb-0">WEBSITE PENGURUS</h6>
                    {{-- <p class="text-xs font-weight-bold mb-0">Please check our docs</p> --}}
                </div>
            </div>
        </div>
        {{-- <a href="{{ url('/dashboard/profile') }}" class="btn btn-dark btn-sm w-100 mb-3">Profile</a> --}}
        <a class="btn btn-danger btn-sm mb-0 w-100" href="{{ route('logout') }}" type="button">Logout</a>
    </div>
</aside>
