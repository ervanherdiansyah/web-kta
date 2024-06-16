@extends('dashboard.layouts.siswa.layout')
@section('title', 'Pembayaran')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card d-flex justify-content-center " style="height: ;">
                    <div class="card-header pb-0 pt-3 bg-info">
                        <h6 class="text-capitalize">Pembayaran</h6>
                    </div>
                    <div class="container"
                        style="height: ; display: flex; justify-content: center; align-items: center;  margin-top:3px; margin-bottom:3px">
                        <div class="card" style="width: 400px;">
                            <div class="card-header pb-0 pt-3 bg-transparent">
                                {{-- <h6 class="text-capitalize">Information</h6> --}}
                            </div>
                            @if ($pembayaran->status === 'Unpaid')
                                <div class="card-body p-3">
                                    <div style="text-align: center; ">
                                        <i class="fa fa-money" style="font-size: 100px; color: #007bff;"></i>
                                    </div>
                                    <div style="text-align: center;">
                                        <p type="button"
                                            style="font-size: 15px; color: #007bff; border: none; background: none;">Lakukan
                                            pembayaran disini !!!</p>
                                        <button type="button" class="btn btn-info" id="pay-button"
                                            style="font-size: 20px; color: #007bff; border: none; background: none;">Bayar
                                            Sekarang
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="card-body p-3">
                                    <div style="text-align: center; ">
                                        <i class="fa fa-check-circle-o" style="font-size: 100px; color: #42ec8f;"></i>
                                    </div>
                                    <div style="text-align: center;">
                                        <p type="button"
                                            style="font-size: 15px; color: #007bff; border: none; background: none;">Anda
                                            Sudah Membayar !!!</p>
                                    </div>
                                </div>
                            @endif
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
@if ($pembayaran->status === 'Unpaid')
    @push('midtrans')
        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        window.location.href = '/peserta/pembayaran';
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        window.location.href = '/peserta/pembayaran';

                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        </script>
    @endpush
@endif
