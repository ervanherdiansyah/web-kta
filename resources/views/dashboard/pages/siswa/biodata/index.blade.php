@extends('dashboard.layouts.siswa.layout')
@section('title', 'Biodata')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit biodata</p>
                            @if ($biodata != null)
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#update">
                                    Edit biodata
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($biodata == null)
                            <form action="{{ url('/peserta/biodata/create') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" type="text" class="form-control"
                                        aria-label="Name" value="">
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
                                            <label for="example-text-input" class="form-control-label">Tempat
                                                Lahir</label>
                                            <input name="tempat_lahir" type="text" placeholder="Tempat lahir"
                                                class="form-control" value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input name="tanggal_lahir" type="date" placeholder="Tanggal lahir"
                                                class="form-control" value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Jenis
                                                Kelamin</label>
                                            <select name="jenis_kelamin" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>
                                                    Laki-laki
                                                </option>
                                                <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Agama</label>
                                            <select name="agama" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="Islam" @if (old('agama') == 'Islam') selected @endif>
                                                    Islam
                                                </option>
                                                <option value="Kristen Khatolik"
                                                    @if (old('agama') == 'Kristen Khatolik') selected @endif>
                                                    Kristen Khatolik
                                                </option>
                                                <option value="Kristen Protestan"
                                                    @if (old('agama') == 'Kristen Protestan') selected @endif>
                                                    Kristen Protestan
                                                </option>
                                                <option value="Budha" @if (old('agama') == 'Budha') selected @endif>
                                                    Budha
                                                </option>
                                                <option value="Hindu" @if (old('agama') == 'Hindu') selected @endif>
                                                    Hindu
                                                </option>
                                                <option value="konghuchu" @if (old('agama') == 'konghuchu') selected @endif>
                                                    konghuchu
                                                </option>
                                            </select>
                                            @error('agama')
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
                                            <label for="example-text-input" class="form-control-label">Instagram</label>
                                            <input name="instagram" placeholder="Instagram" class="form-control"
                                                type="text" value="{{ old('instagram') }}">
                                            @error('instagram')
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
                                </div>
                                <div class="row">
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
                                            <label for="example-text-input" class="form-control-label">Kelas</label>
                                            <select name="kelas" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="VII" @if (old('kelas') == 'VII') selected @endif>
                                                    VII
                                                </option>
                                                <option value="VIII" @if (old('kelas') == 'VIII') selected @endif>
                                                    VIII
                                                </option>
                                                <option value="IX" @if (old('kelas') == 'IX') selected @endif>
                                                    IX
                                                </option>
                                                <option value="X" @if (old('kelas') == 'X') selected @endif>
                                                    X
                                                </option>
                                                <option value="XI" @if (old('kelas') == 'XI') selected @endif>
                                                    XI
                                                </option>
                                                <option value="XII" @if (old('kelas') == 'XII') selected @endif>
                                                    XII
                                                </option>
                                                <option value="SLTP Sederajat"
                                                    @if (old('kelas') == 'SLTP Sederajat') selected @endif>
                                                    SLT Sederajat
                                                </option>
                                            </select>
                                            @error('kelas')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Jenjang
                                                Pendidikan</label>
                                            <select name="jurusan" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="SMA" @if (old('jurusan') == 'SMA') selected @endif>
                                                    SMA
                                                </option>
                                                <option value="SMK" @if (old('jurusan') == 'SMK') selected @endif>
                                                    SMK
                                                </option>
                                                <option value="MA" @if (old('jurusan') == 'MA') selected @endif>
                                                    MA
                                                </option>
                                                <option value="SMP" @if (old('jurusan') == 'SMP') selected @endif>
                                                    SMP
                                                </option>
                                                <option value="MTS" @if (old('jurusan') == 'MTS') selected @endif>
                                                    MTS
                                                </option>
                                            </select>
                                            @error('jurusan')
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
                            <form action="{{ url('/peserta/biodata/update/' . $biodata->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
                                            <input name="nama_lengkap" class="form-control" type="text"
                                                value="{{ $biodata->nama_lengkap ?? '' }} "
                                                @if (isset($biodata) && $biodata->nama_lengkap) readonly @endif>
                                            @error('nama_lengkap')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tempat
                                                Lahir</label>
                                            <input name="tempat_lahir" class="form-control" type="text"
                                                value="{{ $biodata->tempat_lahir ?? '' }} "
                                                @if (isset($biodata) && $biodata->tempat_lahir) readonly @endif>
                                            @error('tempat_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input name="tanggal_lahir" class="form-control" type="text"
                                                value="{{ $biodata->tanggal_lahir ?? '' }} "
                                                @if (isset($biodata) && $biodata->tanggal_lahir) readonly @endif>
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jenis
                                                Kelamin</label>
                                            <input name="jenis_kelamin" class="form-control" type="text"
                                                value="{{ $biodata->jenis_kelamin ?? '' }}"
                                                @if (isset($biodata) && $biodata->jenis_kelamin) readonly @endif>
                                            @error('jenis_kelamin')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Agama</label>
                                            <input name="agama" class="form-control" type="text"
                                                value="{{ $biodata->agama ?? '' }}"
                                                @if (isset($biodata) && $biodata->agama) readonly @endif>
                                            @error('agama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input name="email" class="form-control" type="email"
                                                value="{{ $biodata->email ?? '' }}"
                                                @if (isset($biodata) && $biodata->email) readonly @endif>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Instagram</label>
                                            <input name="instagram" class="form-control" type="text"
                                                value="{{ $biodata->instagram ?? '' }}"
                                                @if (isset($biodata) && $biodata->instagram) readonly @endif>
                                            @error('instagram')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor
                                                Whatsapp</label>
                                            <input name="hp" class="form-control" type="text"
                                                value="{{ $biodata->hp ?? '' }}"
                                                @if (isset($biodata) && $biodata->hp) readonly @endif>
                                            @error('hp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jenjang
                                                Pendidikan</label>
                                            <input name="jurusan" class="form-control" type="text"
                                                value="{{ $biodata->jurusan ?? '' }}"
                                                @if (isset($biodata) && $biodata->jurusan) readonly @endif>
                                            @error('jurusan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kelas</label>
                                            <input name="kelas" class="form-control" type="text"
                                                value="{{ $biodata->kelas ?? '' }}"
                                                @if (isset($biodata) && $biodata->kelas) readonly @endif>
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
                                                value="{{ $biodata->asal_sekolah ?? '' }}"
                                                @if (isset($biodata) && $biodata->asal_sekolah) readonly @endif>
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
                                                value="{{ $biodata->alamat_asal_sekolah ?? '' }}"
                                                @if (isset($biodata) && $biodata->alamat_asal_sekolah) readonly @endif>
                                            @error('alamat_asal_sekolah')
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

        @if (isset($biodata))
            <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update biodata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/peserta/biodata/update/' . $biodata->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
                                            <input name="nama_lengkap" type="text" class="form-control"
                                                placeholder="Nama Lengkap" aria-label="Name"
                                                value="{{ old('nama_lengkap', $biodata->nama_lengkap) }}">
                                            @error('nama_lengkap')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Tempat
                                                Lahir</label>
                                            <input name="tempat_lahir" type="text" placeholder="Tempat lahir"
                                                class="form-control"
                                                value="{{ old('tempat_lahir', $biodata->tempat_lahir) }}">
                                            @error('tempat_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input name="tanggal_lahir" type="date" placeholder="Tanggal lahir"
                                                class="form-control"
                                                value="{{ old('tanggal_lahir', $biodata->tanggal_lahir) }}">
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Jenis
                                                Kelamin</label>
                                            <select name="jenis_kelamin" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki"
                                                    @if (old('jenis_kelamin', $biodata->jenis_kelamin) == 'Laki-laki') selected @endif>Laki-laki</option>
                                                <option value="Perempuan"
                                                    @if (old('jenis_kelamin', $biodata->jenis_kelamin) == 'Perempuan') selected @endif>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Agama</label>
                                            <select name="agama" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="Islam" @if (old('agama', $biodata->agama) == 'Islam') selected @endif>
                                                    Islam</option>
                                                <option value="Kristen Khatolik"
                                                    @if (old('agama', $biodata->agama) == 'Kristen Khatolik') selected @endif>Kristen Khatolik
                                                </option>
                                                <option value="Kristen Protestan"
                                                    @if (old('agama', $biodata->agama) == 'Kristen Protestan') selected @endif>Kristen Protestan
                                                </option>
                                                <option value="Budha" @if (old('agama', $biodata->agama) == 'Budha') selected @endif>
                                                    Budha</option>
                                                <option value="Hindu" @if (old('agama', $biodata->agama) == 'Hindu') selected @endif>
                                                    Hindu</option>
                                                <option value="konghuchu"
                                                    @if (old('agama', $biodata->agama) == 'konghuchu') selected @endif>konghuchu</option>
                                            </select>
                                            @error('agama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input name="email" placeholder="Email" class="form-control"
                                                type="email" value="{{ old('email', $biodata->email) }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">No Hp</label>
                                            <input name="hp" placeholder="No Hp" class="form-control"
                                                type="text" value="{{ old('hp', $biodata->hp) }}">
                                            @error('hp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Instagram</label>
                                            <input name="instagram" placeholder="Instagram" class="form-control"
                                                type="text" value="{{ old('instagram', $biodata->instagram) }}">
                                            @error('instagram')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <textarea name="alamat" id="" class="form-control">{{ old('alamat', $biodata->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Asal
                                                sekolah</label>
                                            <input name="asal_sekolah" placeholder="Asal Sekolah" class="form-control"
                                                type="text" value="{{ old('asal_sekolah', $biodata->asal_sekolah) }}">
                                            @error('asal_sekolah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Kota atau Kabupaten
                                                Sekolah</label>
                                            <select name="alamat_asal_sekolah" id="kota{{ $biodata->id }}"
                                                class="form-control form-select"
                                                data-selected="{{ $biodata->alamat_asal_sekolah }}">
                                                <option value="">Pilih Kab/Kota</option>
                                            </select>
                                            @error('alamat_asal_sekolah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Kelas</label>
                                            <select name="kelas" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="VII" @if (old('kelas', $biodata->kelas) == 'VII') selected @endif>
                                                    VII</option>
                                                <option value="VIII" @if (old('kelas', $biodata->kelas) == 'VIII') selected @endif>
                                                    VIII</option>
                                                <option value="IX" @if (old('kelas', $biodata->kelas) == 'IX') selected @endif>
                                                    IX</option>
                                                <option value="X" @if (old('kelas', $biodata->kelas) == 'X') selected @endif>
                                                    X</option>
                                                <option value="XI" @if (old('kelas', $biodata->kelas) == 'XI') selected @endif>
                                                    XI</option>
                                                <option value="XII" @if (old('kelas', $biodata->kelas) == 'XII') selected @endif>
                                                    XII</option>
                                                <option value="SLTP Sederajat"
                                                    @if (old('kelas', $biodata->kelas) == 'SLTP Sederajat') selected @endif>SLTP Sederajat
                                                </option>
                                            </select>
                                            @error('kelas')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-control-label">Jenjang
                                                Pendidikan</label>
                                            <select name="jurusan" id="" class="form-control form-select">
                                                <option value="">Pilih</option>
                                                <option value="SMA" @if (old('jurusan', $biodata->jurusan) == 'SMA') selected @endif>
                                                    SMA</option>
                                                <option value="SMK" @if (old('jurusan', $biodata->jurusan) == 'SMK') selected @endif>
                                                    SMK</option>
                                                <option value="MA" @if (old('jurusan', $biodata->jurusan) == 'MA') selected @endif>
                                                    MA</option>
                                                <option value="SMP" @if (old('jurusan', $biodata->jurusan) == 'SMP') selected @endif>
                                                    SMP</option>
                                                <option value="MTS" @if (old('jurusan', $biodata->jurusan) == 'MTS') selected @endif>
                                                    MTS</option>
                                            </select>
                                            @error('jurusan')
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
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modalId = {{ $biodata->id }};
            var selectedValue = document.querySelector(`#kota${modalId}`).getAttribute('data-selected');

            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/32.json`)
                .then(response => response.json())
                .then(regencies => {
                    var options = '<option value="">Pilih Kab/Kota</option>';
                    regencies.forEach(element => {
                        options += `<option value="${element.name}">${element.name}</option>`;
                    });

                    // Mengisi select dengan options
                    document.querySelector(`#kota${modalId}`).innerHTML = options;

                    // Set opsi yang dipilih berdasarkan data dari database
                    document.querySelector(`#kota${modalId}`).value = selectedValue;
                });
        });
    </script> --}}
@endsection
