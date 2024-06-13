@extends('dashboard.layouts.pengurus.layout')
@section('title', 'KTP')
{{-- @section('css-order')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection --}}
@section('content')
    <style>
        .btn-active {
            background-color: #007bff;
            color: white;
        }

        .margin-foto {
            margin-top: 31px;
            margin-left: 16px;
        }

        .img-web {
            height: 164px;
            width: 120px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            object-fit: cover;
            margin-right: 20px;
        }

        /* style Name */

        .first_name {
            margin-left: 20px;
            margin-top: 18px
        }

        .last_name {
            margin-left: 20px;
            margin-top: -25px;
        }

        .name-font {
            color: #efc471;
            font-size: 40px;
            font-weight: 700;
        }

        .font-color {
            color: #efc471;
        }

        /* style gender */

        .gender {
            margin-left: 50px;
            margin-top: 28px
        }

        /* style school */
        .school {
            margin-left: 50px;
            margin-top: 5px
        }

        /* style origin-school */
        .origin-school {
            margin-left: 50px;
            margin-top: 7px
        }

        @media (max-width: 768px) {

            /* style Foto */

            .margin-foto {
                margin-top: 34px;
                margin-left: 17px;
            }

            .img-phone {
                height: 181px;
                width: 137px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                border-bottom-left-radius: 50px;
                border-bottom-right-radius: 50px;
                object-fit: cover;
                margin-right: 20px;
            }

            .first_name {
                margin-left: 21px;
                margin-top: 23px
            }

            .last_name {
                margin-left: 21px;
                margin-top: -25px
            }

            .name-font {
                color: #efc471;
                font-size: 40px;
                font-weight: 700;
            }

            .gender {
                margin-left: 50px;
                margin-top: 22px;
            }

            .school {
                margin-left: 50px;
                margin-top: 5px
            }

            .origin-school {
                margin-left: 50px;
                margin-top: 7px
            }
        }
    </style>
    @if ($pembayaran != null)
        @if ($pembayaran->status == 'Unpaid')
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="d-flex card-header pb-0">
                                <div class="d-flex align-items-center me-3">
                                    <button id="btn-delivery" name='delivery'
                                        class="mb-0 btn btn-white btn-active">Delivery</button>
                                </div>
                                <div class="d-flex align-items-center me-3">
                                    <button id="btn-pickup" name='pickup' class="mb-0 btn btn-white">Pickup</button>
                                </div>
                                <div class="d-flex align-items-center ">
                                    <p class="my-0 text-danger">Klik Jenis Order Terlebih Dahulu !!!</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="form-delivery" action="{{ url('/pengurus/payment') }}"
                                    enctype="multipart/form-data" class="form-section">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama
                                                    Depan</label>
                                                <input name="nama_depan" class="form-control" type="text">
                                                @error('nama_depan')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama
                                                    Belakang</label>
                                                <input name="nama_belakang" class="form-control" type="text">
                                                @error('nama_belakang')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Alamat
                                                    Lengkap</label>
                                                <textarea name="alamat" class="form-control" type="text"></textarea>
                                                @error('alamat')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Provinsi</label>
                                                <select name="provinsi_id" id="provinsi" class="form-control">
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('provinsi_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Kota</label>
                                                <select name="kota_id" id="kota" class="form-control">
                                                    <option value="">Pilih Kota</option>
                                                </select>
                                            </div>
                                            @error('kota_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Kecamatan</label>
                                                <input name="kecamatan" class="form-control" type="text">
                                            </div>
                                            @error('kecamatan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Kelurahan</label>
                                                <input name="kelurahan" class="form-control" type="text">
                                            </div>
                                            @error('kelurahan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Kode Pos</label>
                                                <input name="kode_pos" class="form-control" type="text">
                                            </div>
                                            @error('kode_pos')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nomor
                                                    Whatsapp</label>
                                                <input name="no_wa" class="form-control" type="text">
                                            </div>
                                            @error('no_wa')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <h6 class="text-uppercase text-xs font-weight-bolder">Pilih Kurir</h6>

                                        <div class="mt-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input courier-code" type="radio"
                                                    name="courier_code" id="jneRadio" value="jne">
                                                <label class="form-check-label" for="jneRadio">JNE</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input courier-code" type="radio"
                                                    name="courier_code" id="posRadio" value="pos">
                                                <label class="form-check-label" for="posRadio">POS</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input courier-code" type="radio"
                                                    name="courier_code" id="tikiRadio" value="tiki">
                                                <label class="form-check-label" for="tikiRadio">TIKI</label>
                                            </div>
                                            <input type="hidden" id="transaksi_id" value="{{ $pembayaran->id }}">
                                            <input type="hidden" id="kota_id" value="">
                                        </div>
                                        <div class="mt-3">
                                            <p>Available services: </p>
                                            <ul class="list-group list-group-flush available-services"
                                                id="shipping-services" style="">
                                                @if (isset($services) && count($services) > 0)
                                                    <li class="list-group-item py-3 border-top fw-bold">
                                                        <div class="row align-items-center">
                                                            <div class="col-2 col-md-2 col-lg-2"></div>
                                                            <div class="col-4 col-md-4 col-lg-5">
                                                                Service
                                                            </div>
                                                            <div class="col-3 col-md-2 col-lg-2">
                                                                Estimate
                                                            </div>
                                                            <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                                Cost
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @foreach ($services as $service)
                                                        <li class="list-group-item py-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-2 col-md-2 col-lg-2">
                                                                    <input class="form-check-input delivery-package"
                                                                        type="radio" name="delivery_package"
                                                                        id="inlineRadio{{ $loop->index }}"
                                                                        value="{{ $service['cost'] }}"
                                                                        onclick="setShippingFee({{ $service['cost'] }})">
                                                                </div>
                                                                <div class="col-4 col-md-4 col-lg-5">
                                                                    {{ $service['service'] }}
                                                                    ({{ $service['description'] }})
                                                                </div>
                                                                <div class="col-3 col-md-2 col-lg-2">
                                                                    {{ $service['etd'] }}
                                                                </div>
                                                                <div
                                                                    class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                                    <span class="fw-bold">IDR
                                                                        {{ $service['cost'] }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li class="list-group-item py-3"
                                                        style="border: 1px solid #dc3545; border-radius: 5px; padding: 10px; ">
                                                        <span class="text-danger">no delivery service found, try another
                                                            courier!</span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex align-items-center" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
                            </div> --}}
                                </form>

                                <form id="form-pickup" action="{{ url('/pengurus/payment') }}"
                                    enctype="multipart/form-data" class="form-section" style="display: none;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_depan" class="form-control-label">Nama Depan</label>
                                                <input id="nama_depan" name="nama_depan" class="form-control"
                                                    type="text">
                                                @error('nama_depan')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_belakang" class="form-control-label">Nama
                                                    Belakang</label>
                                                <input id="nama_belakang" name="nama_belakang" class="form-control"
                                                    type="text">
                                                @error('nama_belakang')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_wa" class="form-control-label">Nomor Whatsapp</label>
                                                <input id="no_wa" name="no_wa" class="form-control"
                                                    type="text">
                                            </div>
                                            @error('no_wa')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Ket: Untuk Pickup KTA, Stiker, Box, Thanks Card, Pin FOJB, Lanyard dan Wadah
                                                KTA diambil ketika kegiatan SMILE FOJB. Untuk informasi kegiatan akan
                                                dihubungi oleh panitia. Terimakasih</p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 font-weight-bold">Payment Summary</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <strong>Detail Produk</strong>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Stiker</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Box</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Thanks Card</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Pin FOJB</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Lanyard dan Wadah KTA</span>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                {{-- <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>Rp850.000</span>
                        </div> --}}
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Biaya Lain-lain</span>
                                    <span>Rp5.400</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>(ppn dan fee transaksi)</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Biaya Pengiriman</span>
                                    <span id="shipping_fee">0</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-2">
                                    <input type="hidden" id="base_total" value="55400">
                                    <strong>Total Keseluruhan</strong>
                                    <strong id="grand_total">Rp55.400</strong>
                                </div>

                                <div class="d-flex align-items-center">
                                    <button id="pay-button" type="button"
                                        class="btn btn-primary btn-sm ms-auto">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container-fluid py-4">
                <div class="row mt-4">
                    <div class="card">
                        <div class="card-header pb-0 pt-3 d-flex" style="background-color: rgba(250, 247, 247, 0.8);">
                            <h6 class="text-capitalize">Kartu Tanda Pengurus</h6>
                            <div style="margin-left: auto">
                                <a href="{{ url('/pengurus/cetak-kta') }}" target="_blank" class="btn btn-primary">Cetak
                                    PDF</a>
                            </div>
                        </div>
                        <div class="card-body p-3" style="background-color: rgba(255, 255, 255, 0.8);">
                            <h6>Catatan</h6>
                            <ul>
                                <li><strong>Asal Sekolah:</strong> Huruf Kapital Semua dan maksimal 22 kata untuk cetak di
                                    KTA/KTP.</li>
                                <li><strong>Nama Depan:</strong> Maksimal 10 kata untuk cetak di KTA/KTP.</li>
                                <li><strong>Nama Belakang:</strong> Maksimal 10 kata untuk cetak di KTA/KTP.</li>
                            </ul>
                            <div class="row">
                                <div class="col-lg-2 mb-lg-0 mb-4"> </div>
                                <div class="col-lg-4 mb-lg-0 mb-4">
                                    <div class="card bg-dark text-white">
                                        <img src="{{ asset('assets/img/kta4.png') }}" class="card-img" alt="...">
                                        <div class="card-img-overlay">
                                            <div class="align-items-center">
                                                <div class="margin-foto">
                                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                        class="img-web" alt="member_photo">
                                                </div>
                                                <div class="first_name">
                                                    <h5 class="name-font">
                                                        {{ $dataForm->user->nama_depan }}</h5>
                                                </div>
                                                <div class="last_name">
                                                    <h5 class="name-font">
                                                        {{ $dataForm->user->nama_belakang }}</h5>
                                                </div>
                                                <div class="gender">
                                                    <p class="mb-0 font-weight-bold font-color">
                                                        {{ $dataForm->jenis_kelamin }}
                                                    </p>
                                                </div>
                                                <div class="school">
                                                    <p class="mb-0 font-weight-bold font-color">
                                                        {{ $dataForm->asal_sekolah }}</p>
                                                </div>
                                                <div class="origin-school">
                                                    <p class="mb-0 font-weight-bold font-color">
                                                        {{ $dataForm->alamat_asal_sekolah }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-lg-0 mb-4">
                                    <div class="card bg-dark text-white">
                                        <img src="{{ asset('assets/img/kta3.png') }}" class="card-img" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-2 mb-lg-0 mb-4"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Biodata Belum Dilengkapi',
                    text: 'Silakan lengkapi biodata Anda terlebih dahulu.',
                    icon: 'warning',
                    confirmButtonText: 'Lengkapi Biodata',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('/pengurus/biodata') }}";
                    }
                });
            });
        </script>
    @endif

    <footer class="footer pt-3  ">
        @include('dashboard.component.footer.footer')
    </footer>
    </div>
@endsection
@push('js-payment')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('btn-delivery').addEventListener('click', function() {
            document.getElementById('form-delivery').style.display = 'block';
            document.getElementById('form-pickup').style.display = 'none';
            this.classList.add('btn-active');
            document.getElementById('btn-pickup').classList.remove('btn-active');
            // Set metode pengiriman ke "delivery" saat tombol "Delivery" diklik
            document.getElementById('btn-delivery').value = 'delivery';

            // Tandai form-delivery sebagai aktif
            document.getElementById('form-delivery').setAttribute('active', '');
            // Hapus penandaan dari form-pickup
            document.getElementById('form-pickup').removeAttribute('active');
        });
        document.getElementById('btn-pickup').addEventListener('click', function() {
            document.getElementById('form-delivery').style.display = 'none';
            document.getElementById('form-pickup').style.display = 'block';
            this.classList.add('btn-active');
            document.getElementById('btn-delivery').classList.remove('btn-active');
            // Set metode pengiriman ke "pickup" saat tombol "Pickup" diklik
            document.getElementById('btn-delivery').value = 'pickup';

            // Tandai form-pickup sebagai aktif
            document.getElementById('form-pickup').setAttribute('active', '');
            // Hapus penandaan dari form-delivery
            document.getElementById('form-delivery').removeAttribute('active');
        });

        document.getElementById('pay-button').addEventListener('click', function() {
            let activeForm = document.querySelector('.form-section[active]');
            console.log(activeForm.id);
            if (activeForm && activeForm.id === 'form-delivery') {
                submitForm(activeForm, 'Form delivery');
            } else if (activeForm && activeForm.id === 'form-pickup') {
                submitForm(activeForm, 'Form pickup');
            }
        });

        function submitForm(form, formName) {
            event.preventDefault();
            const formData = new FormData(form); // Mengambil data dari form yang sedang aktif

            const shippingMethod = document.getElementById('btn-delivery').value; // Mengambil nilai metode pengiriman

            formData.append('shipping_method', shippingMethod); // Menambahkan metode pengiriman ke dalam FormData
            // Menambahkan grand total ke dalam FormData
            const grandTotal = document.getElementById('grand_total').innerText.replace('Rp', '').replace('.', '')
                .trim(); // Mengambil nilai grand total
            formData.append('grand_total', grandTotal); // Menambahkan grand total ke dalam FormData
            // console.log('innnni', formData);

            axios.post('/pengurus/payment', formData)
                .then(function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: formName + ' submitted successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const snapToken = response.data.snapToken;
                            console.log(snapToken);
                            midtrans(snapToken);
                        }
                    });
                })
                .catch(function(error) {
                    // Tangani kesalahan
                    Swal.fire({
                        title: 'Error!',
                        text: 'Error submitting ' + formName + '!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        }

        function midtrans(snapToken) {
            if (snapToken && snapToken.trim() !== "") {
                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        console.log('Payment Success:', result); // Debug hasil pembayaran sukses
                        window.location.href = '/pengurus/kta';
                    },
                    onPending: function(result) {
                        console.log('Payment Pending:', result); // Debug hasil pembayaran pending
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result) {
                        console.log('Payment Error:', result); // Debug hasil pembayaran error
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            } else {
                console.error('Invalid Snap Token'); // Debug jika token tidak valid
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Document is ready');
            const provinceSelect = document.getElementById('provinsi');
            const citySelect = document.getElementById('kota');
            const kotaIDInput = document.getElementById('kota_id');

            provinceSelect.addEventListener('change', function() {
                console.log('Province changed');
                const provinceId = this.value;
                console.log('Selected Province ID:', provinceId);

                if (provinceId) {
                    axios.get(`/get-cities/${provinceId}`)
                        .then(response => {
                            console.log('Data received:', response.data);
                            citySelect.innerHTML =
                                '<option value="">Pilih Kota</option>'; // Reset city options
                            response.data.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.id;
                                option.text = city.name;
                                citySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Axios Error:', error);
                        });
                } else {
                    citySelect.innerHTML = '<option value="">Pilih Kota</option>';
                }
            });
            citySelect.addEventListener('change', function() {
                kotaIDInput.value = this.value;
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('.courier-code').click(function() {
                var courier = $(this).val(); // Dapatkan nilai tombol radio yang dipilih
                let transaksiID = $('#transaksi_id').val();
                let kotaID = $('#kota').val();
                console.log(kotaID);

                // Kirim nilai menggunakan Ajax
                $.ajax({
                    url: "/pengurus/orders/shipping-fee",
                    method: "POST",
                    data: {
                        id_transaksi: transaksiID,
                        courier: courier,
                        kota_id: kotaID, // Kirimkan kota_id
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Tampilkan data kurir yang dipilih
                        $('#selected-courier').text(response.selected_courier);
                        // Tampilkan available services jika ada
                        if (response.services.length > 0) {
                            $('#shipping-services').show();
                        } else {
                            $('#shipping-services').hide();
                        }
                        console.log(response);
                        // Tampilkan data layanan pengiriman jika ada

                        var servicesHtml =
                            '<li class="list-group-item py-3"><div class="row align-items-center">';
                        servicesHtml += '<div class="col-2 col-md-2 col-lg-2">Pilih</div>';
                        servicesHtml += '<div class="col-4 col-md-4 col-lg-5">Deskripsi</div>';
                        servicesHtml += '<div class="col-3 col-md-2 col-lg-2">Estimasi</div>';
                        servicesHtml +=
                            '<div class="col-3 text-lg-end text-start text-md-end col-md-3">Harga</div>';
                        servicesHtml += '</div></li>';

                        // Set judul di atas daftar layanan pengiriman

                        $.each(response.services, function(index, service) {
                            servicesHtml += '<li class="list-group-item py-3">';
                            servicesHtml += '<div class="row align-items-center">';
                            servicesHtml += '<div class="col-2 col-md-2 col-lg-2">';
                            servicesHtml +=
                                '<input class="delivery-package" type="radio" name="delivery_package" id="inlineRadio' +
                                index + '" value="' + service.service +
                                '" onclick="setShippingFee(\'' + service.cost +
                                '\')">';
                            servicesHtml += '</div>';
                            servicesHtml += '<div class="col-4 col-md-4 col-lg-5">' +
                                service.service + ' (' + service.description +
                                ')</div>';
                            servicesHtml += '<div class="col-3 col-md-2 col-lg-2">' +
                                service.etd + '</div>';
                            servicesHtml +=
                                '<div class="col-3 text-lg-end text-start text-md-end col-md-3"><span class="fw-bold">Rp ' +
                                service.cost + '</span></div>';
                            servicesHtml += '</div></li>';
                        });
                        $('#shipping-services').html(servicesHtml);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

        function setShippingFee(cost) {
            // Update the shipping fee
            console.log('Selected shipping cost:', cost);
            document.getElementById('shipping_fee').innerText = 'Rp' + parseInt(cost).toLocaleString('id-ID');

            // Retrieve the base total amount from the hidden input
            var baseTotal = parseInt(document.getElementById('base_total').value);

            // Calculate and update the grand total
            var grandTotal = baseTotal + parseInt(cost);
            document.getElementById('grand_total').innerText = 'Rp' + grandTotal.toLocaleString('id-ID');
        }
    </script>
@endpush
