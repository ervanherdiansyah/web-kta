<?php

namespace App\Http\Controllers\Siswa\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PembayaranController extends Controller
{

    public function index(Request $request)
    {

        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->first();

        if ($pembayaran && $pembayaran->status == 'Paid') {
            return view('dashboard.pages.siswa.pembayaran.index', compact('pembayaran'));
        } else {
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            // \Midtrans\Config::$overrideNotifUrl = config('app.url') . '/api/callback';
            \Midtrans\Config::$overrideNotifUrl = 'https://oprecanggota.forumosisjabar.id/api/callback';

            $item_details[] = array(
                'id' => rand(), // ID unik untuk ongkir
                'price' => $pembayaran->jumlah_pembayaran, // Harga ongkir
                'quantity' => 1, // Jumlahnya adalah 1 karena ongkir adalah satu item
                'name' => 'Biaya Pendaftaran', // Nama item ongkir
            );

            $pembayaran_id = $pembayaran->id;
            $random_string = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
            $order_id_with_random = $pembayaran_id . $random_string;
            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_id_with_random,
                    'gross_amount' => $pembayaran->jumlah_pembayaran,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ),
                'item_details' => $item_details,
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('dashboard.pages.siswa.pembayaran.index', compact('snapToken', 'pembayaran'));
        }
    }

    public function payment(Request $request)
    {

        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->first();


        if ($request->shipping_method == 'delivery') {
            $courier = $request->get('courier_code');
            $destination = $request->get('kota_id');
            $availableServices = $this->calculateShippingFee($destination, $courier);
            // return response()->json($request->get('delivery_package'));

            $selectedPackage = null;
            if (!empty($availableServices)) {
                foreach ($availableServices as $service) {
                    if ($service['service'] === $request->get('delivery_package')) {
                        $selectedPackage = $service;
                        continue;
                    }
                }
            }
            // return response()->json($request->all());

            $shipping_fee = $selectedPackage['cost'];
            $courierName = $selectedPackage['name'];
            $pembayaran->update([
                'jenis_order' => $request->shipping_method,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'alamat' => $request->alamat,
                'provinsi_id' => $request->provinsi_id,
                'kota_id' => $request->kota_id,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'kode_pos' => $request->kode_pos,
                'courier' => $courierName,
                'shipping_price' => $shipping_fee,
                'shipping_status' => 'diproses',
                'no_wa' => $request->no_wa,
            ]);

            $user = User::where('id', $pembayaran->user_id)->first();
            $user->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
            ]);
        } else if ($request->shipping_method == 'pickup') {
            $pembayaran->update([
                'jenis_order' => $request->shipping_method,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'no_wa' => $request->no_wa,
            ]);

            $user = User::where('id', $pembayaran->user_id)->first();
            $user->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
            ]);
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // \Midtrans\Config::$overrideNotifUrl = config('app.url') . '/api/callback';
        \Midtrans\Config::$overrideNotifUrl = 'https://oprecanggota.forumosisjabar.id/api/callback';

        $item_details[] = array(
            'id' => rand(), // ID unik untuk ongkir
            'price' => $pembayaran->jumlah_pembayaran, // Harga ongkir
            'quantity' => 1, // Jumlahnya adalah 1 karena ongkir adalah satu item
            'name' => 'Biaya Pendaftaran', // Nama item ongkir
        );

        $pembayaran_id = $pembayaran->id;
        $random_string = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        $order_id_with_random = $pembayaran_id . $random_string;
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id_with_random,
                'gross_amount' => $pembayaran->jumlah_pembayaran,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
            'item_details' => $item_details,
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json([
            'pembayaran' => $pembayaran,
            'snapToken' => $snapToken
        ]);
    }
    public function shippingFee(Request $request)
    {
        $courier = $request->courier;
        $destination = $request->kota_id;

        // $cart = Transaksi::with('detailTransaksi.produk')->where('id', $request->id_transaksi)->first();
        $availableServices = $this->calculateShippingFee($destination, $courier);
        return response()->json(['services' => $availableServices, 'address' => $destination]);
        // return view('frontend.checkout', ['services' => $availableServices, 'address' => $address, 'checkout' => $cart]);
    }
    function calculateShippingFee($destination, $courier)
    {
        $shippingFees = [];
        try {
            $response = Http::withHeaders([
                'key' => env('RAJAONGKIR_APIKEY'),
            ])->post(env('RAJAONGKIR_BASE_URL') . 'cost', [
                'origin' => env('RAJAONGKIR_ORIGIN'),
                'destination' => $destination,
                'weight' => 1000,
                'courier' => $courier,
            ]);

            $shippingFees = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [];
        }
        $availableServices = [];
        if (!empty($shippingFees['rajaongkir']['results'])) {
            foreach ($shippingFees['rajaongkir']['results'] as $cost) {
                $courierName = $cost['name'];
                if (!empty($cost['costs'])) {
                    foreach ($cost['costs'] as $costDetail) {
                        $availableServices[] = [
                            'name' => $courierName,
                            'service' => $costDetail['service'],
                            'description' => $costDetail['description'],
                            'etd' => $costDetail['cost'][0]['etd'],
                            'cost' => $costDetail['cost'][0]['value'],
                            'courier' => $courier,
                            'address_id' => $destination,
                        ];
                    }
                }
            }
        }

        return $availableServices;
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if (($request->transaction_status == 'capture' && $request->payment_type == 'credit_card' && $request->fraud_status == 'accept') or $request->transaction_status == 'settlement') {
                $numeric_part = preg_replace('/\D/', '', $request->order_id);
                $order = Pembayaran::find($numeric_part);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
