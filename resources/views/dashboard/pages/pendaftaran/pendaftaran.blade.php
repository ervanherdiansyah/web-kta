@extends('dashboard.layouts.layout')
@section('title', 'Data Pendaftaran')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
@endsection
@section('content')
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Data Pendaftaran</h6>
                            <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Pendaftaran
                            </button>
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
                                            Asal Sekolah</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Asal Kota/Kabupaten Sekolah</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jurusan</th>
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
                                    @foreach ($pendaftaran as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->nama_lengkap }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->asal_sekolah }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->alamat_asal_sekolah }}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->kelas }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->jurusan }}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->tempat_lahir }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->tanggal_lahir }}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->jenis_kelamin }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->agama }}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->email }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->hp }}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->instagram }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->alamat }}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>

                                            <td class="align-middle">
                                                {{-- <a href="{{ url('/dashboard/account/edit/' . $item->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <i class="fas fa-edit text-success text-sm opacity-10"></i>
                                                </a> --}}
                                                <a type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#update{{ $item->id }}">
                                                    <i class="fas fa-edit text-success text-sm opacity-10"></i>
                                                </a>
                                                <a type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $item->id }}">
                                                    <i class="fas fa-trash fa-xs text-danger text-sm opacity-10"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
                    <form action="{{ url('/dashboard/pendaftaran/create') }}" method="POST"
                        enctype="multipart/form-data">
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
    @foreach ($pendaftaran as $item)
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
    @endforeach
    <!-- End Modal Delete Data-->

    <!-- Modal Update Data-->
    @foreach ($pendaftaran as $item)
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
        </div>
    @endforeach
    <!-- End Modal Update Data-->

    <!-- Modal Verifikasi Data-->
    @foreach ($pendaftaran as $item)
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
    @endforeach
    <!-- End Modal Verifikasi Data-->

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
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTablee');
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
