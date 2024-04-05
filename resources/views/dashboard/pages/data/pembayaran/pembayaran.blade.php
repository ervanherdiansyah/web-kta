@extends('dashboard.layouts.layout')
@section('title', 'Pembayaran')
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
                            <h6>Pembayaran</h6>
                            {{-- <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Pembayaran
                            </button> --}}
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
                                            Jumlah Pembayaran</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->user->name }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah_pembayaran }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->status }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>

                                            <td class="align-middle">
                                                <a href="{{ url('/dashboard/pembayaran/edit/' . $item->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <i class="fas fa-edit text-success text-sm opacity-10"></i>
                                                </a>
                                                <a type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $item->id }}">
                                                    <i class="fas fa-trash fa-xs text-danger text-sm opacity-10"></i>
                                                </a>
                                                <a type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#updatepassword{{ $item->id }}">
                                                    <i class="fa fa-cog text-info text-sm opacity-10"
                                                        aria-hidden="true"></i>
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
            @include('dashboard.component.footer.footer')
        </footer>
    </div>

    <!-- Modal Create Data-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/dashboard/pembayaran/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                    <select class="form-control form-select" name="user_id"
                                        aria-label=".form-select-sm example" id="">
                                        <option selected>Pilih Peserta</option>
                                        <option value="admin">Admin</option>
                                        <option value="guru">Guru</option>
                                        <option value="siswa">Siswa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah Pembayaran</label>
                                    <input name="jumlah_pembayaran" class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Status</label>
                                    <input name="password" class="form-control" type="password">
                                </div>status
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Create Data-->

    <!-- Modal Delete Data-->
    @foreach ($pembayaran as $item)
        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User {{ $item->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/pembayaran/destroy/' . $item->id) }}" method="Post">
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
    @foreach ($pembayaran as $item)
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/profile/update/' . $profile->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama
                                        </label>
                                        <input name="user_id" class="form-control" type="text"
                                            value="{{ $profile->user_id }} ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jumlah
                                            pembayaran</label>
                                        <input name="jumlah_pembayaran" class="form-control" type="text"
                                            value="{{ $jumlah_pembayaran->nohp }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Status
                                        </label>
                                        <input name="status" class="form-control" type="text"
                                            value="{{ $profile->status }}">
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


@endsection
@push('script')
    <!-- Tautkan file JavaScript jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
