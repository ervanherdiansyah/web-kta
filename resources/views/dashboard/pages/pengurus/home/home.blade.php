@extends('dashboard.layouts.pengurus.layout')
@section('title', 'Home')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card d-flex justify-content-center " style="height: 40vh;">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        {{-- <h6 class="text-capitalize">Information</h6> --}}
                    </div>
                    <div class="container"
                        style="height: 100vh; display: flex; justify-content: center; align-items: center;">
                        <div class="card" style="width: 400px;">
                            <div class="card-header pb-0 pt-3 bg-transparent">
                                {{-- <h6 class="text-capitalize">Information</h6> --}}
                            </div>
                            <div class="card-body p-3">
                                <div style="text-align: center;">
                                    <h4 style="color: #ff0000;"><i class="fas fa-exclamation-circle"></i> Menunggu Informasi
                                        Selanjutnya</h4>
                                    <a href="https://linktr.ee/oprec.anggota.forumosisjabar" target="blank"
                                        class="btn btn-outline-primary">
                                        <h4 style="color: #22C2F5;">Link Contact Person</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            @include('dashboard.component.footer.footer')
        </footer>
    </div>
@endsection
