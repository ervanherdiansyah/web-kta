@extends('dashboard.layouts.siswa.layout')
@section('title', 'Pendaftaran')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Pendaftaran Smile</p>
                            @if ($pendaftaran != null)
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#update">
                                    Edit
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($pendaftaran == null)
                            <form action="{{ url('/peserta/pendaftaran/create') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
                                            <input name="nama_lengkap" type="text" class="form-control"
                                                placeholder="Nama Lengkap" aria-label="Name"
                                                value="{{ old('nama_lengkap') }}">
                                            @error('nama_lengkap')
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
                                            <label for="example-text-input" class="form-control-label">Kota atau
                                                Kabupaten Sekolah</label>
                                            <select name="alamat_asal_sekolah" id="kota"
                                                class="form-control form-select">
                                                <option value="">Pilih Kab/Kota</option>
                                            </select>
                                            @error('alamat_asal_sekolah')
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
                                            <label for="example-text-input" class="form-control-label">NIK</label>
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
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <textarea name="alamat" id="" class="form-control">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Pendamping</label>
                                            <input name="nama_pendamping" type="text" class="form-control"
                                                value="{{ old('nama_pendamping') }}">
                                            @error('nama_pendamping')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nomor
                                                Pendamping</label>
                                            <input name="no_pendamping" type="text" class="form-control"
                                                value="{{ old('no_pendamping') }}">
                                            @error('no_pendamping')
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
                                                <option value="S1 Informatika"
                                                    @if (old('jurusan1') == 'S1 Informatika') selected @endif>
                                                    S1 Informatika
                                                </option>
                                                <option value="S1 Data Sains"
                                                    @if (old('jurusan1') == 'S1 Data Sains') selected @endif>
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
                                                <option value="S1 Akuntansi"
                                                    @if (old('jurusan1') == 'S1 Akuntansi') selected @endif>
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
                                                <option value="S1 Psikologi"
                                                    @if (old('jurusan1') == 'S1 Psikologi') selected @endif>
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
                                                <option value="S1 Informatika"
                                                    @if (old('jurusan2') == 'S1 Informatika') selected @endif>
                                                    S1 Informatika
                                                </option>
                                                <option value="S1 Data Sains"
                                                    @if (old('jurusan2') == 'S1 Data Sains') selected @endif>
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
                                                <option value="S1 Akuntansi"
                                                    @if (old('jurusan2') == 'S1 Akuntansi') selected @endif>
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
                                                <option value="S1 Psikologi"
                                                    @if (old('jurusan2') == 'S1 Psikologi') selected @endif>
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
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">
                                                KTP/KK</label>
                                            <input name="kta" placeholder="kta format pdf" class="form-control"
                                                type="file" value="{{ old('kta') }}">
                                            @error('kta')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ url('/peserta/pendaftaran/update/' . $pendaftaran->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
                                            <input name="nama_lengkap" class="form-control" type="text"
                                                value="{{ $pendaftaran->nama_lengkap ?? '' }} "
                                                @if (isset($pendaftaran) && $pendaftaran->nama_lengkap) readonly @endif>
                                            @error('nama_lengkap')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kelas</label>
                                            <input name="tempat_lahir" class="form-control" type="text"
                                                value="{{ $pendaftaran->kelas ?? '' }} "
                                                @if (isset($pendaftaran) && $pendaftaran->kelas) readonly @endif>
                                            @error('kelas')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Asal
                                                Sekolah</label>
                                            <input name="asal_sekolah" class="form-control" type="text"
                                                value="{{ $pendaftaran->asal_sekolah ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->asal_sekolah) readonly @endif>
                                            @error('asal_sekolah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kota atau Kabupaten
                                                Sekolah</label>
                                            <input name="alamat_asal_sekolah" class="form-control" type="text"
                                                value="{{ $pendaftaran->alamat_asal_sekolah ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->alamat_asal_sekolah) readonly @endif>
                                            @error('alamat_asal_sekolah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor
                                                Whatsapp</label>
                                            <input name="hp" class="form-control" type="text"
                                                value="{{ $pendaftaran->hp ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->hp) readonly @endif>
                                            @error('hp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input name="email" class="form-control" type="email"
                                                value="{{ $pendaftaran->email ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->email) readonly @endif>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">NIK</label>
                                            <input name="nik" class="form-control" type="text"
                                                value="{{ $pendaftaran->nik ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->nik) readonly @endif>
                                            @error('nik')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor Kartu Keluarga</label>
                                            <input name="no_kk" class="form-control" type="text"
                                                value="{{ $pendaftaran->no_kk ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->no_kk) readonly @endif>
                                            @error('no_kk')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input name="tanggal_lahir" class="form-control" type="text"
                                                value="{{ $pendaftaran->tanggal_lahir ?? '' }} "
                                                @if (isset($pendaftaran) && $pendaftaran->tanggal_lahir) readonly @endif>
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Ibu
                                                Kandung</label>
                                            <input name="nama_ibu_kandung" class="form-control" type="text"
                                                value="{{ $pendaftaran->nama_ibu_kandung ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->nama_ibu_kandung) readonly @endif>
                                            @error('nama_ibu_kandung')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <input name="alamat" class="form-control" type="text"
                                                value="{{ $pendaftaran->alamat ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->alamat) readonly @endif>
                                            @error('alamat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Pendamping</label>
                                            <input name="nama_pendamping" class="form-control" type="text"
                                                value="{{ $pendaftaran->nama_pendamping ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->nama_pendamping) readonly @endif>
                                            @error('nama_pendamping')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor
                                                Pendamping</label>
                                            <input name="no_pendamping" class="form-control" type="text"
                                                value="{{ $pendaftaran->no_pendamping ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->no_pendamping) readonly @endif>
                                            @error('no_pendamping')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jurusan Pilihan
                                                1</label>
                                            <input name="jurusan1" class="form-control" type="text"
                                                value="{{ $pendaftaran->jurusan1 ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->jurusan1) readonly @endif>
                                            @error('jurusan1')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jurusan Pilihan
                                                2</label>
                                            <input name="jurusan2" class="form-control" type="text"
                                                value="{{ $pendaftaran->jurusan2 ?? '' }}"
                                                @if (isset($pendaftaran) && $pendaftaran->jurusan2) readonly @endif>
                                            @error('jurusan2')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (isset($pendaftaran))
            <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update pendaftaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/peserta/pendaftaran/update/' . $pendaftaran->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
                                            <input name="nama_lengkap" type="text" class="form-control"
                                                placeholder="Nama Lengkap" aria-label="Name"
                                                value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}">
                                            @error('nama_lengkap')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Kelas</label>
                                            <select name="kelas" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="X" @if (old('kelas', $pendaftaran->kelas) == 'X') selected @endif>
                                                    X
                                                </option>
                                                <option value="XI" @if (old('kelas', $pendaftaran->kelas) == 'XI') selected @endif>
                                                    XI
                                                </option>
                                                <option value="XII" @if (old('kelas', $pendaftaran->kelas) == 'XII') selected @endif>
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
                                            <label for="example-text-input" class="form-control-label">Asal
                                                sekolah</label>
                                            <input name="asal_sekolah" placeholder="Asal Sekolah" class="form-control"
                                                type="text"
                                                value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}">
                                            @error('asal_sekolah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Kota atau Kabupaten
                                                Sekolah</label>
                                            <select name="alamat_asal_sekolah" id="kotaa"
                                                class="form-control form-select"
                                                data-selected="{{ $pendaftaran->alamat_asal_sekolah }}">
                                                <option value="">Pilih Kab/Kota</option>
                                            </select>
                                            @error('alamat_asal_sekolah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">No Hp</label>
                                            <input name="hp" placeholder="No Hp" class="form-control"
                                                type="text" value="{{ old('hp', $pendaftaran->hp) }}">
                                            @error('hp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input name="email" placeholder="Email" class="form-control"
                                                type="email" value="{{ old('email', $pendaftaran->email) }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">NIK</label>
                                            <input name="nik" placeholder="nik" class="form-control" type="text"
                                                value="{{ old('nik', $pendaftaran->nik) }}">
                                            @error('nik')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nomor Kartu
                                                Keluarga</label>
                                            <input name="no_kk" placeholder="no_kk" class="form-control"
                                                type="text" value="{{ old('no_kk', $pendaftaran->no_kk) }}">
                                            @error('no_kk')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input name="tanggal_lahir" type="date" class="form-control"
                                                value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}">
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nama Ibu
                                                Kandung</label>
                                            <input name="nama_ibu_kandung" type="text" class="form-control"
                                                value="{{ old('nama_ibu_kandung', $pendaftaran->nama_ibu_kandung) }}">
                                            @error('nama_ibu_kandung')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <textarea name="alamat" id="" class="form-control">{{ old('alamat', $pendaftaran->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Pendamping</label>
                                            <input name="nama_pendamping" type="text" class="form-control"
                                                value="{{ old('nama_pendamping', $pendaftaran->nama_pendamping) }}">
                                            @error('nama_pendamping')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nomor
                                                Pendamping</label>
                                            <input name="no_pendamping" type="text" class="form-control"
                                                value="{{ old('no_pendamping', $pendaftaran->no_pendamping) }}">
                                            @error('no_pendamping')
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
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Teknik Telekomunikasi') selected @endif>S1 Teknik
                                                    Telekomunikasi</option>
                                                <option value="S1 Teknik Elektro"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Teknik Elektro') selected @endif>S1 Teknik Elektro
                                                </option>
                                                <option value="S1 Smart Science & Technology"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Smart Science & Technology') selected @endif>S1 Smart Science &
                                                    Technology</option>
                                                <option value="S1 Teknik Komputer"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Teknik Komputer') selected @endif>S1 Teknik Komputer
                                                </option>
                                                <option value="S1 Teknik Biomedis"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Teknik Biomedis') selected @endif>S1 Teknik Biomedis
                                                </option>
                                                <option value="S1 Electrical Energy Engineering"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Electrical Energy Engineering') selected @endif>S1 Electrical
                                                    Energy Engineering</option>
                                                <option value="S1 Informatika"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Informatika') selected @endif>S1 Informatika
                                                </option>
                                                <option value="S1 Data Sains"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Data Sains') selected @endif>S1 Data Sains
                                                </option>
                                                <option value="S1 Teknologi Informasi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Teknologi Informasi') selected @endif>S1 Teknologi
                                                    Informasi</option>
                                                <option value="S1 Rekayasa Perangkat Lunak"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Rekayasa Perangkat Lunak') selected @endif>S1 Rekayasa
                                                    Perangkat Lunak</option>
                                                <option value="S1 Teknik Industri"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Teknik Industri') selected @endif>S1 Teknik Industri
                                                </option>
                                                <option value="S1 Sistem Informasi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Sistem Informasi') selected @endif>S1 Sistem
                                                    Informasi</option>
                                                <option value="S1 Digital Supply Chain"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Digital Supply Chain') selected @endif>S1 Digital Supply
                                                    Chain</option>
                                                <option value="S1 Manajemen Rekayasa"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Manajemen Rekayasa') selected @endif>S1 Manajemen
                                                    Rekayasa</option>
                                                <option value="S1 Ilmu Komunikasi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Ilmu Komunikasi') selected @endif>S1 Ilmu Komunikasi
                                                </option>
                                                <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)') selected @endif>S1 Manajemen
                                                    Bisnis Telekomunikasi & Informatika (MBTI)</option>
                                                <option value="S1 Akuntansi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Akuntansi') selected @endif>S1 Akuntansi
                                                </option>
                                                <option value="S1 Administrasi Bisnis"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Administrasi Bisnis') selected @endif>S1 Administrasi
                                                    Bisnis</option>
                                                <option value="S1 Manajemen Bisnis Rekreasi (Leisure Management)"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Manajemen Bisnis Rekreasi (Leisure Management)') selected @endif>S1 Manajemen
                                                    Bisnis Rekreasi (Leisure Management)</option>
                                                <option value="S1 Digital Bisnis"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Digital Bisnis') selected @endif>S1 Digital Bisnis
                                                </option>
                                                <option value="S1 Digital Public Relation"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Digital Public Relation') selected @endif>S1 Digital Public
                                                    Relation</option>
                                                <option value="S1 Digital Content Broadcasting"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Digital Content Broadcasting') selected @endif>S1 Digital Content
                                                    Broadcasting</option>
                                                <option value="S1 Psikologi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Psikologi') selected @endif>S1 Psikologi
                                                </option>
                                                <option value="S1 Desain Komunikasi Visual"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Desain Komunikasi Visual') selected @endif>S1 Desain
                                                    Komunikasi Visual</option>
                                                <option value="S1 Desain Produk & Inovasi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Desain Produk & Inovasi') selected @endif>S1 Desain Produk &
                                                    Inovasi</option>
                                                <option value="S1 Desain Interior"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Desain Interior') selected @endif>S1 Desain Interior
                                                </option>
                                                <option value="S1 Creative Arts (Intermedia Visual Arts)"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Creative Arts (Intermedia Visual Arts)') selected @endif>S1 Creative Arts
                                                    (Intermedia Visual Arts)</option>
                                                <option value="S1 Kriya Fashion & Textile Design"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Kriya Fashion & Textile Design') selected @endif>S1 Kriya Fashion &
                                                    Textile Design</option>
                                                <option value="S1 Film & Animasi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'S1 Film & Animasi') selected @endif>S1 Film & Animasi
                                                </option>
                                                <option value="D3 Teknik Telekomunikasi (Digital Connectivity)"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Teknik Telekomunikasi (Digital Connectivity)') selected @endif>D3 Teknik
                                                    Telekomunikasi (Digital Connectivity)</option>
                                                <option value="D3 Teknik Informatika"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Teknik Informatika') selected @endif>D3 Teknik
                                                    Informatika</option>
                                                <option value="D3 Teknik Komputer"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Teknik Komputer') selected @endif>D3 Teknik Komputer
                                                </option>
                                                <option value="D3 Sistem Informasi"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Sistem Informasi') selected @endif>D3 Sistem
                                                    Informasi</option>
                                                <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Digital Accounting (Sistem Informasi Akuntansi)') selected @endif>D3 Digital
                                                    Accounting (Sistem Informasi Akuntansi)</option>
                                                <option value="D3 Hospitality & Culinary Art"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Hospitality & Culinary Art') selected @endif>D3 Hospitality &
                                                    Culinary Art</option>
                                                <option value="D3 Digital Marketing"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Digital Marketing') selected @endif>D3 Digital
                                                    Marketing</option>
                                                <option value="D3 Creative Multimedia"
                                                    @if (old('jurusan1', $pendaftaran->jurusan1) == 'D3 Creative Multimedia') selected @endif>D3 Creative
                                                    Multimedia</option>
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
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Teknik Telekomunikasi') selected @endif>S1 Teknik
                                                    Telekomunikasi</option>
                                                <option value="S1 Teknik Elektro"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Teknik Elektro') selected @endif>S1 Teknik Elektro
                                                </option>
                                                <option value="S1 Smart Science & Technology"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Smart Science & Technology') selected @endif>S1 Smart Science &
                                                    Technology</option>
                                                <option value="S1 Teknik Komputer"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Teknik Komputer') selected @endif>S1 Teknik Komputer
                                                </option>
                                                <option value="S1 Teknik Biomedis"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Teknik Biomedis') selected @endif>S1 Teknik Biomedis
                                                </option>
                                                <option value="S1 Electrical Energy Engineering"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Electrical Energy Engineering') selected @endif>S1 Electrical
                                                    Energy Engineering</option>
                                                <option value="S1 Informatika"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Informatika') selected @endif>S1 Informatika
                                                </option>
                                                <option value="S1 Data Sains"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Data Sains') selected @endif>S1 Data Sains
                                                </option>
                                                <option value="S1 Teknologi Informasi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Teknologi Informasi') selected @endif>S1 Teknologi
                                                    Informasi</option>
                                                <option value="S1 Rekayasa Perangkat Lunak"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Rekayasa Perangkat Lunak') selected @endif>S1 Rekayasa
                                                    Perangkat Lunak</option>
                                                <option value="S1 Teknik Industri"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Teknik Industri') selected @endif>S1 Teknik Industri
                                                </option>
                                                <option value="S1 Sistem Informasi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Sistem Informasi') selected @endif>S1 Sistem
                                                    Informasi</option>
                                                <option value="S1 Digital Supply Chain"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Digital Supply Chain') selected @endif>S1 Digital Supply
                                                    Chain</option>
                                                <option value="S1 Manajemen Rekayasa"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Manajemen Rekayasa') selected @endif>S1 Manajemen
                                                    Rekayasa</option>
                                                <option value="S1 Ilmu Komunikasi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Ilmu Komunikasi') selected @endif>S1 Ilmu Komunikasi
                                                </option>
                                                <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)') selected @endif>S1 Manajemen
                                                    Bisnis Telekomunikasi & Informatika (MBTI)</option>
                                                <option value="S1 Akuntansi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Akuntansi') selected @endif>S1 Akuntansi
                                                </option>
                                                <option value="S1 Administrasi Bisnis"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Administrasi Bisnis') selected @endif>S1 Administrasi
                                                    Bisnis</option>
                                                <option value="S1 Manajemen Bisnis Rekreasi (Leisure Management)"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Manajemen Bisnis Rekreasi (Leisure Management)') selected @endif>S1 Manajemen
                                                    Bisnis Rekreasi (Leisure Management)</option>
                                                <option value="S1 Digital Bisnis"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Digital Bisnis') selected @endif>S1 Digital Bisnis
                                                </option>
                                                <option value="S1 Digital Public Relation"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Digital Public Relation') selected @endif>S1 Digital Public
                                                    Relation</option>
                                                <option value="S1 Digital Content Broadcasting"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Digital Content Broadcasting') selected @endif>S1 Digital Content
                                                    Broadcasting</option>
                                                <option value="S1 Psikologi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Psikologi') selected @endif>S1 Psikologi
                                                </option>
                                                <option value="S1 Desain Komunikasi Visual"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Desain Komunikasi Visual') selected @endif>S1 Desain
                                                    Komunikasi Visual</option>
                                                <option value="S1 Desain Produk & Inovasi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Desain Produk & Inovasi') selected @endif>S1 Desain Produk &
                                                    Inovasi</option>
                                                <option value="S1 Desain Interior"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Desain Interior') selected @endif>S1 Desain Interior
                                                </option>
                                                <option value="S1 Creative Arts (Intermedia Visual Arts)"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Creative Arts (Intermedia Visual Arts)') selected @endif>S1 Creative Arts
                                                    (Intermedia Visual Arts)</option>
                                                <option value="S1 Kriya Fashion & Textile Design"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Kriya Fashion & Textile Design') selected @endif>S1 Kriya Fashion &
                                                    Textile Design</option>
                                                <option value="S1 Film & Animasi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'S1 Film & Animasi') selected @endif>S1 Film & Animasi
                                                </option>
                                                <option value="D3 Teknik Telekomunikasi (Digital Connectivity)"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Teknik Telekomunikasi (Digital Connectivity)') selected @endif>D3 Teknik
                                                    Telekomunikasi (Digital Connectivity)</option>
                                                <option value="D3 Teknik Informatika"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Teknik Informatika') selected @endif>D3 Teknik
                                                    Informatika</option>
                                                <option value="D3 Teknik Komputer"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Teknik Komputer') selected @endif>D3 Teknik Komputer
                                                </option>
                                                <option value="D3 Sistem Informasi"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Sistem Informasi') selected @endif>D3 Sistem
                                                    Informasi</option>
                                                <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Digital Accounting (Sistem Informasi Akuntansi)') selected @endif>D3 Digital
                                                    Accounting (Sistem Informasi Akuntansi)</option>
                                                <option value="D3 Hospitality & Culinary Art"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Hospitality & Culinary Art') selected @endif>D3 Hospitality &
                                                    Culinary Art</option>
                                                <option value="D3 Digital Marketing"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Digital Marketing') selected @endif>D3 Digital
                                                    Marketing</option>
                                                <option value="D3 Creative Multimedia"
                                                    @if (old('jurusan2', $pendaftaran->jurusan2) == 'D3 Creative Multimedia') selected @endif>D3 Creative
                                                    Multimedia</option>
                                            </select>
                                            @error('jurusan2')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">
                                                KTP/KK</label>
                                            <input name="kta" placeholder="kta format pdf" class="form-control"
                                                type="file" value="{{ old('kta') }}">
                                            @error('kta')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
        @endif
        <footer class="footer pt-3  ">
            @include('dashboard.component.footer.footer')
        </footer>
    </div>
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
    <script>
        var selectedValue = document.querySelector(`#kotaa`).getAttribute('data-selected');

        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/32.json`)
            .then(response => response.json())
            .then(regencies => {
                var options = '<option value="">Pilih Kab/Kota</option>';
                regencies.forEach(element => {
                    options += `<option value="${element.name}">${element.name}</option>`;
                });

                // Mengisi select dengan options
                document.querySelector(`#kotaa`).innerHTML = options;

                // Set opsi yang dipilih berdasarkan data dari database
                document.querySelector(`#kotaa`).value = selectedValue;
            });
    </script>
@endsection
