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
                        <h6 class="d-lg-none">Data Siswa</h6>
                        <div class="d-flex align-items-center">
                            <h6 class="d-none d-lg-block">Data Siswa</h6>
                            <div class="d-flex flex-wrap align-items-center ms-auto gap-2">
                                <a href="{{ url('/dashboard/pendaftaran/export') }}"
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
                            <table id="myTable" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jurusan</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Asal Sekolah</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Asal Kota/Kabupaten Sekolah</th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tempat Lahir</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Lahir</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jenis Kelamin</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Agama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No Hp</th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Instragram</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Alamat</th>
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
                    <form action="{{ url('/dashboard/pendaftaran/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" type="text" class="form-control" aria-label="Name"
                                value="">
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
                                        <option value="Islam" @if (old('agama') == 'Islam') selected @endif>Islam
                                        </option>
                                        <option value="Kristen Khatolik" @if (old('agama') == 'Kristen Khatolik') selected @endif>
                                            Kristen Khatolik
                                        </option>
                                        <option value="Kristen Protestan"
                                            @if (old('agama') == 'Kristen Protestan') selected @endif>
                                            Kristen Protestan
                                        </option>
                                        <option value="Budha" @if (old('agama') == 'Budha') selected @endif>Budha
                                        </option>
                                        <option value="Hindu" @if (old('agama') == 'Hindu') selected @endif>Hindu
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
                                    <input name="instagram" placeholder="Instagram" class="form-control" type="text"
                                        value="{{ old('instagram') }}">
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
                                    </select>
                                    @error('kelas')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Jurusan</label>
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
                                    </select>
                                    @error('jurusan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
    </div>
    <!-- End Modal Create Data-->

    <!-- Modal Delete Data-->
    {{-- @foreach ($pendaftaran as $item)
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data {{ $item->nama_siswa }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/pendaftaran/destroy/' . $item->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <p>apakah anda yakin ingin menghapus data ini?</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    <!-- End Modal Delete Data-->

    <!-- Modal Update Data-->
    {{-- @foreach ($pendaftaran as $item)
        <div class="modal fade" id="update{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/pendaftaran/update/' . $item->id) }}" method="POST"
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
                                            value="{{ $item->nama_lengkap }}">
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
                                            class="form-control" value="{{ $item->tempat_lahir }}">
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
                                            class="form-control" value="{{ $item->tanggal_lahir }}">
                                        @error('tanggal_lahir')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-control-label">Jenis
                                            Kelamin</label>
                                        <select class="form-control form-select" name="jenis_kelamin"
                                            aria-label=".form-select-sm example" id="">
                                            <option selected>Pilih...</option>
                                            <option @if ($item->jenis_kelamin == 'Laki-laki') selected @endif value="Laki-laki">
                                                Laki-Laki</option>
                                            <option @if ($item->jenis_kelamin == 'Perempuan') selected @endif value="perempuan">
                                                Perempuan</option>
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
                                            <option value="Islam" @if ($item->agama == 'Islam') selected @endif>
                                                Islam
                                            </option>
                                            <option value="Kristen Khatolik"
                                                @if ($item->agama == 'Kristen Khatolik') selected @endif>
                                                Kristen Khatolik
                                            </option>
                                            <option value="Kristen Protestan"
                                                @if ($item->agama == 'Kristen Protestan') selected @endif>
                                                Kristen Protestan
                                            </option>
                                            <option value="Budha" @if ($item->agama == 'Budha') selected @endif>
                                                Budha
                                            </option>
                                            <option value="Hindu" @if ($item->agama == 'Hindu') selected @endif>
                                                Hindu
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
                                            value="{{ $item->email }}">
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
                                            value="{{ $item->hp }}">
                                        @error('hp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-control-label">Instagram</label>
                                        <input name="instagram" placeholder="Instagram" class="form-control"
                                            type="text" value="{{ $item->instagram }}">
                                        @error('instagram')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        <textarea name="alamat" id="" class="form-control">{{ $item->alamat }}</textarea>
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
                                            type="text" value="{{ $item->asal_sekolah }}">
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
                                            <option value="VII" @if ($item->kelas == 'VII') selected @endif>
                                                VII
                                            </option>
                                            <option value="VIII" @if ($item->kelas == 'VIII') selected @endif>
                                                VIII
                                            </option>
                                            <option value="IX" @if ($item->kelas == 'IX') selected @endif>
                                                IX
                                            </option>
                                            <option value="X" @if ($item->kelas == 'X') selected @endif>
                                                X
                                            </option>
                                            <option value="XI" @if ($item->kelas == 'XI') selected @endif>
                                                XI
                                            </option>
                                            <option value="XII" @if ($item->kelas == 'XII') selected @endif>
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
                                        <label for="example-text-input" class="form-control-label">Jurusan</label>
                                        <select name="jurusan" id="" class="form-control form-select">
                                            <option value="">Pilih</option>
                                            <option value="SMA" @if ($item->jurusan == 'SMA') selected @endif>
                                                SMA
                                            </option>
                                            <option value="SMK" @if ($item->jurusan == 'SMK') selected @endif>
                                                SMK
                                            </option>
                                            <option value="MA" @if ($item->jurusan == 'MA') selected @endif>
                                                MA
                                            </option>
                                        </select>
                                        @error('jurusan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    @endforeach --}}
    <!-- End Modal Update Data-->

    <!-- Modal Verifikasi Data-->
    {{-- @foreach ($pendaftaran as $item)
        <div class="modal fade" id="updatestatus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Status </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/pendaftaran/update/status/' . $item->id) }}" method="Post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Verifikasi Data</label>
                                    <select class="form-control form-select" name="status_pendaftaran"
                                        aria-label=".form-select-sm example" id="">
                                        <option selected>Pilih...</option>
                                        <option value="Terverifikasi">Terverifikasi</option>
                                        <option value="Ditolak">Ditolak/cadangkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    <!-- End Modal Verifikasi Data-->

    <!-- Modal Import Data-->
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
    <!-- End Modal Import Data-->

    <script>
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/32.json')
            .then(response => response.json())
            .then(provinces => {
                var data = provinces;
                var tampung = '<option>Pilih Kota/Kabupaten</option>';
                data.forEach(element => {
                    tampung +=
                        `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`
                });
                document.getElementById('kota').innerHTML = tampung;
            });
    </script>
@endsection
@push('script')
    <!-- Tautkan file JavaScript jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



    {{-- <script type="text/javascript">
        let table = new DataTable('#myTablee');
    </script> --}}
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#myTable').DataTable();
        // });
        $(document).ready(function() {
            loadData();
        });

        function loadData() {
            $('#myTable').DataTable({
                processing: true,
                pagination: true,
                responsive: false,
                serverSide: true,
                searching: true,
                ordering: false,
                ajax: {
                    url: "{{ url('/dashboard/pendaftaran') }}",
                },
                columns: [{
                        data: "nama_lengkap",
                        name: "nama_lengkap"
                    },
                    {
                        data: "kelas",
                        name: "kelas"
                    },
                    {
                        data: "jurusan",
                        name: "jurusan"
                    },
                    {
                        data: "asal_sekolah",
                        name: "asal_sekolah"
                    },
                    {
                        data: "alamat_asal_sekolah",
                        name: "alamat_asal_sekolah"
                    },
                    {
                        data: "jenis_kelamin",
                        name: "jenis_kelamin"
                    },
                    {
                        data: "tempat_lahir",
                        name: "tempat_lahir"
                    },
                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir"
                    },
                    {
                        data: "agama",
                        name: "agama"
                    },

                    {
                        data: "email",
                        name: "email"
                    },
                    {
                        data: "hp",
                        name: "hp"
                    },
                    {
                        data: "instagram",
                        name: "instagram"
                    },
                    {
                        data: "alamat",
                        name: "alamat"
                    },
                    {
                        data: "action",
                        name: "action"
                    },
                ],
            });
        }
    </script>
@endpush
