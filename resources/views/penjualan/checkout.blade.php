@extends('layouts.master')

@section('title')
    Checkout
@endsection

@section('content')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        const transaction = @json($transaction);

        console.log('Transaction Details:', transaction);

        function bayar() {
            snap.pay(transaction.snap_token, {
                onSuccess: function(result) {
                    window.location.href = '{{route("checkout-success", [$transaction->id_penjualan])}}';
                },
                onPending: function(result) {
                    console.log('Payment Pending:', result);
                },
                onError: function(result) {
                    console.log('Payment Error:', result);
                }
            });
        };
    </script>
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembayaran produk dengan harga
                <strong>Rp{{ number_format($transaction['bayar'], 0, ',', '.') }}</strong><br><br>
                <button type="button" class="btn btn-primary mt-3" id="pay-button" onclick="bayar()">
                    Bayar Sekarang
                </button>

            </div>
        </div>
    </div>
@endsection

