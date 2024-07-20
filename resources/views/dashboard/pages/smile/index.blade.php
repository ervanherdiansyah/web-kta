@extends('dashboard.layouts.layout')
@section('title', 'Data Pendaftaran')
@section('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

@endsection
@section('content')
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
                        <h6 class="d-lg-none">Data Smile</h6>
                        <div class="d-flex align-items-center">
                            <h6 class="d-none d-lg-block">Data Smile</h6>

                            <div class="d-flex flex-wrap align-items-center ms-auto gap-2">
                                <a href="{{ url('/dashboard/pendaftaran-smile/export') }}"
                                    class="btn btn-primary btn-sm ms-auto">Export</a>
                                {{-- <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#import">
                                    Import
                                </button> --}}

                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Pendaftaran
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="myTable" class="table align-items-center mb-0 display">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Lahir</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No Hp</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Alamat</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Asal Sekolah</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Asal Kota/Kabupaten Sekolah</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Ibu Kandung</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NIK</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nomor Kartu Keluarga</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jurusan 1</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jurusan 2</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            @include('dashboard.component.footer.footer')
        </footer>
    </div>

    <!-- Modal Create Data-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/dashboard/pendaftaran-smile/create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">User ID</label>
                                    <select name="user_id" id="" class="form-control form-select">
                                        <option value="">Pilih</option>
                                        @foreach ($user as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Nama
                                        Lengkap</label>
                                    <input name="nama_lengkap" type="text" class="form-control"
                                        placeholder="Nama Lengkap" aria-label="Name" value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Tanggal
                                        Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control"
                                        value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">No
                                        Hp</label>
                                    <input name="hp" placeholder="No Hp" class="form-control" type="text"
                                        value="{{ old('hp') }}">
                                    @error('hp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input name="email" placeholder="Email" class="form-control" type="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Alamat</label>
                                    <textarea name="alamat" id="" class="form-control">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Asal
                                        sekolah</label>
                                    <input name="asal_sekolah" placeholder="Asal Sekolah" class="form-control"
                                        type="text" value="{{ old('asal_sekolah') }}">
                                    @error('asal_sekolah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Kelas</label>
                                    <select name="kelas" id="" class="form-control form-select">
                                        <option value="">Pilih</option>
                                        <option value="X" @if (old('kelas') == 'X') selected @endif>
                                            X
                                        </option>
                                        <option value="XI" @if (old('kelas') == 'XI') selected @endif>
                                            XI
                                        </option>
                                        <option value="XII" @if (old('kelas') == 'XII') selected @endif>
                                            XII
                                        </option>
                                    </select>
                                    @error('kelas')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Kota atau
                                        Kabupaten Sekolah</label>
                                    <select name="alamat_asal_sekolah" id="kota" class="form-control form-select">
                                        <option value="">Pilih Kab/Kota</option>
                                    </select>
                                    @error('alamat_asal_sekolah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Nama Ibu
                                        Kandung</label>
                                    <input name="nama_ibu_kandung" type="text" class="form-control"
                                        value="{{ old('nama_ibu_kandung') }}">
                                    @error('nama_ibu_kandung')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Nomor Induk
                                        Penduduk</label>
                                    <input name="nik" placeholder="nik" class="form-control" type="text"
                                        value="{{ old('nik') }}">
                                    @error('nik')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Nomor Kartu
                                        Keluarga</label>
                                    <input name="no_kk" placeholder="no_kk" class="form-control" type="text"
                                        value="{{ old('no_kk') }}">
                                    @error('no_kk')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Jurusan Pilihan
                                        1</label>
                                    <select name="jurusan1" id="" class="form-control form-select">
                                        <option value="">Pilih</option>
                                        <option value="S1 Teknik Telekomunikasi"
                                            @if (old('jurusan1') == 'S1 Teknik Telekomunikasi') selected @endif>
                                            S1 Teknik Telekomunikasi
                                        </option>
                                        <option value="S1 Teknik Elektro"
                                            @if (old('jurusan1') == 'S1 Teknik Elektro') selected @endif>
                                            S1 Teknik Elektro
                                        </option>
                                        <option value="S1 Smart Science & Technology"
                                            @if (old('jurusan1') == 'S1 Smart Science & Technology') selected @endif>
                                            S1 Smart Science & Technology
                                        </option>
                                        <option value="S1 Teknik Komputer"
                                            @if (old('jurusan1') == 'S1 Teknik Komputer') selected @endif>
                                            S1 Teknik Komputer
                                        </option>
                                        <option value="S1 Teknik Biomedis"
                                            @if (old('jurusan1') == 'S1 Teknik Biomedis') selected @endif>
                                            S1 Teknik Biomedis
                                        </option>
                                        <option value="S1 Electrical Energy Engineering"
                                            @if (old('jurusan1') == 'S1 Electrical Energy Engineering') selected @endif>
                                            S1 Electrical Energy Engineering
                                        </option>
                                        <option value="S1 Informatika" @if (old('jurusan1') == 'S1 Informatika') selected @endif>
                                            S1 Informatika
                                        </option>
                                        <option value="S1 Data Sains" @if (old('jurusan1') == 'S1 Data Sains') selected @endif>
                                            S1 Data Sains
                                        </option>
                                        <option value="S1 Teknologi Informasi"
                                            @if (old('jurusan1') == 'S1 Teknologi Informasi') selected @endif>
                                            S1 Teknologi Informasi
                                        </option>
                                        <option value="S1 Rekayasa Perangkat Lunak"
                                            @if (old('jurusan1') == 'S1 Rekayasa Perangkat Lunak') selected @endif>
                                            S1 Rekayasa Perangkat Lunak
                                        </option>
                                        <option value="S1 Teknik Industri"
                                            @if (old('jurusan1') == 'S1 Teknik Industri') selected @endif>
                                            S1 Teknik Industri
                                        </option>
                                        <option value="S1 Sistem Informasi"
                                            @if (old('jurusan1') == 'S1 Sistem Informasi') selected @endif>
                                            S1 Sistem Informasi
                                        </option>
                                        <option value="S1 Digital Supply Chain"
                                            @if (old('jurusan1') == 'S1 Digital Supply Chain') selected @endif>
                                            S1 Digital Supply Chain
                                        </option>
                                        <option value="S1 Manajemen Rekayasa"
                                            @if (old('jurusan1') == 'S1 Manajemen Rekayasa') selected @endif>
                                            S1 Manajemen Rekayasa
                                        </option>
                                        <option value="S1 Ilmu Komunikasi"
                                            @if (old('jurusan1') == 'S1 Ilmu Komunikasi') selected @endif>
                                            S1 Ilmu Komunikasi
                                        </option>
                                        <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)"
                                            @if (old('jurusan1') == 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)') selected @endif>
                                            S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)
                                        </option>
                                        <option value="S1 Akuntansi" @if (old('jurusan1') == 'S1 Akuntansi') selected @endif>
                                            S1 Akuntansi
                                        </option>
                                        <option value="S1 Administrasi Bisnis"
                                            @if (old('jurusan1') == 'S1 Administrasi Bisnis') selected @endif>
                                            S1 Administrasi Bisnis
                                        </option>
                                        <option value="S1 Manajemen Bisnis Rekreasi (Leisure Management)"
                                            @if (old('jurusan1') == 'S1 Manajemen Bisnis Rekreasi (Leisure Management)') selected @endif>
                                            S1 Manajemen Bisnis Rekreasi (Leisure Management)
                                        </option>
                                        <option value="S1 Digital Bisnis"
                                            @if (old('jurusan1') == 'S1 Digital Bisnis') selected @endif>
                                            S1 Digital Bisnis
                                        </option>
                                        <option value="S1 Digital Public Relation"
                                            @if (old('jurusan1') == 'S1 Digital Public Relation') selected @endif>
                                            S1 Digital Public Relation
                                        </option>
                                        <option value="S1 Digital Content Broadcasting"
                                            @if (old('jurusan1') == 'S1 Digital Content Broadcasting') selected @endif>
                                            S1 Digital Content Broadcasting
                                        </option>
                                        <option value="S1 Psikologi" @if (old('jurusan1') == 'S1 Psikologi') selected @endif>
                                            S1 Psikologi
                                        </option>
                                        <option value="S1 Desain Komunikasi Visual"
                                            @if (old('jurusan1') == 'S1 Desain Komunikasi Visual') selected @endif>
                                            S1 Desain Komunikasi Visual
                                        </option>
                                        <option value="S1 Desain Produk & Inovasi"
                                            @if (old('jurusan1') == 'S1 Desain Produk & Inovasi') selected @endif>
                                            S1 Desain Produk & Inovasi
                                        </option>
                                        <option value="S1 Desain Interior"
                                            @if (old('jurusan1') == 'S1 Desain Interior') selected @endif>
                                            S1 Desain Interior
                                        </option>
                                        <option value="S1 Creative Arts (Intermedia Visual Arts)"
                                            @if (old('jurusan1') == 'S1 Creative Arts (Intermedia Visual Arts)') selected @endif>
                                            S1 Creative Arts (Intermedia Visual Arts)
                                        </option>
                                        <option value="S1 Kriya Fashion & Textile Design"
                                            @if (old('jurusan1') == 'S1 Kriya Fashion & Textile Design') selected @endif>
                                            S1 Kriya Fashion & Textile Design
                                        </option>
                                        <option value="S1 Film & Animasi"
                                            @if (old('jurusan1') == 'S1 Film & Animasi') selected @endif>
                                            S1 Film & Animasi
                                        </option>
                                        <option value="D3 Teknik Telekomunikasi (Digital Connectivity)"
                                            @if (old('jurusan1') == 'D3 Teknik Telekomunikasi (Digital Connectivity)') selected @endif>
                                            D3 Teknik Telekomunikasi (Digital Connectivity)
                                        </option>
                                        <option value="D3 Teknik Informatika"
                                            @if (old('jurusan1') == 'D3 Teknik Informatika') selected @endif>
                                            D3 Teknik Informatika
                                        </option>
                                        <option value="D3 Teknik Kompute"
                                            @if (old('jurusan1') == 'D3 Teknik Kompute') selected @endif>
                                            D3 Teknik Kompute
                                        </option>
                                        <option value="D3 Sistem Informasi"
                                            @if (old('jurusan1') == 'D3 Sistem Informasi') selected @endif>
                                            D3 Sistem Informasi
                                        </option>
                                        <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)"
                                            @if (old('jurusan1') == 'D3 Digital Accounting (Sistem Informasi Akuntansi)') selected @endif>
                                            D3 Digital Accounting (Sistem Informasi Akuntansi)
                                        </option>
                                        <option value="D3 Hospitality & Culinary Art"
                                            @if (old('jurusan1') == 'D3 Hospitality & Culinary Art') selected @endif>
                                            D3 Hospitality & Culinary Art
                                        </option>
                                        <option value="D3 Digital Marketing"
                                            @if (old('jurusan1') == 'D3 Digital Marketing') selected @endif>
                                            D3 Digital Marketing
                                        </option>
                                        <option value="S1 Terapan Digital Creative Multimedia (DCM)"
                                            @if (old('jurusan1') == 'S1 Terapan Digital Creative Multimedia (DCM)') selected @endif>
                                            S1 Terapan Digital Creative Multimedia (DCM)
                                        </option>
                                        <option value="S1 Terapan Smart City Information System"
                                            @if (old('jurusan1') == 'S1 Terapan Smart City Information System') selected @endif>
                                            S1 Terapan Smart City Information System
                                        </option>
                                    </select>
                                    @error('jurusan1')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Jurusan Pilihan
                                        2</label>
                                    <select name="jurusan2" id="" class="form-control form-select">
                                        <option value="">Pilih</option>
                                        <option value="S1 Teknik Telekomunikasi"
                                            @if (old('jurusan2') == 'S1 Teknik Telekomunikasi') selected @endif>
                                            S1 Teknik Telekomunikasi
                                        </option>
                                        <option value="S1 Teknik Elektro"
                                            @if (old('jurusan2') == 'S1 Teknik Elektro') selected @endif>
                                            S1 Teknik Elektro
                                        </option>
                                        <option value="S1 Smart Science & Technology"
                                            @if (old('jurusan2') == 'S1 Smart Science & Technology') selected @endif>
                                            S1 Smart Science & Technology
                                        </option>
                                        <option value="S1 Teknik Komputer"
                                            @if (old('jurusan2') == 'S1 Teknik Komputer') selected @endif>
                                            S1 Teknik Komputer
                                        </option>
                                        <option value="S1 Teknik Biomedis"
                                            @if (old('jurusan2') == 'S1 Teknik Biomedis') selected @endif>
                                            S1 Teknik Biomedis
                                        </option>
                                        <option value="S1 Electrical Energy Engineering"
                                            @if (old('jurusan2') == 'S1 Electrical Energy Engineering') selected @endif>
                                            S1 Electrical Energy Engineering
                                        </option>
                                        <option value="S1 Informatika" @if (old('jurusan2') == 'S1 Informatika') selected @endif>
                                            S1 Informatika
                                        </option>
                                        <option value="S1 Data Sains" @if (old('jurusan2') == 'S1 Data Sains') selected @endif>
                                            S1 Data Sains
                                        </option>
                                        <option value="S1 Teknologi Informasi"
                                            @if (old('jurusan2') == 'S1 Teknologi Informasi') selected @endif>
                                            S1 Teknologi Informasi
                                        </option>
                                        <option value="S1 Rekayasa Perangkat Lunak"
                                            @if (old('jurusan2') == 'S1 Rekayasa Perangkat Lunak') selected @endif>
                                            S1 Rekayasa Perangkat Lunak
                                        </option>
                                        <option value="S1 Teknik Industri"
                                            @if (old('jurusan2') == 'S1 Teknik Industri') selected @endif>
                                            S1 Teknik Industri
                                        </option>
                                        <option value="S1 Sistem Informasi"
                                            @if (old('jurusan2') == 'S1 Sistem Informasi') selected @endif>
                                            S1 Sistem Informasi
                                        </option>
                                        <option value="S1 Digital Supply Chain"
                                            @if (old('jurusan2') == 'S1 Digital Supply Chain') selected @endif>
                                            S1 Digital Supply Chain
                                        </option>
                                        <option value="S1 Manajemen Rekayasa"
                                            @if (old('jurusan2') == 'S1 Manajemen Rekayasa') selected @endif>
                                            S1 Manajemen Rekayasa
                                        </option>
                                        <option value="S1 Ilmu Komunikasi"
                                            @if (old('jurusan2') == 'S1 Ilmu Komunikasi') selected @endif>
                                            S1 Ilmu Komunikasi
                                        </option>
                                        <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)"
                                            @if (old('jurusan2') == 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)') selected @endif>
                                            S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)
                                        </option>
                                        <option value="S1 Akuntansi" @if (old('jurusan2') == 'S1 Akuntansi') selected @endif>
                                            S1 Akuntansi
                                        </option>
                                        <option value="S1 Administrasi Bisnis"
                                            @if (old('jurusan2') == 'S1 Administrasi Bisnis') selected @endif>
                                            S1 Administrasi Bisnis
                                        </option>
                                        <option value="S1 Manajemen Bisnis Rekreasi (Leisure Management)"
                                            @if (old('jurusan2') == 'S1 Manajemen Bisnis Rekreasi (Leisure Management)') selected @endif>
                                            S1 Manajemen Bisnis Rekreasi (Leisure Management)
                                        </option>
                                        <option value="S1 Digital Bisnis"
                                            @if (old('jurusan2') == 'S1 Digital Bisnis') selected @endif>
                                            S1 Digital Bisnis
                                        </option>
                                        <option value="S1 Digital Public Relation"
                                            @if (old('jurusan2') == 'S1 Digital Public Relation') selected @endif>
                                            S1 Digital Public Relation
                                        </option>
                                        <option value="S1 Digital Content Broadcasting"
                                            @if (old('jurusan2') == 'S1 Digital Content Broadcasting') selected @endif>
                                            S1 Digital Content Broadcasting
                                        </option>
                                        <option value="S1 Psikologi" @if (old('jurusan2') == 'S1 Psikologi') selected @endif>
                                            S1 Psikologi
                                        </option>
                                        <option value="S1 Desain Komunikasi Visual"
                                            @if (old('jurusan2') == 'S1 Desain Komunikasi Visual') selected @endif>
                                            S1 Desain Komunikasi Visual
                                        </option>
                                        <option value="S1 Desain Produk & Inovasi"
                                            @if (old('jurusan2') == 'S1 Desain Produk & Inovasi') selected @endif>
                                            S1 Desain Produk & Inovasi
                                        </option>
                                        <option value="S1 Desain Interior"
                                            @if (old('jurusan2') == 'S1 Desain Interior') selected @endif>
                                            S1 Desain Interior
                                        </option>
                                        <option value="S1 Creative Arts (Intermedia Visual Arts)"
                                            @if (old('jurusan2') == 'S1 Creative Arts (Intermedia Visual Arts)') selected @endif>
                                            S1 Creative Arts (Intermedia Visual Arts)
                                        </option>
                                        <option value="S1 Kriya Fashion & Textile Design"
                                            @if (old('jurusan2') == 'S1 Kriya Fashion & Textile Design') selected @endif>
                                            S1 Kriya Fashion & Textile Design
                                        </option>
                                        <option value="S1 Film & Animasi"
                                            @if (old('jurusan2') == 'S1 Film & Animasi') selected @endif>
                                            S1 Film & Animasi
                                        </option>
                                        <option value="D3 Teknik Telekomunikasi (Digital Connectivity)"
                                            @if (old('jurusan2') == 'D3 Teknik Telekomunikasi (Digital Connectivity)') selected @endif>
                                            D3 Teknik Telekomunikasi (Digital Connectivity)
                                        </option>
                                        <option value="D3 Teknik Informatika"
                                            @if (old('jurusan2') == 'D3 Teknik Informatika') selected @endif>
                                            D3 Teknik Informatika
                                        </option>
                                        <option value="D3 Teknik Kompute"
                                            @if (old('jurusan2') == 'D3 Teknik Kompute') selected @endif>
                                            D3 Teknik Kompute
                                        </option>
                                        <option value="D3 Sistem Informasi"
                                            @if (old('jurusan2') == 'D3 Sistem Informasi') selected @endif>
                                            D3 Sistem Informasi
                                        </option>
                                        <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)"
                                            @if (old('jurusan2') == 'D3 Digital Accounting (Sistem Informasi Akuntansi)') selected @endif>
                                            D3 Digital Accounting (Sistem Informasi Akuntansi)
                                        </option>
                                        <option value="D3 Hospitality & Culinary Art"
                                            @if (old('jurusan2') == 'D3 Hospitality & Culinary Art') selected @endif>
                                            D3 Hospitality & Culinary Art
                                        </option>
                                        <option value="D3 Digital Marketing"
                                            @if (old('jurusan2') == 'D3 Digital Marketing') selected @endif>
                                            D3 Digital Marketing
                                        </option>
                                        <option value="S1 Terapan Digital Creative Multimedia (DCM)"
                                            @if (old('jurusan2') == 'S1 Terapan Digital Creative Multimedia (DCM)') selected @endif>
                                            S1 Terapan Digital Creative Multimedia (DCM)
                                        </option>
                                        <option value="S1 Terapan Smart City Information System"
                                            @if (old('jurusan2') == 'S1 Terapan Smart City Information System') selected @endif>
                                            S1 Terapan Smart City Information System
                                        </option>
                                    </select>
                                    @error('jurusan2')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">
                                                KTP/KK</label>
                                            <input name="kta" placeholder="kta format pdf" class="form-control"
                                                type="file" value="{{ old('kta') }}">
                                            @error('kta')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create Data-->

    <!-- Modal Import Data-->
    {{-- <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/dashboard/pendaftaran/import') }}" method="Post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Import Data Pendaftaran</label>
                                <input name="upload" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Modal Import Data-->
    <div id="modals-container"></div>

    {{-- <script>
        $(document).ready(function() {
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                var filterKota = $('#filter_kota').val();

                // Panggil DataTables dan gunakan parameter `filter_kota`
                $('#example').DataTable().ajax.url('/dashboard/pendaftaran?filter_kota=' + filterKota)
                .load();
            });
        });
    </script> --}}
    <script>
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/32.json')
            .then(response => response.json())
            .then(provinces => {
                var data = provinces;
                var tampung = '<option value="">Pilih Kota/Kabupaten</option>';
                data.forEach(element => {
                    tampung +=
                        `<option value="${element.name}">${element.name}</option>`
                });
                document.getElementById('kota').innerHTML = tampung;
            });
    </script>
@endsection
@push('script')
    <!-- Tautkan file JavaScript jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            loadData();

            function loadData() {
                var table = $('#myTable').DataTable({
                    processing: true,
                    pagination: true,
                    responsive: true,
                    serverSide: true,
                    searching: true,
                    ordering: false,
                    ajax: {
                        url: "{{ url('/dashboard/pendaftaran-smile') }}",

                    },
                    columns: [{
                            data: "nama_lengkap",
                            name: "nama_lengkap"
                        },
                        {
                            data: "tanggal_lahir",
                            name: "tanggal_lahir"
                        },
                        {
                            data: "hp",
                            name: "hp"
                        },
                        {
                            data: "email",
                            name: "email"
                        },
                        {
                            data: "alamat",
                            name: "alamat"
                        },
                        {
                            data: "asal_sekolah",
                            name: "asal_sekolah"
                        },
                        {
                            data: "kelas",
                            name: "kelas"
                        },
                        {
                            data: "alamat_asal_sekolah",
                            name: "alamat_asal_sekolah"
                        },

                        {
                            data: "nama_ibu_kandung",
                            name: "nama_ibu_kandung"
                        },
                        {
                            data: "nik",
                            name: "nik"
                        },
                        {
                            data: "no_kk",
                            name: "no_kk"
                        },

                        {
                            data: "jurusan1",
                            name: "jurusan1"
                        },
                        {
                            data: "jurusan2",
                            name: "jurusan2"
                        },

                        {
                            data: "action",
                            name: "action"
                        },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        $('#modals-container').empty();
                        api.rows().every(function(rowIdx, tableLoop, rowLoop) {
                            var data = this.data();
                            var modalId = data.id;
                            var userName = $('<div>').html(data.user_id).text()
                                .trim(); // Decode HTML entities and trim spaces
                            $('#modals-container').append(`
                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete${data.id}" tabindex="-1" aria-labelledby="deleteLabel${data.id}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteLabel${data.id}">Delete Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/dashboard/pendaftaran-smile/destroy') }}/${data.id}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Update Modal -->
                            <div class="modal fade" id="update${data.id}" tabindex="-1" aria-labelledby="updateLabel${data.id}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateLabel${data.id}">Update Pendaftaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/dashboard/pendaftaran-smile/update') }}/${data.id}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
    <div class="mb-3">
        <label for="nama_lengkap${data.id}" class="form-control-label">Nama Lengkap</label>
        <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" aria-label="Name" id="nama_lengkap${data.id}" value="${data.nama_lengkap}">
        @error('nama_lengkap')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="tanggal_lahir${data.id}" class="form-control-label">Tanggal Lahir</label>
        <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir${data.id}" value="${data.tanggal_lahir}">
        @error('tanggal_lahir')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="hp${data.id}" class="form-control-label">No Hp</label>
        <input name="hp" placeholder="No Hp" class="form-control" type="text" id="hp${data.id}" value="${data.hp}">
        @error('hp')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="email${data.id}" class="form-control-label">Email</label>
        <input name="email" placeholder="Email" class="form-control" type="email" id="email${data.id}" value="${data.email}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="alamat${data.id}" class="form-control-label">Alamat</label>
        <textarea name="alamat" id="alamat${data.id}" class="form-control">${data.alamat}</textarea>
        @error('alamat')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="asal_sekolah${data.id}" class="form-control-label">Asal sekolah</label>
        <input name="asal_sekolah" placeholder="Asal Sekolah" class="form-control" type="text" id="asal_sekolah${data.id}" value="${data.asal_sekolah}">
        @error('asal_sekolah')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="kelas${data.id}" class="form-control-label">Kelas</label>
        <select name="kelas" id="kelas${data.id}" class="form-control form-select">
            <option value="">Pilih</option>
            <option value="X" ${data.kelas === 'X' ? 'selected' : ''}>X</option>
            <option value="XI" ${data.kelas === 'XI' ? 'selected' : ''}>XI</option>
            <option value="XII" ${data.kelas === 'XII' ? 'selected' : ''}>XII</option>
        </select>
        @error('kelas')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="alamat_asal_sekolah${data.id}" class="form-control-label">Kota atau Kabupaten Sekolah</label>
        <select name="alamat_asal_sekolah" id="alamat_asal_sekolah${data.id}" class="form-control form-select">
            <option value="">Pilih Kab/Kota</option>
        </select>
        @error('alamat_asal_sekolah')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="nama_ibu_kandung${data.id}" class="form-control-label">Nama Ibu Kandung</label>
        <input name="nama_ibu_kandung" type="text" class="form-control" id="nama_ibu_kandung${data.id}" value="${data.nama_ibu_kandung}">
        @error('nama_ibu_kandung')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="nik${data.id}" class="form-control-label">Nomor Induk Kependudukan</label>
        <input name="nik" placeholder="nik" class="form-control" type="text" id="nik${data.id}" value="${data.nik}">
        @error('nik')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="no_kk${data.id}" class="form-control-label">Nomor Kartu Keluarga</label>
        <input name="no_kk" placeholder="no_kk" class="form-control" type="text" id="no_kk${data.id}" value="${data.no_kk}">
        @error('no_kk')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

                                                    <div class="col-md-6">
    <div class="mb-3">
        <label for="jurusan1" class="form-control-label">Jurusan Pilihan 1</label>
        <select name="jurusan1" id="jurusan1" class="form-control form-select">
            <option value="">Pilih</option>
            <option value="S1 Teknik Telekomunikasi" ${data.jurusan1 === 'S1 Teknik Telekomunikasi' ? 'selected' : ''}>S1 Teknik Telekomunikasi</option>
            <option value="S1 Teknik Elektro" ${data.jurusan1 === 'S1 Teknik Elektro' ? 'selected' : ''}>S1 Teknik Elektro</option>
            <option value="S1 Smart Science & Technology" ${data.jurusan1 === 'S1 Smart Science & Technology' ? 'selected' : ''}>S1 Smart Science & Technology</option>
            <option value="S1 Teknik Komputer" ${data.jurusan1 === 'S1 Teknik Komputer' ? 'selected' : ''}>S1 Teknik Komputer</option>
            <option value="S1 Teknik Biomedis" ${data.jurusan1 === 'S1 Teknik Biomedis' ? 'selected' : ''}>S1 Teknik Biomedis</option>
            <option value="S1 Electrical Energy Engineering" ${data.jurusan1 === 'S1 Electrical Energy Engineering' ? 'selected' : ''}>S1 Electrical Energy Engineering</option>
            <option value="S1 Informatika" ${data.jurusan1 === 'S1 Informatika' ? 'selected' : ''}>S1 Informatika</option>
            <option value="S1 Data Sains" ${data.jurusan1 === 'S1 Data Sains' ? 'selected' : ''}>S1 Data Sains</option>
            <option value="S1 Teknologi Informasi" ${data.jurusan1 === 'S1 Teknologi Informasi' ? 'selected' : ''}>S1 Teknologi Informasi</option>
            <option value="S1 Rekayasa Perangkat Lunak" ${data.jurusan1 === 'S1 Rekayasa Perangkat Lunak' ? 'selected' : ''}>S1 Rekayasa Perangkat Lunak</option>
            <option value="S1 Teknik Industri" ${data.jurusan1 === 'S1 Teknik Industri' ? 'selected' : ''}>S1 Teknik Industri</option>
            <option value="S1 Sistem Informasi" ${data.jurusan1 === 'S1 Sistem Informasi' ? 'selected' : ''}>S1 Sistem Informasi</option>
            <option value="S1 Digital Supply Chain" ${data.jurusan1 === 'S1 Digital Supply Chain' ? 'selected' : ''}>S1 Digital Supply Chain</option>
            <option value="S1 Manajemen Rekayasa" ${data.jurusan1 === 'S1 Manajemen Rekayasa' ? 'selected' : ''}>S1 Manajemen Rekayasa</option>
            <option value="S1 Ilmu Komunikasi" ${data.jurusan1 === 'S1 Ilmu Komunikasi' ? 'selected' : ''}>S1 Ilmu Komunikasi</option>
            <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)" ${data.jurusan1 === 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)' ? 'selected' : ''}>S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)</option>
            <option value="S1 Akuntansi" ${data.jurusan1 === 'S1 Akuntansi' ? 'selected' : ''}>S1 Akuntansi</option>
            <option value="S1 Administrasi Bisnis" ${data.jurusan1 === 'S1 Administrasi Bisnis' ? 'selected' : ''}>S1 Administrasi Bisnis</option>
            <option value="S1 Manajemen Bisnis Rekreasi (Leisure Management)" ${data.jurusan1 === 'S1 Manajemen Bisnis Rekreasi (Leisure Management)' ? 'selected' : ''}>S1 Manajemen Bisnis Rekreasi (Leisure Management)</option>
            <option value="S1 Digital Bisnis" ${data.jurusan1 === 'S1 Digital Bisnis' ? 'selected' : ''}>S1 Digital Bisnis</option>
            <option value="S1 Digital Public Relation" ${data.jurusan1 === 'S1 Digital Public Relation' ? 'selected' : ''}>S1 Digital Public Relation</option>
            <option value="S1 Digital Content Broadcasting" ${data.jurusan1 === 'S1 Digital Content Broadcasting' ? 'selected' : ''}>S1 Digital Content Broadcasting</option>
            <option value="S1 Psikologi" ${data.jurusan1 === 'S1 Psikologi' ? 'selected' : ''}>S1 Psikologi</option>
            <option value="S1 Desain Komunikasi Visual" ${data.jurusan1 === 'S1 Desain Komunikasi Visual' ? 'selected' : ''}>S1 Desain Komunikasi Visual</option>
            <option value="S1 Desain Produk & Inovasi" ${data.jurusan1 === 'S1 Desain Produk & Inovasi' ? 'selected' : ''}>S1 Desain Produk & Inovasi</option>
            <option value="S1 Desain Interior" ${data.jurusan1 === 'S1 Desain Interior' ? 'selected' : ''}>S1 Desain Interior</option>
            <option value="S1 Creative Arts (Intermedia Visual Arts)" ${data.jurusan1 === 'S1 Creative Arts (Intermedia Visual Arts)' ? 'selected' : ''}>S1 Creative Arts (Intermedia Visual Arts)</option>
            <option value="S1 Kriya Fashion & Textile Design" ${data.jurusan1 === 'S1 Kriya Fashion & Textile Design' ? 'selected' : ''}>S1 Kriya Fashion & Textile Design</option>
            <option value="S1 Film & Animasi" ${data.jurusan1 === 'S1 Film & Animasi' ? 'selected' : ''}>S1 Film & Animasi</option>
            <option value="D3 Teknik Telekomunikasi (Digital Connectivity)" ${data.jurusan1 === 'D3 Teknik Telekomunikasi (Digital Connectivity)' ? 'selected' : ''}>D3 Teknik Telekomunikasi (Digital Connectivity)</option>
            <option value="D3 Teknik Informatika" ${data.jurusan1 === 'D3 Teknik Informatika' ? 'selected' : ''}>D3 Teknik Informatika</option>
            <option value="D3 Teknik Komputer" ${data.jurusan1 === 'D3 Teknik Komputer' ? 'selected' : ''}>D3 Teknik Komputer</option>
            <option value="D3 Sistem Informasi" ${data.jurusan1 === 'D3 Sistem Informasi' ? 'selected' : ''}>D3 Sistem Informasi</option>
            <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)" ${data.jurusan1 === 'D3 Digital Accounting (Sistem Informasi Akuntansi)' ? 'selected' : ''}>D3 Digital Accounting (Sistem Informasi Akuntansi)</option>
            <option value="D3 Hospitality & Culinary Art" ${data.jurusan1 === 'D3 Hospitality & Culinary Art' ? 'selected' : ''}>D3 Hospitality & Culinary Art</option>
            <option value="D3 Digital Marketing" ${data.jurusan1 === 'D3 Digital Marketing' ? 'selected' : ''}>D3 Digital Marketing</option>
            <option value="D3 Creative Multimedia" ${data.jurusan1 === 'D3 Creative Multimedia' ? 'selected' : ''}>D3 Creative Multimedia</option>
        </select>
        @error('jurusan1')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

                                                    <div class="col-md-6">
    <div class="mb-3">
        <label for="jurusan2" class="form-control-label">Jurusan Pilihan 1</label>
        <select name="jurusan2" id="jurusan2" class="form-control form-select">
            <option value="">Pilih</option>
            <option value="S1 Teknik Telekomunikasi" ${data.jurusan2 === 'S1 Teknik Telekomunikasi' ? 'selected' : ''}>S1 Teknik Telekomunikasi</option>
            <option value="S1 Teknik Elektro" ${data.jurusan2 === 'S1 Teknik Elektro' ? 'selected' : ''}>S1 Teknik Elektro</option>
            <option value="S1 Smart Science & Technology" ${data.jurusan2 === 'S1 Smart Science & Technology' ? 'selected' : ''}>S1 Smart Science & Technology</option>
            <option value="S1 Teknik Komputer" ${data.jurusan2 === 'S1 Teknik Komputer' ? 'selected' : ''}>S1 Teknik Komputer</option>
            <option value="S1 Teknik Biomedis" ${data.jurusan2 === 'S1 Teknik Biomedis' ? 'selected' : ''}>S1 Teknik Biomedis</option>
            <option value="S1 Electrical Energy Engineering" ${data.jurusan2 === 'S1 Electrical Energy Engineering' ? 'selected' : ''}>S1 Electrical Energy Engineering</option>
            <option value="S1 Informatika" ${data.jurusan2 === 'S1 Informatika' ? 'selected' : ''}>S1 Informatika</option>
            <option value="S1 Data Sains" ${data.jurusan2 === 'S1 Data Sains' ? 'selected' : ''}>S1 Data Sains</option>
            <option value="S1 Teknologi Informasi" ${data.jurusan2 === 'S1 Teknologi Informasi' ? 'selected' : ''}>S1 Teknologi Informasi</option>
            <option value="S1 Rekayasa Perangkat Lunak" ${data.jurusan2 === 'S1 Rekayasa Perangkat Lunak' ? 'selected' : ''}>S1 Rekayasa Perangkat Lunak</option>
            <option value="S1 Teknik Industri" ${data.jurusan2 === 'S1 Teknik Industri' ? 'selected' : ''}>S1 Teknik Industri</option>
            <option value="S1 Sistem Informasi" ${data.jurusan2 === 'S1 Sistem Informasi' ? 'selected' : ''}>S1 Sistem Informasi</option>
            <option value="S1 Digital Supply Chain" ${data.jurusan2 === 'S1 Digital Supply Chain' ? 'selected' : ''}>S1 Digital Supply Chain</option>
            <option value="S1 Manajemen Rekayasa" ${data.jurusan2 === 'S1 Manajemen Rekayasa' ? 'selected' : ''}>S1 Manajemen Rekayasa</option>
            <option value="S1 Ilmu Komunikasi" ${data.jurusan2 === 'S1 Ilmu Komunikasi' ? 'selected' : ''}>S1 Ilmu Komunikasi</option>
            <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)" ${data.jurusan2 === 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)' ? 'selected' : ''}>S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)</option>
            <option value="S1 Akuntansi" ${data.jurusan2 === 'S1 Akuntansi' ? 'selected' : ''}>S1 Akuntansi</option>
            <option value="S1 Administrasi Bisnis" ${data.jurusan2 === 'S1 Administrasi Bisnis' ? 'selected' : ''}>S1 Administrasi Bisnis</option>
            <option value="S1 Manajemen Bisnis Rekreasi (Leisure Management)" ${data.jurusan2 === 'S1 Manajemen Bisnis Rekreasi (Leisure Management)' ? 'selected' : ''}>S1 Manajemen Bisnis Rekreasi (Leisure Management)</option>
            <option value="S1 Digital Bisnis" ${data.jurusan2 === 'S1 Digital Bisnis' ? 'selected' : ''}>S1 Digital Bisnis</option>
            <option value="S1 Digital Public Relation" ${data.jurusan2 === 'S1 Digital Public Relation' ? 'selected' : ''}>S1 Digital Public Relation</option>
            <option value="S1 Digital Content Broadcasting" ${data.jurusan2 === 'S1 Digital Content Broadcasting' ? 'selected' : ''}>S1 Digital Content Broadcasting</option>
            <option value="S1 Psikologi" ${data.jurusan2 === 'S1 Psikologi' ? 'selected' : ''}>S1 Psikologi</option>
            <option value="S1 Desain Komunikasi Visual" ${data.jurusan2 === 'S1 Desain Komunikasi Visual' ? 'selected' : ''}>S1 Desain Komunikasi Visual</option>
            <option value="S1 Desain Produk & Inovasi" ${data.jurusan2 === 'S1 Desain Produk & Inovasi' ? 'selected' : ''}>S1 Desain Produk & Inovasi</option>
            <option value="S1 Desain Interior" ${data.jurusan2 === 'S1 Desain Interior' ? 'selected' : ''}>S1 Desain Interior</option>
            <option value="S1 Creative Arts (Intermedia Visual Arts)" ${data.jurusan2 === 'S1 Creative Arts (Intermedia Visual Arts)' ? 'selected' : ''}>S1 Creative Arts (Intermedia Visual Arts)</option>
            <option value="S1 Kriya Fashion & Textile Design" ${data.jurusan2 === 'S1 Kriya Fashion & Textile Design' ? 'selected' : ''}>S1 Kriya Fashion & Textile Design</option>
            <option value="S1 Film & Animasi" ${data.jurusan2 === 'S1 Film & Animasi' ? 'selected' : ''}>S1 Film & Animasi</option>
            <option value="D3 Teknik Telekomunikasi (Digital Connectivity)" ${data.jurusan2 === 'D3 Teknik Telekomunikasi (Digital Connectivity)' ? 'selected' : ''}>D3 Teknik Telekomunikasi (Digital Connectivity)</option>
            <option value="D3 Teknik Informatika" ${data.jurusan2 === 'D3 Teknik Informatika' ? 'selected' : ''}>D3 Teknik Informatika</option>
            <option value="D3 Teknik Komputer" ${data.jurusan2 === 'D3 Teknik Komputer' ? 'selected' : ''}>D3 Teknik Komputer</option>
            <option value="D3 Sistem Informasi" ${data.jurusan2 === 'D3 Sistem Informasi' ? 'selected' : ''}>D3 Sistem Informasi</option>
            <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)" ${data.jurusan2 === 'D3 Digital Accounting (Sistem Informasi Akuntansi)' ? 'selected' : ''}>D3 Digital Accounting (Sistem Informasi Akuntansi)</option>
            <option value="D3 Hospitality & Culinary Art" ${data.jurusan2 === 'D3 Hospitality & Culinary Art' ? 'selected' : ''}>D3 Hospitality & Culinary Art</option>
            <option value="D3 Digital Marketing" ${data.jurusan2 === 'D3 Digital Marketing' ? 'selected' : ''}>D3 Digital Marketing</option>
            <option value="D3 Creative Multimedia" ${data.jurusan2 === 'D3 Creative Multimedia' ? 'selected' : ''}>D3 Creative Multimedia</option>
        </select>
        @error('jurusan2')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
                                                    {{-- <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-text-input" class="form-control-label">
                                                                KTP/KK</label>
                                                            <input name="kta" placeholder="kta format pdf" class="form-control"
                                                                type="file" value="{{ old('kta') }}">
                                                            @error('kta')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                            // Ambil data kota dari API dan tampilkan di opsi pilihan
                            fetch(
                                    `https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/32.json`
                                )
                                .then(response => response.json())
                                .then(regencies => {
                                    var options = '';
                                    regencies.forEach(element => {
                                        options +=
                                            `<option value="${element.name}">${element.name}</option>`;
                                    });
                                    $(`#alamat_asal_sekolah${modalId}`).html(options);

                                    // Set opsi yang dipilih berdasarkan data dari database
                                    $(`#alamat_asal_sekolah${modalId}`).val(data
                                        .alamat_asal_sekolah);
                                });
                        });
                    }

                });
                $('#filterForm').on('submit', function(e) {
                    e.preventDefault();
                    table.ajax.reload();
                });
            }
        });
    </script>
@endpush
