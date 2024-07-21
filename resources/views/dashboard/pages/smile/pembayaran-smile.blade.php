@extends('dashboard.layouts.layout')
@section('title', 'Data Pembayaran')
@section('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">


@endsection
@section('content')
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
                        <h6 class="d-lg-none">Data Pembayaran Smile</h6>
                        <div class="d-flex align-items-center">
                            <h6 class="d-none d-lg-block">Data Smile</h6>

                            <div class="d-flex flex-wrap align-items-center ms-auto gap-2">
                                {{-- <a href="{{ url('/dashboard/pembayaran-smile/export') }}"
                                    class="btn btn-primary btn-sm ms-auto">Export</a> --}}
                                {{-- <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#import">
                                    Import
                                </button> --}}

                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah pembayaran
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
                                        {{-- <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nominal</th> --}}
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Bukti Pembayaran</th>

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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/dashboard/pembayaran-smile/create') }}" method="POST"
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
                                    <label for="example-text-input" class="form-control-label">Nominal</label>
                                    <input name="nominal" type="text" class="form-control" placeholder="Nominal"
                                        aria-label="Nominal" value="{{ old('nominal') }}">
                                    @error('nominal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Status</label>
                                    <select name="status" id="" class="form-control form-select">
                                        <option value="">Pilih</option>
                                        <option value="Unpaid" @if (old('status') == 'Unpaid') selected @endif>
                                            Unpaid
                                        </option>
                                        <option value="Paid" @if (old('status') == 'Paid') selected @endif>
                                            Paid
                                        </option>
                                    </select>
                                    @error('kelas')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-control-label">Bukti Pembayaran</label>
                                    <input name="bukti_pembayaran" type="file" class="form-control"
                                        value="{{ old('bukti_pembayaran') }}">
                                    @error('bukti_pembayaran')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

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
    <div id="modals-container"></div>
    {{-- <div class="col-md-6">
        <div class="mb-3">
            <label for="nominal${data.id}" class="form-control-label">Nominal</label>
            <input name="nominal" type="text" class="form-control" id="nominal${data.id}" value="${data.nominal}">
            @error('nominal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div> --}}
@endsection
@push('script')
    <!-- Tautkan file JavaScript jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

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
                        url: "{{ url('/dashboard/pembayaran-smile') }}",

                    },
                    columns: [{
                            data: "user_id",
                            name: "user_id"
                        },
                        // {
                        //     data: "nominal",
                        //     name: "nominal"
                        // },
                        {
                            data: "status",
                            name: "status"
                        },
                        {
                            data: "bukti_pembayaran",
                            name: "bukti_pembayaran"
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
                                            <form action="{{ url('/dashboard/pembayaran-smile/destroy') }}/${data.id}" method="POST">
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
                                            <h5 class="modal-title" id="updateLabel${data.id}">Update pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/dashboard/pembayaran-smile/update') }}/${data.id}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status${data.id}" class="form-control-label">Status</label>
                                                            <select name="status" id="status${data.id}" class="form-control form-select">
                                                                <option value="">Pilih</option>
                                                                <option value="Paid" ${data.status === 'Paid' ? 'selected' : ''}>Paid</option>
                                                                <option value="Unpaid" ${data.status === 'Unpaid' ? 'selected' : ''}>Unpaid</option>
                                                            </select>
                                                            @error('status')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-text-input" class="form-control-label">
                                                                Upload Bukti</label>
                                                            <input name="bukti_pembayaran" class="form-control"
                                                                type="file" value="{{ old('bukti_pembayaran') }}">
                                                            @error('bukti_pembayaran')
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            });
        });
    </script>
@endpush
